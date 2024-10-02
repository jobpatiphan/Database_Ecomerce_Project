<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //add this line
use Illuminate\Support\Facades\Auth; //add this line
use Illuminate\Support\Facades\Storage; //add this line
use Illuminate\View\View;
use App\Models\Order; //add this line

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();

        return view('profile.order', compact('user', 'orders'));
    }
}
