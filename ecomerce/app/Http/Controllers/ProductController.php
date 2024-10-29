<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show method for displaying both product list and a specific product
    public function show($productId)
    {
        // Fetch the specific product by ID using Eloquent
        $product = Product::find($productId);

        // Check if the product was found
        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found.');
        }

        // Fetch paginated product list (for the index functionality)
        $products = Product::simplePaginate(6); // Set the number of products per page

        return view('product.show', compact('product', 'products'));
    }

    // Show method for displaying all products
    public function index()
    {   // Fetch all products with pagination
        $products = Product::simplePaginate(6); // Set the number of products per page

        return view('shop.shopProduct', compact('products'));
    }

}
