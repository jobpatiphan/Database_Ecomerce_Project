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
    public function index()
    {
        $user = Auth::user();
        
        // Set all in_order values to "no" for every item in the cart
        $user->products_in_cart()->update(['in_order' => 'no']);

        // Retrieve updated cart entries
        $cartEntries = $user->products_in_cart()->get();

        return view('profile.cart', compact('cartEntries'));
    }


    public function increaseAmount(Request $request)
    {
        $id = $request->input('id'); // Get the id from the form input
        $userId = Auth::id();
        $cartEntries = Auth::user()->products_in_cart()->findOrFail($id); // Get the product in the cart
    
        $cartEntries->pivot->product_amount += 1; // Increase the amount
        $cartEntries->pivot->save(); // Save the updated pivot
    
        return redirect()->route('profile.cart')->with('status', 'Product amount increased successfully');
    }

    public function decreaseAmount(Request $request){
        $id = $request->input('id'); // Get the id from the form input
        $userId = Auth::id();
        $cartEntries = Auth::user()->products_in_cart()->findOrFail($id); // Get the product in the cart
    
        $cartEntries->pivot->product_amount -= 1; // Increase the amount
        $cartEntries->pivot->save(); // Save the updated pivot
    
        return redirect()->route('profile.cart')->with('status', 'Product amount decreased successfully');
    }

    public function dropProduct(Request $request)
    {
        $id = $request->input('id'); // Get the product ID from the form input
        $user = Auth::user(); // Get the authenticated user
    
        // Detach the product from the user's cart (pivot table), instead of deleting the product
        $user->products_in_cart()->detach($id);
    
        return redirect()->route('profile.cart')->with('status', 'Product removed from cart successfully');
    }
    
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $selectedItems = json_decode($request->input('selected_items'), true);

        // Remove only selected items from the cart
        $user->products_in_cart()->wherePivotIn('id', $selectedItems)
            ->wherePivot('in_order', 'yes')
            ->detach();

        return redirect()->route('order.success')->with('status', 'Checkout successful');
    }


    public function updateInOrder(Request $request)
    {
        $id = $request->input('id');
        $inOrder = $request->input('in_order');

        $user = Auth::user();
        $cartEntry = $user->products_in_cart()->findOrFail($id);
        $cartEntry->pivot->in_order = $inOrder;
        $cartEntry->pivot->save();

        return response()->json(['message' => 'Item updated successfully']);
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

