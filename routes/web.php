<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Rute autentikasi Laravel, termasuk reset password
Auth::routes(['verify' => true]);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk login dengan Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Rute untuk auth jadi hanya bisa diakses jika login
Route::group(['middleware' => ['auth']], function () {
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
});

// Rute untuk admin dengan middleware auth dan role admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
});

// Rute untuk user dengan middleware auth dan role user
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard.user');
});
