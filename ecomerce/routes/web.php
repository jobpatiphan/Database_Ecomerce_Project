<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishListController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }
    return view('welcome');
});

Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cart', [CartController::class, 'index'])->name('profile.cart');

//increase
Route::post('/cart/increase', [CartController::class, 'increaseAmount'])->name('profile.increaseAmount');
//decrease
Route::post('/cart/decrease', [CartController::class, 'decreaseAmount'])->name('profile.decreaseAmount');
//drop
Route::delete('/cart/drop', [CartController::class, 'dropProduct'])->name('profile.drop');
//checkout knack


//wish list part
Route::get('/wishlist', [WishListController::class, 'index'])->name('profile.wishList');
require __DIR__.'/auth.php';
