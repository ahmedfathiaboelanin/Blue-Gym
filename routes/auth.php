<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [AuthenticatedSessionController::class, 'profile'])
                    ->name('profile');

        Route::get('/workout', [AuthenticatedSessionController::class, 'workout'])
                    ->name('profile.workout');
                    
        Route::get('/edit-workout', [AuthenticatedSessionController::class, 'editWorkout'])
                    ->name('profile.workout-edit-table');

        Route::post('/edit-workout', [AuthenticatedSessionController::class, 'editWorkoutLogic'])
                    ->name('profile.workout-edit-logic');

        Route::get('edit', [AuthenticatedSessionController::class, 'edit'])
                    ->name('profile.edit');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
