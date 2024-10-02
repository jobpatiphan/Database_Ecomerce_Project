<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View class
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $cartEntries =Auth::user()->products_in_cart()->get(); //this get products
        
        return view('profile.cart', compact('cartEntries', 'userId'));
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
    public function checkout(){
        //knack...
    }

    
}
