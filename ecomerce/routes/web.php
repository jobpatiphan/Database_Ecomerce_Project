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
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Models\User;
use App\Http\Controllers\ContactUs;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    if (Auth::check()) {
        $user = User::find(auth()->id()); 
        if (!$user)
        {
            return app(WelcomeController::class)->index();
        }
        else if ($user->is_admin) {
            return redirect('/admin/products');
        }
        else {
            return redirect('/com');
    }
}
    else {
        return app(WelcomeController::class)->index();
    }

});


Route::middleware(['auth'])->group(function () {
    Route::group([], function () {
        Route::get('/admin/products', function () {
            $user = User::find(auth()->id());
            if ($user && $user->is_admin) {
                return app(AdminProductController::class)->index();
            }
            abort(403, 'Unauthorized action.');
        })->name('admin.products.index');

        Route::get('/admin/products/create', function () {
            $user = User::find(auth()->id());
            if ($user && $user->is_admin) {
                return app(AdminProductController::class)->create();
            }
            abort(403, 'Unauthorized action.');
        })->name('admin.products.create');

        Route::post('/admin/products', function (\Illuminate\Http\Request $request) {
            $user = User::find(auth()->id());
            if ($user && $user->is_admin) {
                return app(AdminProductController::class)->store($request);
            }
            abort(403, 'Unauthorized action.');
        })->name('admin.products.store');

        Route::get('/admin/products/{product}/edit', function (App\Models\Product $product) {
            $user = User::find(auth()->id());
            if ($user && $user->is_admin) {
                return app(AdminProductController::class)->edit($product);
            }
            abort(403, 'Unauthorized action.');
        })->name('admin.products.edit');

        Route::put('/admin/products/{product}', function (\Illuminate\Http\Request $request, App\Models\Product $product) {
            $user = User::find(auth()->id());
            if ($user && $user->is_admin) {
                return app(AdminProductController::class)->update($request, $product);
            }
            abort(403, 'Unauthorized action.');
        })->name('admin.products.update');

        Route::delete('/admin/products/{product}', function (App\Models\Product $product) {
            $user = User::find(auth()->id());
            if ($user && $user->is_admin) {
                return app(AdminProductController::class)->destroy($product);
            }
            abort(403, 'Unauthorized action.');
        })->name('admin.products.destroy');

        Route::get('/admin/orders', function () {
            $user = User::find(auth()->id());
            if ($user && $user->is_admin) {
                return app(AdminOrderController::class)->index();
            }
            abort(403, 'Unauthorized action.');
        })->name('admin.orders');

        Route::post('/admin/orders/{order}/update-session', function (\Illuminate\Http\Request $request, App\Models\Order $order) {
            $user = User::find(auth()->id());
            if ($user && $user->is_admin) {
                return app(AdminOrderController::class)->updateSession($request, $order);
            }
            abort(403, 'Unauthorized action.');
        })->name('admin.orders.updateSession');
    });
});


Route::put('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');




Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');


//Page shop 
Route::get('/products', [ProductController::class, 'index'])->name('product.index');

Route::get('/shop', [ProductController::class, 'index'])->name('shop.shopProduct');

//Page contact 
Route::get('/contactUs', [ContactUsController::class, 'Goto'])->name('contactUs.index');
Route::get('/sendUs', [ContactUsController::class, 'send'])->name('senD');


Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::get('/contact', function () {
    return view('contact');
});

// Product show route
Route::get('products/{productId}', [ProductController::class, 'show'])->name('product.show');



Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');
// Dashboard route with middleware
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/com', [DashboardController::class, 'index'])->name('dashboard');
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


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('profile.cart');

        // Product show route
    Route::get('products/{productId}', [ProductController::class, 'show'])->name('product.show');

    Route::post('/product/{product}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


    //increase
    Route::post('/cart/increase', [CartController::class, 'increaseAmount'])->name('profile.increaseAmount');
    //decrease
    Route::post('/cart/decrease', [CartController::class, 'decreaseAmount'])->name('profile.decreaseAmount');
    //drop
    Route::delete('/cart/drop', [CartController::class, 'dropProduct'])->name('profile.drop');

    //wish list part
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('profile.wishList');

    //drop from wish list
    Route::delete('/wishlist/drop', [WishlistController::class, 'dropProduct'])->name('profile.dropWishlist');

    // Load authentication routes
    Route::post('/order/paid/{id}', [OrderController::class, 'pay'])->name('profile.orderPayment');

    // Define your route to accept POST requests
    Route::delete('/order/cancel', [OrderController::class, 'cancel'])->name('profile.orderCancel');

    Route::get('/orders/{order}', [OrderController::class, 'getOrderEntries'])->name('order.show');

    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order/success', [OrderController::class, 'orderSuccess'])->name('order.success');
    Route::get('/history', [OrderController::class, 'indexHistory'])->name('history.show');
});



require __DIR__.'/auth.php';