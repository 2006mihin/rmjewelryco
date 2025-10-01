<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShipmentController;


Route::get('/ping', fn() => response()->json(['message' => 'API is working!']));

// User Admin API login/logout
Route::post('/login', [UserAuthController::class, 'apiLogin']);
Route::post('/logout', [UserAuthController::class, 'apiLogout'])->middleware('auth:sanctum');

Route::post('/admin/login', [AdminAuthController::class, 'apiLogin']);
Route::post('/admin/logout', [AdminAuthController::class, 'apiLogout'])->middleware('auth:sanctum');


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);


//Protected Routes (Sanctum)

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class); 
    Route::apiResource('admins', AdminController::class);

    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    Route::apiResource('orders', OrderController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('shipments', ShipmentController::class);

    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/users', [AdminController::class, 'viewUsers']);
});
