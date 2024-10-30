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
        $products = Product::all(); // Set the number of products per page

        return view('product.show', compact('product', 'products'));
    }

    // Show method for displaying all products
    public function index(Request $request)
{   
    // Start with a base query
    $query = Product::query();

    // Validate inputs
    $validatedData = $request->validate([
        'search' => 'nullable|string|max:255',
        'min_price' => 'nullable|numeric|min:0',
        'max_price' => [
            'nullable',
            'numeric',
            'min:0',
            function ($attribute, $value, $fail) use ($request) {
                if ($request->filled('min_price') && $value < $request->min_price) {
                    $fail('Maximum price cannot be less than minimum price.');
                }
            }
        ],
        'sort_price' => 'nullable|in:asc,desc'
    ]);

    // Filter by name (if provided)
    if ($request->filled('search')) {
        $query->where('name', 'LIKE', '%' . $request->search . '%');
    }

    // Filter by price range
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    // Apply price sorting if specified
    if ($request->filled('sort_price')) {
        $query->orderBy('price', $request->sort_price);
    }

    $products = $query->get();

    // Flash old input values back to the form
    if ($request->hasAny(['search', 'min_price', 'max_price', 'sort_price'])) {
        $request->flash();
    }

    // Pass any validation errors to the view
    return view('shop.shopProduct', compact('products'))
        ->with('filter_applied', $request->hasAny(['search', 'min_price', 'max_price', 'sort_price']));
}

    

}