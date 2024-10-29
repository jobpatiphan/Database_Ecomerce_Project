<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import your Product model

class ContactUsController extends Controller
{
    public function Goto()
    {
        // Use simple pagination
        $products = Product::simplePaginate(4); // Change the number to set how many products to show per page

        // Pass the products to the contact_form view
        return view('contactUs.contact_form', compact('products')); // Ensure the view file is named contact_form.blade.php
    }

    public function send()
    {
        // Use simple pagination
        //$products = Product::simplePaginate(4); // Change the number to set how many products to show per page

        // Pass the products to the contact_form view
        //return view('contactUs.whenChickSendMessage'); // Ensure the view file is named contact_form.blade.php
        return view('contactUs.whenChickSendMessage');
    }
}
