<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');


// Product show route
Route::get('/product/{productId}', [ProductController::class, 'show'])->name('product.show');


// Combined root route
Route::get('/', function () {
    return auth()->check() ? redirect('/commercefootshop') : app(WelcomeController::class)->index();
})->name('welcome');


// Dashboard route with middleware
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/commercefootshop', [DashboardController::class, 'index'])->name('dashboard');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');
});

// Load authentication routes
require __DIR__.'/auth.php';
