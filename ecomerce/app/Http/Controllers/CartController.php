<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Import the View class

class CartController extends Controller
{
    public function show(Request $request): View
    {
        // Return the 'profile.cart' view
        return view('profile.cart');
    }
}
