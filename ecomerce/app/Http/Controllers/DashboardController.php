<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
<<<<<<< HEAD
    {
        $products = Product::all();
        $slides = [
            [
                'image' => '/webpic/hom.png',
                'title' => 'Nike Air Force 1',
                'description' => 'Classic Style Meets Modern Comfort',
                'button_text' => 'Shop Now',
                'button_link' => route('shop.shopProduct') // Update this line
            ],
            [
                'image' => '/webpic/presenter.jpg',
                'title' => 'New Collection 2024',
                'description' => 'Discover the latest in athletic innovation',
                'button_text' => 'Explore More',
                'button_link' => '#' // Keep as is or update with a valid route
            ],
            [
                'image' => '/webpic/presenter_walk.jpg',
                'title' => 'Premium Performance',
                'description' => 'Engineered for elite athletes',
                'button_text' => 'View Details',
                'button_link' => '#' // Keep as is or update with a valid route
            ],
        ];
        
        return view('dashboard', compact('products', 'slides'));
    }
=======
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
>>>>>>> 0e7e1f3d24063b588d0577f645b67f77c9c78d17
}
