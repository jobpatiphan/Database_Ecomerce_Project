<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import your Product model

class FooterController extends Controller
{
    public function acc()
    {
        return view('layouts.profile-page');
    }

    public function login()
    {
        return view('layouts.profile-page');
    }

    public function mycart()
    {
        return view('profile.cart');
    }

    public function mywishlist()
    {
        return view('profile.wishlist');
    }

    public function checkout()
    {
        return view('profile.order');
    }
}
