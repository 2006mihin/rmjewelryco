<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

// ---------------- Public Landing Page ----------------
Route::get('/', function () {
    return view('welcome');   // resources/views/welcome.blade.php
})->name('welcome');

// ---------------- Authentication ----------------
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.submit');

Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.submit');

Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

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


Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home'); // resources/views/home.blade.php
    })->name('home');

});

Route::get('/about', function () {
    return view('about'); 
})->name('about');


Route::prefix('products')->group(function () {
    Route::get('/products/rings', function () { return view('products.rings'); })->name('products.rings');
    Route::get('/products/pendants', function () { return view('products.pendants'); })->name('products.pendants');
    Route::get('/products/earrings', function () { return view('products.earrings'); })->name('products.earrings');
    Route::get('/products/bracelets', function () { return view('products.bracelets'); })->name('products.bracelets');
    
});


Route::get('/cart', function () {
    return view('cart'); // create resources/views/cart.blade.php
})->name('cart');

