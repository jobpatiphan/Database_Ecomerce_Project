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
            'image' => '/webpic/hom.png',
            'title' => 'Nike Air Force 1',
            'description' => 'Classic Style Meets Modern Comfort',
            'button_text' => 'Shop Now',
            'button_link' => '#'
        ],
        [
            'image' => '/webpic/presenter.jpg',
            'title' => 'New Collection 2024',
            'description' => 'Discover the latest in athletic innovation',
            'button_text' => 'Explore More',
            'button_link' => '#'
        ],
        [
            'image' => '/webpic/presenter_walk.jpg',
            'title' => 'Premium Performance',
            'description' => 'Engineered for elite athletes',
            'button_text' => 'View Details',
            'button_link' => '#'
        ],
    ];
    
    return view('dashboard', compact('products', 'slides'));
}
   

}
