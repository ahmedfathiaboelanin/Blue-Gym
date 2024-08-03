<?php 

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::prefix('dashboard')->middleware(['auth','admin', 'verified'])->group(function () {
    // Index Page
    Route::get('/', function () {
        $maleUsersCount = User::where('gender', 'male')->where('role', 'user')->count();
        $femaleUsersCount = User::where('gender', 'female')->where('role', 'user')->count();
        $usersCount = User::where('role', 'user')->count();
        $adminsCount = User::where('role','!=','user')->count();
        return view('Dashboard.index', compact('maleUsersCount', 'femaleUsersCount', 'usersCount', 'adminsCount'));
    })->name('dashboard');

    // DASHBOARD USERS
    // ALL USER  PAGE
    Route::prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'allUsers'])->name('users');
        Route::get('create', [UsersController::class, 'create'])->name('users.create');
        Route::post('create', [RegisteredUserController::class, 'addUser'])->name('users.add');
        Route::get('/{id}/edit', [UsersController::class, 'editform'])->name('users.editform');
        Route::post('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::delete('/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    });

    // DASHBOARD ADMINS
    // ALL ADMINS PAGE
    Route::prefix('admins')->group(function () {
        Route::get('/', [AdminsController::class, 'allAdmins'])->name('admins');
        Route::get('create', [AdminsController::class, 'create'])->name('admins.create');
        Route::post('create', [RegisteredUserController::class, 'addAdmin'])->name('admins.add');
        Route::get('/{id}/edit', [AdminsController::class, 'editform'])->name('admins.editform');
        Route::post('/edit/{id}', [AdminsController::class, 'edit'])->name('admins.edit');
        Route::delete('/destroy/{id}', [AdminsController::class, 'destroy'])->name('admins.destroy');
    });

    // Packages
    Route::prefix('/packages')->group(function () { 
        Route::get('/',[PackageController::class, 'index'])->name('dashboard.packages');
        Route::get('/create',[PackageController::class, 'create'])->name('dashboard.packages.create');
        Route::post('/add',[PackageController::class, 'addPackage'])->name('dashboard.packages.add');
        Route::get('/{id}/edit',[PackageController::class, 'editform'])->name('dashboard.packages.editform');
        Route::post('/edit/{id}',[PackageController::class, 'edit'])->name('dashboard.packages.edit');
        Route::delete('/destroy/{id}',[PackageController::class, 'delete'])->name('dashboard.packages.delete');
    });
    Route::get('/backup', [AdminsController::class, 'backup'])->name('dashboard.backup');
});