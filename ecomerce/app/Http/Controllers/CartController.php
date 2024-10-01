<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View class
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function show(Request $request): View
    {
        // Return the 'profile.cart' view
        return view('profile.cart');
    }
        public function index()
    {
        $userId = Auth::id();
        $cartEntries =Auth::user()->with('products_in_cart')->get();
        return view('profile.cart', compact('cartEntries', 'userId'));
    }
    // public function index()
    // {
    //     // Retrieve the products in the cart for the authenticated user
    //     $cartEntries = Auth::user()->users_cart()->with('products')->get(); // Use get() to execute the query

    //     // Check if the cart is empty
    //     if ($cartEntries->isEmpty()) {
    //         // Handle the case when the cart is empty (optional)
    //         return view('profile.cart', ['cartEntries' => [], 'userId' => Auth::id()]);
    //     }

    //     // Passing the authenticated user's ID
    //     $userId = Auth::id();

    //     // Return the view with cart entries and userId
    //     return view('profile.cart', compact('cartEntries', 'userId'));
    // }


    
}
