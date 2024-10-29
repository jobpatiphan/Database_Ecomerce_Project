<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> e5c62a01d7de66feac4388068d232f21781f81ce
