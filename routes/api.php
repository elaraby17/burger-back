<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductSizeController;
use App\Http\Controllers\Api\SauceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user', [AuthController::class, 'me']);
    });
});

Route::apiResource('admin/customers', UserController::class);
Route::apiResource('categories', CategoryController::class);

// MUST come before apiResource('products', ...): the resource route's
// GET products/{product} is registered first-match-wins, so it would
// otherwise swallow "/products/popular" and try to look up a product
// with id/slug "popular" — which is exactly the 404 we were chasing.
Route::get('products/popular', [ProductController::class, 'productPopular']);
Route::apiResource('products', ProductController::class);

Route::apiResource('product-sizes', ProductSizeController::class);

Route::apiResource('sauces', SauceController::class);

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('customers', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('product-sizes', ProductSizeController::class);
});
