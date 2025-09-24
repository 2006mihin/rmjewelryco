<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

// Public
Route::get('/', fn() => view('welcome'))->name('home');

// User login/register
Route::get('/login', [UserAuthController::class,'showLoginForm'])->name('user.login');
Route::post('/login', [UserAuthController::class,'login'])->name('user.login.submit');
Route::get('/register', [UserAuthController::class,'showRegisterForm'])->name('user.register');
Route::post('/register', [UserAuthController::class,'register'])->name('user.register.submit');
Route::post('/logout', [UserAuthController::class,'logout'])->name('user.logout');

// User dashboard
Route::middleware('auth:web')->group(function() {
    Route::get('/dashboard', fn() => view('dashboard'))->name('user.dashboard');
});

// Admin login
Route::middleware('guest:admin')->group(function() {
    Route::get('/admin/login', [AdminAuthController::class,'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class,'login'])->name('admin.login.submit');
});

// Admin dashboard
Route::middleware('auth:admin')->group(function() {
    Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminAuthController::class,'logout'])->name('admin.logout');
});
