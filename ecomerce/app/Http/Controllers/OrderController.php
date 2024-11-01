<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //add this line
use Illuminate\Support\Facades\Auth; //add this line
use Illuminate\Support\Facades\Storage; //add this line
use Illuminate\View\View;
use App\Models\Order; //add this line
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        
        return view('profile.order', compact('user', 'orders'));     
    }

    public function indexHistory()
    {
        $user = Auth::user();
        // Eager load products_in_order instead of orderEntries
        $orders = Order::with('products_in_order') // Change to 'products_in_order'
                        ->where('user_id', $user->id)
                        ->get();

        return view('profile.history', compact('user', 'orders'));
    }

    public function getOrderEntries($id)
{       
    $user = Auth::user();
    // ดึงข้อมูลจาก order_entry_products โดยใช้ Query Builder
    $orderEntries = DB::table('order_entry_products')->where('order_id', $id)->get();

    $order = Order::where('user_id', $user->id)
                ->where('id',$id)
                ->get()
                ->first();
    // $order = DB::table('orders')
    //             ->where('orders.id', $id) // เพิ่มเงื่อนไขตาม order_id
    //             ->select('orders.paid')
    //             ->get();

    // ตรวจสอบว่ามี order entries หรือไม่
    if ($orderEntries->isEmpty()) {
        return view('order.show', ['order' => $orderEntries]); // ส่งค่ากลับไปถ้าไม่มีข้อมูล
    }

    // ดึงข้อมูล product จาก order_entry_products
    $productIds = $orderEntries->pluck('product_id'); // ดึง product_id ทั้งหมด
    $products = DB::table('products')
                ->join('order_entry_products', 'products.id', '=', 'order_entry_products.product_id')
                ->whereIn('products.id', $productIds)
                ->where('order_entry_products.order_id', $id) // เพิ่มเงื่อนไขตาม order_id
                ->select('products.*', 'order_entry_products.product_amount')
                ->get();

    return view('order.show', compact('user','orderEntries', 'products','order'));
    }
    
    // สร้างอาเรย์ที่จะเก็บข้อมูลผลิตภัณฑ์รวมถึงค่าที่ซ้ำ
    // $productDetails = [];

    // foreach ($orderEntries as $entry) {
    //     // หาผลิตภัณฑ์จาก $products โดยใช้ product_id
    //     $product = $products->firstWhere('id', $entry->product_id);
        
    //     // ถ้าพบผลิตภัณฑ์ให้เพิ่มลงในอาเรย์
    //     if ($product) {
    //         $productDetails[] = $product;
    //     }
    // }

    public function pay($id)
{
    $user = Auth::user();

    // Fetch the user's order
    $order = Order::where('user_id', $user->id)
                ->where('id', $id)
                ->first();

    // Check if the order exists and is unpaid
    if ($order && $order->paid == 0) {
        // Update both 'paid' status and 'session' in the orders table
        $order->update([
            'paid' => 1,
            'session' => 'packing',
            
        ]);

        return redirect()->route('order.show', $id)->with('status', 'Order paid successfully');
    }

    return redirect()->route('order.show', $id)->withErrors('Unable to process payment for the order');
}

    public function cancel(Request $request)
{
    $user = Auth::user();
    $id = $request->input('id');  // Get the order ID from the form input

    // Fetch the user's order
    $order = Order::where('user_id', $user->id)
                ->where('id', $id)
                ->first();

    if ($order) {
        // Delete order entries from order_entry_products table
        DB::table('order_entry_products')->where('order_id', $id)->delete();

        // Delete the order itself
        $order->delete();

        return redirect()->route('profile.order')->with('status', 'Order canceled successfully');
    }

    return redirect()->route('order.show', $id)->withErrors('Unable to cancel the order');
}

    public function checkout(Request $request)
    {
        $user = auth()->user();
        $selectedItemIds = json_decode($request->input('selected_items'), true);

        // Validate that items were selected
        if (empty($selectedItemIds)) {
            return redirect()->route('profile.cart')->withErrors('Please select items to checkout!');
        }

        // Get only the selected items from cart
        $cartItems = $user->products_in_cart()
            ->whereIn('products.id', $selectedItemIds)
            ->get();

        // Calculate total price from selected items only
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->pivot->product_amount * $item->price;
        });

        DB::beginTransaction();

        try {
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $totalPrice,
            ]);

            // Add selected cart items to order_entry_products
            foreach ($cartItems as $item) {
                DB::table('order_entry_products')->insert([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_amount' => $item->pivot->product_amount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Remove only the selected items from cart
            $user->products_in_cart()->detach($selectedItemIds);

            DB::commit();

            return redirect()->route('order.show', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('There was an issue processing your order. Please try again.');
        }
    }

    /**
     * Display the order success page.
     */
    public function orderSuccess()
    {
        return view('order.success');  // Create a view to show order success
    }

    
}
