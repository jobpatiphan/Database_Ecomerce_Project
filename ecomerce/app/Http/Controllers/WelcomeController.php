<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import your Product model

class WelcomeController extends Controller
{
    public function index()
    {
        // Retrieve all products
        $products = Product::all(); // Get all products

        // Pass the products to the view
        return view('welcome', compact('products'));
    }
}