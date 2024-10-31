<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show($productId)
    {
        $product = Product::with(['comments' => function($query) {
            // Order comments by newest first
            $query->orderBy('created_at', 'desc');
        }, 'comments.user'])->findOrFail($productId);
        
        $products = Product::all();

        return view('products.show', compact('product', 'products'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
            'star' => 'required|integer|between:1,5',
        ]);

        try {
            Comment::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'comment' => $request->comment,
                'star' => $request->star,
            ]);

            return redirect()->back()->with('success', 'Review added successfully.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Unable to save your review. Please try again.']);
        }
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->withErrors('You are not authorized to delete this comment.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}