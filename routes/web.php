<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrdersController;

//user pages
Route::get('/', fn() => view('welcome'))->name('welcome');
Route::get('/cart', fn() => view('cart'))->name('cart');

Route::get('/products/rings', [ProductPageController::class, 'rings'])->name('products.rings');
Route::get('/products/pendants', [ProductPageController::class, 'pendants'])->name('products.pendants');
Route::get('/products/earrings', [ProductPageController::class, 'earrings'])->name('products.earrings');
Route::get('/products/bracelets', [ProductPageController::class, 'bracelets'])->name('products.bracelets');

//User Authentication
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.submit');
Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.submit');

//Admin Authentication 
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//Admin Pages
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboardView'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'viewUsersWeb'])->name('users');
    Route::get('/products/manage', [AdminController::class, 'manageProducts'])->name('products.manage');
    Route::get('/orders', [AdminOrdersController::class, 'index'])->name('orders.index');
    Route::put('/orders/{id}/status', [AdminOrdersController::class, 'updateStatus'])->name('orders.updateStatus');
});

//Pages accessible to guests
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/profile', fn() => view('profile'))->name('profile');
Route::get('/about', [ReviewController::class, 'index'])->name('about');


Route::middleware('auth:web')->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');
});

