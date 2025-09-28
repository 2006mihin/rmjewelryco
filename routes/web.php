<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Models\Product;
use App\Http\Controllers\ProductPageController;


/*User Authentication Routes*/
Route::controller(UserAuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('user.login');
    Route::post('/login', 'login')->name('user.login.submit');
    Route::get('/register', 'showRegisterForm')->name('user.register');
    Route::post('/register', 'register')->name('user.register.submit');
    Route::post('/logout', 'logout')->name('logout');
});

/*Admin Authentication Routes*/
Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/admin/login', 'showLoginForm')->name('admin.login');
    Route::post('/admin/login', 'login')->name('admin.login.submit');
    Route::post('/admin/logout', 'logout')->name('admin.logout');
});

/*Authenticated User Routes*/
Route::middleware('auth')->group(function () {
    Route::get('/home', fn() => view('home'))->name('home');
});



/*Public Routes*/
// Landing Page
Route::get('/', fn() => view('welcome'))->name('welcome');

// About Page
Route::get('/about', fn() => view('about'))->name('about');

// Cart Page
Route::get('/cart', fn() => view('cart'))->name('cart');

// Jewelry Product Pages
Route::get('/products/rings', [ProductPageController::class, 'rings'])->name('products.rings');
Route::get('/products/pendants', [ProductPageController::class, 'pendants'])->name('products.pendants');
Route::get('/products/earrings', [ProductPageController::class, 'earrings'])->name('products.earrings');
Route::get('/products/bracelets', [ProductPageController::class, 'bracelets'])->name('products.bracelets');

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Product Management View
    Route::get('/products/manage', fn() => view('admin.productmanage'))->name('admin.products.manage');

    // Resource Controllers
    Route::resources([
        'products' => ProductController::class,
        'users'    => UserController::class,
        'orders'   => OrderController::class,
    ]);
});
