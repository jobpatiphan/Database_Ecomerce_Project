<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6">
            <!-- Left Column: Product and Address -->
            <div class="lg:w-2/3">
                <h2 class="text-2xl font-bold mb-6">Order Details</h2>

                <!-- Order Process Tracker (only shows if session is not "none") -->
                @if(strtolower($order->session) !== 'none')
                    <div class="flex items-center justify-center my-8">
                        <!-- Packing -->
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full {{ strtolower($order->session) == 'packing' || strtolower($order->session) == 'transport' || strtolower($order->session) == 'success' ? 'bg-green-500' : 'bg-gray-300' }}"></div>
                            <p class="mt-2 text-sm font-semibold {{ strtolower($order->session) == 'packing' || strtolower($order->session) == 'transport' || strtolower($order->session) == 'success' ? 'text-green-600' : 'text-gray-600' }}">
                                Packing
                            </p>
                        </div>
                        <div class="h-1 w-16 {{ strtolower($order->session) == 'transport' || strtolower($order->session) == 'success' ? 'bg-green-500' : 'bg-gray-300' }}"></div>

                        <!-- Transport -->
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full {{ strtolower($order->session) == 'transport' || strtolower($order->session) == 'success' ? 'bg-green-500' : 'bg-gray-300' }}"></div>
                            <p class="mt-2 text-sm font-semibold {{ strtolower($order->session) == 'transport' || strtolower($order->session) == 'success' ? 'text-green-600' : 'text-gray-600' }}">
                                Transport
                            </p>
                        </div>
                        <div class="h-1 w-16 {{ strtolower($order->session) == 'success' ? 'bg-green-500' : 'bg-gray-300' }}"></div>

                        <!-- Success -->
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full {{ strtolower($order->session) == 'success' ? 'bg-green-500' : 'bg-gray-300' }}"></div>
                            <p class="mt-2 text-sm font-semibold {{ strtolower($order->session) == 'success' ? 'text-green-600' : 'text-gray-600' }}">
                                Success
                            </p>
                        </div>
                    </div>
                @endif
                
                <!-- Product List -->
                <div class="bg-white shadow-md rounded-lg p-4 mb-6">
                    @php $sum = 0; @endphp <!-- Initialize the $sum variable -->

                    <ul class="mt-4">
                        @foreach($products as $item)
                            <li class="mb-4 flex items-center">
                                <img src="{{ asset('storage/' . $item->photo) }}" class="w-16 h-16 object-cover rounded-md" alt="{{ $item->name }}">
                                <div class="ml-4">
                                    <h4 class="font-semibold">{{ $item->name }}</h4>
                                    <p class="text-sm text-gray-600">Qty: {{ $item->product_amount }}</p>
                                    <p class="font-bold">${{ $item->price }}</p>
                                    @php
                                        $sum += (float) $item->price * (float)$item->product_amount;
                                    @endphp
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Address Section -->
                <div class="bg-blue-50 p-4 rounded-md">
                    <h3 class="text-lg font-semibold mb-2 text-blue-700">Address</h3>
                    <p class="text-gray-700">{{ $user->address }}</p>
                </div>
            </div>

            <!-- Right Column: Summary and Actions -->
            <div class="lg:w-1/3">
                <!-- Summary Section -->
                <div class="bg-gray-100 p-6 shadow-lg rounded-lg mb-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>

                    <!-- Subtotal Section -->
                    <div class="flex justify-between py-2">
                        <span>Subtotal ({{ count($products) }} item{{ count($products) > 1 ? 's' : '' }})</span>
                        <span>${{ number_format($sum, 2) }}</span>
                    </div>
                    
                    <!-- Estimated Shipping Section -->
                    <div class="flex justify-between py-2 border-t">
                        <span>Estimated Shipping</span>
                        <span>$0.00</span>
                    </div>

                    <!-- Total Section -->
                    <div class="flex justify-between py-2 border-t font-bold">
                        <span>Total</span>
                        <span>${{ number_format($sum, 2) }}</span>
                    </div>
                </div>

                <!-- Status Section -->
                <div class="bg-blue-50 p-4 rounded-md mb-6">
                    <h3 class="text-lg font-semibold mb-2 text-blue-700">Status</h3>
                    <p class="text-gray-700">{{ $order->paid ? 'Paid' : 'Unpaid' }}</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap justify-between gap-4">
                    @if(strtolower($order->session) == 'success')
                        <form action="{{ route('history.show') }}" method="GET" class="inline">
                            @csrf
                            <button type="submit" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 shadow-lg hover:shadow-xl active:scale-95 font-semibold">
                                Back
                            </button>
                        </form>
                    @else
                        <form action="{{ route('profile.order') }}" method="GET" class="inline">
                            @csrf
                            <button type="submit" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 shadow-lg hover:shadow-xl active:scale-95 font-semibold">
                                Back
                            </button>
                        </form>
                    @endif
                    
                    @if($order->paid == 0)
                        <div class="ml-auto flex gap-4">
                            <form action="{{ route('profile.orderCancel') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 shadow-lg hover:shadow-xl active:scale-95 font-semibold">
                                    Cancel
                                </button>
                            </form>
                            <form action="{{ route('profile.orderPayment', ['id' => $order->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 shadow-lg hover:shadow-xl active:scale-95 font-semibold">
                                    Pay
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
