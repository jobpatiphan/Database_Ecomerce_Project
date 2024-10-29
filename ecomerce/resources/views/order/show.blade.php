<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col sm:flex-row sm:space-x-6">
            <div class="container">
                <h2 class="text-2xl font-bold mb-6">Order Details</h2>

                <div class="bg-white shadow-md rounded-lg p-4">
                @php $sum = 0; @endphp  <!-- Initialize the $sum variable -->

                    <ul class="mt-4">
                        @foreach($products as $item)
                            <li class="mb-4">
                                <div class="flex items-center">
                                    <img src="{{ asset($item->photo) }}" class="w-16 h-16 object-cover rounded-md" alt="{{ $item->name }}">
                                    <div class="ml-4">
                                        <h4 class="font-semibold">{{ $item->name }}</h4>
                                        <p class="text-sm text-gray-600">Qty: {{ $item->product_amount }}</p>
                                        <p class="font-bold">${{ $item->price }}</p>
                                        @php
                                            $sum += (float) $item->price * (float)$item->product_amount;
                                        @endphp
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                  
                    <!-- Address Section -->
                    <div class="bg-blue-50 p-4 rounded-md mb-6">
                        <h3 class="text-lg font-semibold mb-2 text-blue-700">Address</h3>
                        <p class="text-gray-700">{{ $user->address }}</p>
                    </div>

                    <!-- Address Section -->
                    <div class="bg-blue-50 p-4 rounded-md mb-6">
                        <h3 class="text-lg font-semibold mb-2 text-blue-700">Status</h3>
                        
                        @if($order->paid == 0)
                            <p class="text-gray-700">Unpaid</p>
                        @elseif($order->paid == 1)
                            <p class="text-gray-700">Paid</p>
                        @else
                            <p class="text-gray-700">Unknown Status</p> <!-- Optional handling of any other cases -->
                        @endif
                    </div>


                    <!-- Summary Section -->
                    <div class="col-span-4 bg-gray-100 p-6 shadow-lg rounded-lg">
                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                        <div class="flex justify-between py-2 border-t">
                            <span>Subtotal</span>
                            <span>${{ number_format($sum, 2) }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-t">
                            <span>Grand Total</span>
                            <span>${{ number_format($sum, 2) }}</span>
                        </div>
                        @if($order->paid == 0)
                        <form action="{{ route('profile.orderPayment', ['id' => $order->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                Pay
                            </button>
                        </form>
                        <form action="{{ route('profile.orderCancel') }}" method="POST">
                            @csrf
                            @method('DELETE') <!-- Spoof DELETE request -->
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                Cancel
                            </button>
                        </form>


                        @endif
                    @if($order->session == 'success')
                        <form action="{{ route('history.show') }}" method="GET" class="inline">
                            
                            @csrf
                            <button type="submit" class="flex items-center p-2 text-white bg-blue-500 hover:bg-blue-600 rounded-lg">
                                <span class="ml-3">Back</span>
                            </button>
                           
                        </form>
                    @else
                        <form action="{{ route('profile.order') }}" method="GET" class="inline">
                            
                            @csrf
                            <button type="submit" class="flex items-center p-2 text-white bg-blue-500 hover:bg-blue-600 rounded-lg">
                                <span class="ml-3">Back</span>
                            </button>
                           
                        </form>
                    @endif

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
