<?php

// App\Http\Controllers\CartController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // Enable query logging
        \DB::enableQueryLog();

        $user = Auth::user();  // Get the authenticated user

        // Check if the user is authenticated
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to add items to the cart.');
        }

        // Get product and quantity
        $product = Product::find($request->id);
        $quantity = $request->product_amount;

        // Check if product is available
        if (!$product || $product->stock < $quantity) {
            return redirect()->back()->with('error', 'Product not available in the requested quantity.');
        }

        // Check if the product is already in the user's cart
        $cartEntry = $user->products_in_cart()->where('product_id', $product->id)->first(); // Updated method name

        if ($cartEntry) {
            // Update the existing entry in the cart
            $user->products_in_cart()->updateExistingPivot($product->id, [ // Updated method name
                'product_amount' => $cartEntry->pivot->product_amount + $quantity,
                'total_price' => ($cartEntry->pivot->product_amount + $quantity) * $product->price,
            ]);
        } else {
            // Add new product to cart
            $user->products_in_cart()->attach($product->id, [ // Updated method name
                'product_amount' => $quantity,
                'total_price' => $quantity * $product->price,
            ]);
        }

        // Log the executed queries
        Log::info(\DB::getQueryLog());

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function view()
    {
        $user = Auth::user();
        $cartItems = $user->products_in_cart; // Updated method name

        return view('cart.view', ['cartItems' => $cartItems]);
    }
}

