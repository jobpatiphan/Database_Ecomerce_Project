<section>
<div class="flex flex-col md:flex-row">
<section class="md:w-3/4 mt-8 md:mt-0 md:ml-6">
        <h2 class="text-2xl font-bold mb-6">My Orders</h2>
        <div class="space-y-6">
            @foreach($orders as $order)
            <div class="flex justify-between items-center bg-white shadow-md rounded-lg p-4">
                <div class="flex items-center">
                    
                    <div class="ml-4">
                        <h4 class="font-semibold">Order :{{ $order->id}}</h4>
                        <p class="font-bold">Total price :{{ $order->total_price }}</p>
                    </div>
                </div>

                <div class="text-right">
                    <p class="text-sm {{ strtolower($order->status) == 'delivered' ? 'text-green-600' : 'text-orange-500' }}">
                        {{ $order->status }}
                    </p>
                    <p class="text-sm text-gray-500">{{ $order->status_message }}</p>
                </div>
                

                <div>
                    
                        <a href="{{ route('order.show', $order->id) }}">
                            <button class="mt-2 bg-blue-500 text-white py-2 px-4 rounded">View Order</button>
                        </a>
                      
                </div>
                
            </div>
            @endforeach
        </div>
    </section>
</section>
