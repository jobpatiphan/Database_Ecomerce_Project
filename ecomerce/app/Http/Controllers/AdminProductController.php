<?php
// app/Http/Controllers/Admin/AdminProductController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo upload
        ]);

        // Create a new product instance
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description; // Save description

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('products', 'public'); // Store in storage/app/public/products
            $product->photo = $path; // Save the path in the database
        }

        // Save the product
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Update the specified product in storage
    public function update(Request $request, Product $product)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo upload
        ]);

        // Update product details
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description; // Update description

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            // Store the new photo
            $path = $request->file('photo')->store('products', 'public');
            $product->photo = $path; // Save the new path in the database
        }

        // Save the updated product
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete the photo if it exists
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
