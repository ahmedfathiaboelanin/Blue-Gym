<?php

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/packages', function () {
    $packages = Package::all();
    return view('pages.packages', compact('packages'));
})->name('packages');

Route::get('/send-mail', function (Request $request) {
        $title = 'Blue Gym Website Mail from '. $request->name;
        $body = $request->message;
    return redirect("mailto:ahmedfathiaboelanin@gmail.com?subject=".$title."%20Here&body=".$body);
}
)->name('sendMail');

Route::get('/download-users', [AdminsController::class, 'downloadUsers'])->name('download.users');
Route::get('/download-packages', [AdminsController::class, 'downloadPackages'])->name('download.packages');
Route::get('/download-workouts', [AdminsController::class, 'downloadWorkouts'])->name('download.workouts');
Route::get('/download-sql', [AdminsController::class, 'sqlBackUp'])->name('download.sql');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';