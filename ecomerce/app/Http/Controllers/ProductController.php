<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show($productId)
    {
        // Use raw SQL to select the product based on id
        $product = DB::select('SELECT * FROM products WHERE id = ?', [$productId]);

        // Check if the product was found
        if (empty($product)) {
            if(AUTH::check()) {
            return redirect()->route('dashboard')->with('error', 'Product not found.');
            }
            return redirect()->route('welcome')->with('error', 'Product not found.');
            
        }

        // Assuming $product is an array, we can get the first item
        return view('product.show', ['product' => $product[0]]);
    }
}
