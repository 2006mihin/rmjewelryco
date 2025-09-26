<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;



// ---------------- Public Landing Page ----------------
Route::get('/', function () {
    return view('welcome');   
})->name('welcome');


// ---------------- User Authentication ----------------
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.submit');

Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.submit');


Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');






// Admin authentication routes
Route::get('/admin/login', [AdminAuthController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class,'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class,'logout'])->name('admin.logout');

// Admin dashboard route (no middleware, check in controller)
Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');



    // CRUD routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::resource('/products', ProductController::class);
    Route::resource('/users', UserController::class);




// ---------------- Authenticated User Home ----------------
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home'); 
    })->name('home');
});




// ---------------- Public Pages ----------------
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::prefix('products')->group(function () {
    Route::get('/rings', function () {
        return view('products.rings');
    })->name('products.rings');

    Route::get('/pendants', function () {
        return view('products.pendants');
    })->name('products.pendants');

    Route::get('/earrings', function () {
        return view('products.earrings');
    })->name('products.earrings');

    Route::get('/bracelets', function () {
        return view('products.bracelets');
    })->name('products.bracelets');
});

Route::get('/cart', function () {
    return view('cart'); // resources/views/cart.blade.php
})->name('cart');
