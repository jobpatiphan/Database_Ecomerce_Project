<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import your Product model

class WelcomeController extends Controller
{
   
    public function index()
{
    $products = Product::all();
    $slides = [
        [
            'image' => '/webpic/sanpawat.jpg',
            'title' => 'CyberStride High-Tops',
            'description' => 'High-top silhouette for enhanced support',
            'button_text' => 'Shop Now',
            'button_link' => '/login'
        ],
        [
            'image' => '/webpic/chinawat.jpg',
            'title' => 'SHEE Pastel Dream Sneakers',
            'description' => 'Pastel Dream Collection',
            'button_text' => 'Explore More',
            'button_link' => '/login'
        ],
        [
            'image' => '/webpic/chiang.jpg',
            'title' => 'Premium Performance',
            'description' => 'Engineered for elite athletes',
            'button_text' => 'View Details',
            'button_link' => '/login'
        ],
    ];
    
    return view('welcome', compact('products', 'slides'));
}
}