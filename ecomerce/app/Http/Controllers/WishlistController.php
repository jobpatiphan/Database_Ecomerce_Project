<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View class
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $wishListEntries =Auth::user()->products_in_wish_list()->get(); //this get products
        
        return view('profile.wishlist', compact('wishListEntries', 'userId'));
    }
    public function addToWishlist(Request $request)
    {
        $user = Auth::user();
        $product = Product::find($request->product_id);

        // Check if product exists and is not already in the wishlist
        if ($product && !$user->products_in_wish_list()->where('product_id', $product->id)->exists()) {
            $user->products_in_wish_list()->attach($product->id);
            return redirect()->back()->with('success', 'Product added to your wishlist!');
        }

        return redirect()->back()->with('error', 'Product already in your wishlist or not found.');
    }

    // Remove product from wishlist
    public function removeFromWishlist(Request $request)
    {
        $user = Auth::user();
        $product = Product::find($request->product_id);

        // Check if product exists and is in the wishlist
        if ($product && $user->products_in_wish_list()->where('product_id', $product->id)->exists()) {
            $user->products_in_wish_list()->detach($product->id);
            return redirect()->back()->with('success', 'Product removed from your wishlist!');
        }

        return redirect()->back()->with('error', 'Product not found in your wishlist.');
    }
}
