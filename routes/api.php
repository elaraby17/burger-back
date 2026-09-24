<?php

use App\Http\Controllers\Api\AuthAdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductSizeController;
use App\Http\Controllers\Api\SauceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::put('/profile', [AuthController::class, 'profileEdit']);

        Route::get('/favorites', [FavoriteController::class, 'index']);
        Route::post('/favorites', [FavoriteController::class, 'store']);
        Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy']);

    });

    Route::get('products/popular', [ProductController::class, 'productPopular']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{product}', [ProductController::class, 'show']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);

    Route::get('product-sizes', [ProductSizeController::class, 'index']);
    Route::get('product-sizes/{productSize}', [ProductSizeController::class, 'show']);

    Route::get('sauces', [SauceController::class, 'index']);
    Route::get('sauces/{sauce}', [SauceController::class, 'show']);

});

Route::prefix('admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Authentication
    |--------------------------------------------------------------------------
    */

    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthAdminController::class, 'login']);
    });

    /*
    |--------------------------------------------------------------------------
    | Protected Admin Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', [AuthAdminController::class, 'logout']);

        Route::get('/me', [AuthAdminController::class, 'me']);

        Route::apiResource('customers', UserController::class);

        Route::apiResource('categories', CategoryController::class);

        Route::apiResource('products', ProductController::class);

        Route::apiResource('product-sizes', ProductSizeController::class);

        Route::apiResource('sauces', SauceController::class);
    });

});
