<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'gender' => ['required', 'string', 'max:7', 'in:male,female'],
            'number_of_months' => ['numeric', 'max:12,min:1'],
            'password' => ['required','min:8'],
            'start_date' => ['date'],
            'the_price_of_registration' => ['numeric'],
            'phone' => ['regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/', 'unique:'.User::class],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'number_of_months' => $request->number_of_months,
            'phone' => $request->phone,
            'the_price_of_registration' => $request->the_price_of_registration,
            'start_date' => $request->start_date,
        ]);
        return redirect('/dashboard/users')->with('success', 'User created successfully.');
    }
    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string', 'max:255', 'in:super_admin,men_admin,girls_admin'],
            'gender' => ['required', 'string', 'max:7', 'in:male,female'],
            'password' => ['required','min:8'],
            'phone' => ['regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/', 'unique:'.User::class],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ]);
        return redirect('/dashboard/admins')->with('success', 'Admin created successfully.');
    }
}
