<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Test route (public)
Route::get('/ping', function () {
    return response()->json(['message' => 'API is working!']);
});

// ------------------ Public Product Routes ------------------
Route::get('/products', [ProductController::class, 'index']);       // List all products
Route::get('/products/{id}', [ProductController::class, 'show']);   // Get single product

// ------------------ Public Category Routes ------------------
Route::get('/categories', [CategoryController::class, 'index']);    // List all categories

// ------------------ Public Product WRITE routes (quick/simple fix) ------------------
// NOTE: moving create/update/delete here removes the auth:sanctum requirement.
// If you need auth later, move these back inside a protected group or implement Sanctum session/tokens.
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// ------------------ Protected API Routes ------------------
Route::middleware('auth:sanctum')->group(function () {

    // Users CRUD
    Route::apiResource('users', UserController::class);

    // Admins CRUD
    Route::apiResource('admins', AdminController::class);

    // Categories CRUD (protected routes for create, update, delete)
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    // Orders CRUD
    Route::apiResource('orders', OrderController::class);

    // Payments CRUD
    Route::apiResource('payments', PaymentController::class);

    // Shipments CRUD
    Route::apiResource('shipments', ShipmentController::class);

    // Logout
    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    });
});
