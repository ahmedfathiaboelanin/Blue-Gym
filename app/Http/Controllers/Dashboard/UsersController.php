<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allUsers(Request $request) {
        $role = auth()->user()->role;
        // filter
        $query = User::query()->where('role','user');
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }
        switch($role){
            case 'men_admin':
                $query->where('gender', 'male');
                break;
            case 'girls_admin':
                $query->where('gender', 'female');
                break;
        }
        $users = $query->paginate(10);
        return view('Dashboard.users', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.createUser');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editform(Request $request,$id)
    {
        //
        $user = User::find($id);
        if(!$user){
            return redirect('/dashboard/users')->with('error','User Not Found');
        }
        return view('dashboard.editUser',['user' => $user]);
    }
    public function edit(Request $request,$id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect('/dashboard/users')->with('error','User Not Found');
        }
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'number_of_months' => ['numeric', 'max:12,min:1'],
            'the_price_of_registration' => ['numeric'],
            'phone' => ['numeric', Rule::unique('users')->ignore($user->id)],
        ];

        if ($request->filled('password')) {
            $rules['password'] = ['string', 'min:8'];
        }

        if ($request->filled('start_date')) {
            $rules['start_date'] = ['date'];
        }

        $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->number_of_months = $request->number_of_months;
        $user->the_price_of_registration = $request->the_price_of_registration;
        $user->phone = $request->phone;

        if ($request->filled('start_date')) {
            $user->start_date = $request->start_date;
            $user->end_date =  Carbon::parse($request->start_date)->addMonths($request->number_of_months);
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect('/dashboard/users')->with('success','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        if(!$user){
            return redirect('/dashboard/users')->with('error','User Not Found');
        }
        if($user->role !== 'user'){
            return redirect('/dashboard/users')->with('error','Your Are Not Allowed To Delete This User');
        }
        $user->delete();
        return redirect('/dashboard/users')->with('success','User Deleted Successfully');
    }

}
