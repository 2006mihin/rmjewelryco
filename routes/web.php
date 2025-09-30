<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ReviewController;


/*-------------------------------------------------
| Public Pages (web)
-------------------------------------------------*/
Route::get('/', fn() => view('welcome'))->name('welcome');
Route::get('/cart', fn() => view('cart'))->name('cart');

/*-------------------------------------------------
| Jewelry Pages
-------------------------------------------------*/
Route::get('/products/rings', [ProductPageController::class, 'rings'])->name('products.rings');
Route::get('/products/pendants', [ProductPageController::class, 'pendants'])->name('products.pendants');
Route::get('/products/earrings', [ProductPageController::class, 'earrings'])->name('products.earrings');
Route::get('/products/bracelets', [ProductPageController::class, 'bracelets'])->name('products.bracelets');

/*-------------------------------------------------
| User Authentication (web)
-------------------------------------------------*/
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.submit');
Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

/*-------------------------------------------------
| Admin Authentication (web)
-------------------------------------------------*/
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*-------------------------------------------------
| Admin Dashboard / Pages (web)
-------------------------------------------------*/
// Only accessible after admin login
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboardView'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.users');
    Route::get('/admin/products/manage', fn() => view('admin.productmanage'))->name('admin.products.manage');
});

/*-------------------------------------------------
| Authenticated User Home
-------------------------------------------------*/
Route::get('/home', fn() => view('home'))->middleware('auth:web')->name('home');


Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboardView'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'viewUsersWeb'])->name('admin.users'); // Web view
    Route::get('/admin/products/manage', fn() => view('admin.productmanage'))->name('admin.products.manage');
});







Route::get('/about', [ReviewController::class, 'index'])->name('about');
Route::middleware('auth:web')->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});
