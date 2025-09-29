<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductPageController;

// Public pages
Route::get('/', fn() => view('welcome'))->name('welcome');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/cart', fn() => view('cart'))->name('cart');

// Jewelry pages
Route::get('/products/rings', [ProductPageController::class, 'rings'])->name('products.rings');
Route::get('/products/pendants', [ProductPageController::class, 'pendants'])->name('products.pendants');
Route::get('/products/earrings', [ProductPageController::class, 'earrings'])->name('products.earrings');
Route::get('/products/bracelets', [ProductPageController::class, 'bracelets'])->name('products.bracelets');

// User authentication (web)
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.submit');
Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

// Admin authentication (web)
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin dashboard (session)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.users');
Route::get('/admin/products/manage', fn() => view('admin.productmanage'))->name('admin.products.manage');

// Authenticated user home
Route::get('/home', fn() => view('home'))->name('home');
