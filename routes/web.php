<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {
    // Sign In
    Route::get('/sign-in', [AuthController::class, 'sign_in'])->name('sign-in');
    Route::post('/sign-in', [AuthController::class, 'sign_in_post']);

    // Sign Up
    Route::get('/sign-up', [AuthController::class, 'sign_up'])->name('sign-up');
    Route::post('/sign-up', [AuthController::class, 'sign_up_post']);

    // Sign Out 
    Route::post('/sign-out', [AuthController::class, 'sign_out'])->name('sign-out');

    Route::get('/product-list', [ProductController::class, 'productList'])->name('product-list');

    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/add-to-cart/{id}', [CartController::class, 'add_to_cart'])->name('add-to-cart');
    Route::get('/remove-from-cart/{id}', [CartController::class, 'remove_from_cart'])->name('remove-from-cart');
});