<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShipmentController;

/* API Routes*/

// Test route (public)
Route::get('/ping', function () {
    return response()->json(['message' => 'API is working!']);
});

// ------------------ Public User Routes ------------------
// Example: user registration or login could be here if needed
// Route::post('/user/login', [UserAuthController::class, 'login']);
// Route::post('/user/register', [UserAuthController::class, 'register']);

// ------------------ Protected API Routes ------------------
Route::middleware('auth:sanctum')->group(function () {

    // Users CRUD
    Route::apiResource('users', UserController::class);

    // Admins CRUD
    Route::apiResource('admins', AdminController::class);

    // Categories CRUD
    Route::apiResource('categories', CategoryController::class);

    // Products CRUD
    Route::apiResource('products', ProductController::class);

    // Orders CRUD
    Route::apiResource('orders', OrderController::class);

    // Payments CRUD
    Route::apiResource('payments', PaymentController::class);

    // Shipments CRUD
    Route::apiResource('shipments', ShipmentController::class);
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');