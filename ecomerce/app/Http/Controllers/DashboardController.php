<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
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
                'button_link' => '/products/15'
            ],
            [
                'image' => '/webpic/chinawat.jpg',
                'title' => 'SHEE Pastel Dream Sneakers',
                'description' => 'Pastel Dream Collection',
                'button_text' => 'Explore More',
                'button_link' => '/products/14'
            ],
            [
                'image' => '/webpic/chiang.jpg',
                'title' => 'Premium Performance',
                'description' => 'Engineered for elite athletes',
                'button_text' => 'View Details',
                'button_link' => '/shop'
            ],
        ];
        
        return view('dashboard', compact('products', 'slides'));
    }
}
