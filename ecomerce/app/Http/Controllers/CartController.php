<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View class
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CartController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $user = Auth::user();
        $userId = Auth::id();
        $cartEntries = $user->products_in_cart()->get(); 

        return view('profile.cart', compact('cartEntries', 'userId', 'user'));
    }

    public function increaseAmount(Request $request)
    {
        $id = $request->input('id'); // Get the id from the form input
        $userId = Auth::id();
        $cartEntry = Auth::user()->products_in_cart()->findOrFail($id); // Get the product in the cart

        // Get the current amount and stock
        $currentAmount = $cartEntry->pivot->product_amount;
        $productStock = $cartEntry->stock; // Assuming you have a relationship to access the stock

        // Check if the current amount can be increased without exceeding the stock
        if ($currentAmount < $productStock) {
            $cartEntry->pivot->product_amount += 1; // Increase the amount
            $cartEntry->pivot->save(); // Save the updated pivot
            return redirect()->route('profile.cart')->with('status', 'Product amount increased successfully');
        } else {
            return redirect()->route('profile.cart')->with('error', 'Cannot increase quantity over stock limit');
        }
    }


    public function decreaseAmount(Request $request)
    {
        $id = $request->input('id'); // Get the id from the form input
        $userId = Auth::id();
        $cartEntry = Auth::user()->products_in_cart()->findOrFail($id); // Get the product in the cart

        // Check if product_amount is greater than 0
        if ($cartEntry->pivot->product_amount > 1) {
            $cartEntry->pivot->product_amount -= 1; // Decrease the amount
            $cartEntry->pivot->save(); // Save the updated pivot
        }
        
        return redirect()->route('profile.cart')->with('status', 'Product amount decreased successfully');
    }


    public function dropProduct(Request $request)
{
    $productId = $request->input('id'); // Get the product id from the request
    $size = $request->input('size'); // Get the size from the request
    $user = Auth::user(); // Get the authenticated user
    
    
    // Detach the product with the specified size from the user's cart
    $user->products_in_cart()
         ->wherePivot('product_id', $productId)
         ->wherePivot('size', $size)
         ->detach();

    return redirect()->route('profile.cart')->with('status', 'Product removed from cart successfully');
}

  
    public function add(Request $request)
    {
        // Enable query logging
        \DB::enableQueryLog();
    
        $user = Auth::user();  // Get the authenticated user
    
        // Check if the user is authenticated
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to add items to the cart.');
        }
    
        // Get product, quantity, and size
        $product = Product::find($request->id);
        $quantity = $request->product_amount;
        $size = $request->size;
    
        // Check if product is available
        if (!$product || $product->stock < $quantity) {
            return redirect()->back()->with('error', 'Product not available in the requested quantity.');
        }
    
        // Check if the product is already in the user's cart for the selected size
        $cartEntry = $user->products_in_cart()->where('product_id', $product->id)->where('size', $size)->first();
    
        if ($cartEntry) {
            // Update the existing entry in the cart
            $user->products_in_cart()->updateExistingPivot($product->id, [
                'product_amount' => $cartEntry->pivot->product_amount + $quantity,
                'total_price' => ($cartEntry->pivot->product_amount + $quantity) * $product->price,
                'size' => $size,  // Ensure size is updated
            ]);
        } else {
            // Add new product to cart
            $user->products_in_cart()->attach($product->id, [
                'product_amount' => $quantity,
                'total_price' => $quantity * $product->price,
                'size' => $size,  // Attach size information
            ]);
        }
    
        // Log the executed queries
        Log::info(\DB::getQueryLog());
    
        return redirect()->back()->with('success', 'Product added to cart!');
    }
    

    
}

