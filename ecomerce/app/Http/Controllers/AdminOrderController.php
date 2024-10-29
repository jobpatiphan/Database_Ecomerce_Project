<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    // Display all customer orders for admin
    public function index()
    {
        $orders = Order::with('user')->get(); // Fetch all orders with user details
        return view('admin.orders.index', compact('orders'));
    }

    // Handle session update for a specific order
    public function updateSession(Request $request, Order $order)
    {
        // Validate the request
        $request->validate([
            'session' => 'required|in:packing,transport,success',
        ]);

        // Update the session status of the order
        $order->update([
            'session' => $request->session,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Order session updated successfully!');
    }
}
