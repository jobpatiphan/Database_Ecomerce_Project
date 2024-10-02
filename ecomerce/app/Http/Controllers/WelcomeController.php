<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import your Product model

class WelcomeController extends Controller
{
    public function index()
    {
        // Use simple pagination
        $products = Product::simplePaginate(4); // Change the number to set how many products to show per page

        // Pass the products to the view
        return view('welcome', compact('products'));
    }
}

