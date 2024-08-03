<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','superadmin']);
    }
    public function allAdmins(Request $request)
    {
        $role = auth()->user()->role;
        //filter
        $query = User::query()->where('role','!=','user');
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
        return view('Dashboard.admins', compact('users'));
    }

    public function create()
    {
        //
        return view('dashboard.createAdmin');

    }
    public function editform(Request $request,$id)
    {
        //
        $user = User::find($id);
        if(!$user){
            return redirect('/dashboard/admins')->with('error','Admin Not Found');
        }
        return view('dashboard.editAdmin',['user' => $user]);
    }
    public function edit(Request $request,$id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect('/dashboard/admins')->with('error','Admin Not Found');
        }
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'string', 'in:men_admin,girls_admin,super_admin'],
        ];

        if ($request->filled('password')) {
            $rules['password'] = ['string', 'min:8'];
        }

        $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect('/dashboard/admins')->with('success','Admin Updated Successfully');
    }
    public function destroy(Request $request,$id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect('/dashboard/admins')->with('error','Admin Not Found');
        }

        if($user->role == 'user'){
            return redirect('/dashboard/admins')->with('error','User Can Not Be Deleted');
        }

        if($user->role == 'super_admin'){
            return redirect('/dashboard/admins')->with('error','Super Admin Can Not Be Deleted');
        }

        $user->delete();
        return redirect('/dashboard/admins')->with('success','Admin Deleted Successfully');
    }

    public function backup(){
        return view('Dashboard.backup');
    }

    public function downloadUsers(Request $request)
    {
        $data = User::all();
        $columns = ['id', 'name', 'gender', 'email', 'email_verified_at', 'password', 'role',
            'the_price_of_registration', 'number_of_months', 'start_date', 'end_date',
            'status', 'phone', 'remember_token', 'created_at', 'updated_at',
        ];

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=users-table.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns); // Write column names as the first row
            foreach ($data as $row) {
                $rowData = $row->toArray();
                fputcsv($file, $rowData);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function downloadPackages(Request $request)
    {
        $data = Package::all();
        $columns = ['id', 'title', 'description', 'price', 'old_price', 'start_date', 'months',
            'end_date', 'is_active', 'badge', 'created_at', 'updated_at',
        ];

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=packages-table.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns); // Write column names as the first row
            foreach ($data as $row) {
                $rowData = $row->toArray();
                fputcsv($file, $rowData);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function downloadWorkouts(Request $request)
    {
        $data = Package::all();
        $columns = ['id','saturday','sunday','monday','tuesday','wednesday','thursday','friday','user_id', 'created_at', 'updated_at',
        ];

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=workout-table.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns); // Write column names as the first row
            foreach ($data as $row) {
                $rowData = $row->toArray();
                fputcsv($file, $rowData);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    public function sqlBackUp()
    {
        // Get the database name
    $databaseName = DB::getDatabaseName();

    // Generate a unique filename for the dump
    $dumpFileName = $databaseName . '_dump_' . now()->format('Ymd_His') . '.sql';

    // Dump the database structure and data to a temporary file
    $dumpFilePath = storage_path('app/' . $dumpFileName);
    $command = sprintf(
        'mysqldump --user=%s --password=%s --host=%s %s > %s',
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        env('DB_HOST'),
        $databaseName,
        $dumpFilePath
    );
    exec($command);

    // Check if the dump file was created
    if (file_exists($dumpFilePath)) {
        // Download the dump file
        return response()->download($dumpFilePath, $dumpFileName)->deleteFileAfterSend();
    } else {
        // Handle the error if the dump file was not created
        return redirect(route('dashboard.backup'))->with('error', 'Failed to create database dump');
    }
    }

}
