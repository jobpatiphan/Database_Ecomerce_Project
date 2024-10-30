<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactUs;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FooterController;

Route::put('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');




Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');

Route::middleware(['auth', 'verified'])->group(function () {
    //Page shop 
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
});
//Page contact 
Route::get('/contactUs', [ContactUsController::class, 'Goto'])->name('contactUs.index');
Route::get('/sendUs', [ContactUsController::class, 'send'])->name('senD');

//footer
Route::get('/', [ContactUsController::class, 'send'])->name('senD');
Route::get('/sendUs', [ContactUsController::class, 'send'])->name('senD');


Route::get('/Profile',  [ProfileController::class, 'edit'])->name('acc.view');
Route::get('/Login2', [FooterController::class, 'edit'])->name('login.view');
Route::get('/MyCart', [FooterController::class, 'mycart'])->name('mycart.view');
Route::get('/MyWishlist', [FooterController::class, 'mywishlist'])->name('mywishlist.view');
Route::get('/orders2', [OrderController::class, 'getOrderEntries'])->name('checkout.view');

// Product show route
Route::get('products/{productId}', [ProductController::class, 'show'])->name('product.show');



// Combined root route
Route::get('/', function () {
    return auth()->check() ? redirect('/commercefootshop') : app(WelcomeController::class)->index();
})->name('welcome');




Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');
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


Route::middleware('auth')->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('profile.order');
});


Route::get('/orders/{order}', [OrderController::class, 'getOrderEntries'])->name('order.show');

Route::middleware('auth')->group(function () {
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order/success', [OrderController::class, 'orderSuccess'])->name('order.success');
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
Route::get('/wishlist', [WishlistController::class, 'index'])->name('profile.wishList');

//drop from wish list
Route::delete('/wishlist/drop', [WishlistController::class, 'dropProduct'])->name('profile.dropWishlist');

// Load authentication routes

require __DIR__ . '/auth.php';
