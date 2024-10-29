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
}
