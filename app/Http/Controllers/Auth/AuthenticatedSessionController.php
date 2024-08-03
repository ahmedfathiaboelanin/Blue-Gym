<?php

namespace App\Http\Controllers\Auth;

use App\Models\Workout;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile () {
        if(auth()->check()){
            return view('profile.userinfo', [
                'user' => auth()->user()
            ]);
        }
        return redirect('/');
    }
    public function workout () {
        if(auth()->check()){
            return view('profile.workout', [
                'workout' => auth()->user()->workout
            ]);
        }
        return redirect('/');
    }
    public function editWorkout(){
        return view("profile.edit-workout", [
            'workout' => auth()->user()->workout
        ]);
    }
    public function editWorkoutLogic(Request $request){
        $workout = auth()->user()->workout;
        if(!$workout){
            $workout = new Workout();
            $workout->user_id = auth()->user()->id;
            $workout->saturday = $request->saturday;
            $workout->sunday = $request->sunday;
            $workout->monday = $request->monday;
            $workout->tuesday = $request->tuesday;
            $workout->wednesday = $request->wednesday;
            $workout->thursday = $request->thursday;
            $workout->friday = $request->friday;
            $workout->save();
            return redirect("/profile/workout");
        }
        $workout->update($request->all());
        return redirect("/profile/workout");
    }
}
