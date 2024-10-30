<section>
<div class="flex flex-col md:flex-row">
<section class="md:w-3/4 mt-8 md:mt-0 md:ml-6">
        <h2 class="text-2xl font-bold mb-6">My Orders</h2>
        <div class="space-y-6">
            @foreach($orders as $order)
            @if($order->session != 'success')
            <div class="flex justify-between items-center bg-white shadow-md rounded-lg p-4">
                <div class="flex items-center">
                <div class="ml-4">
                        @php
                            $productList = []; // Initialize an array to hold product details
                            $maxLength = 80; // Set the maximum length for the product string
                            $totalLength = 0; // Initialize a counter for the total length
                        @endphp

                        @foreach($order->products_in_order as $product)
                            @php
                                // Format the product string
                                $productString = "{$product->name} ({$product->pivot->product_amount})";
                                $productLength = strlen($productString) + 2; // +2 for the comma and space
                                
                                // Check if adding this product exceeds the max length
                                if ($totalLength + $productLength > $maxLength) {
                                    // If it exceeds, break and set a flag for ellipsis
                                    $productList[] = '...'; // Add ellipsis to the list
                                    break; // Exit the loop if the max length is exceeded
                                }

                                // Append the product string to the list and update the total length
                                $productList[] = $productString;
                                $totalLength += $productLength;
                            @endphp
                        @endforeach

                        @if(count($productList) > 0)
                            <h4 class="font-semibold">Product: {{ implode(', ', $productList) }}</h4>
                        @else
                            <h4 class="font-semibold">No products found.</h4> <!-- Fallback if no products exist -->
                        @endif

                        <p class="font-bold">Total price: {{ $order->total_price }}</p>
                        <p class="font-bold">Time: {{ $order->created_at }}</p>
                        @if($order->paid == 0)
                            <p class="font-bold">Status: Unpaid</p>
                        @elseif($order->paid == 1)
                            <p class="font-bold">Status: Paid</p>
                            <p class="font-bold">Session: {{ $order->session }}</p>
                        @else
                            <p class="font-bold">Unknown Status</p>
                        @endif
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
            @endif
            @endforeach
        </div>
    </section>
</section>
