<x-app-layout>   
   <x-slot name="header">
       <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Foot Collection</title>
       <link rel="preconnect" href="https://fonts.bunny.net">
       <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
       @vite('resources/css/app.css')
       <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>

   </head>
   </x-slot>

   <main class="bg-gray-50 py-10">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12 gap-4">
                    
                        <div class="col-span-8 bg-white p-6 shadow-lg rounded-lg">
                            <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="text-left text-gray-600">Product</th>
                                    <th class="text-left text-gray-600">Price</th>
                                    <th class="text-left text-gray-600">Quantity</th>
                                    <th class="text-left text-gray-600">Subtotal</th>
                                    <th class="text-left text-gray-600">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cartEntries->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center py-4">Your cart is empty.</td>
                                </tr>
                               
                                @else
                                @php $sum = 0; @endphp  <!-- Initialize the $sum variable -->

                                @foreach ($cartEntries as $entry)

                                    @php
                                       $sum += (float) $entry->price * (float)$entry->pivot->product_amount;
                                   @endphp
                                    <tr class="border-t">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div class="w-16 h-16 bg-gray-200">
                                                <img src="{{ asset($entry->photo) }}" alt="{{ $entry->name }}" class="w-full h-auto rounded-lg">
            
                                                </div>
                                                <div class="ml-4">
                                                    <p>{{ $entry->name }}</p>
                                                    <p class="text-sm text-gray-500">size: {{ $entry->pivot->size }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">{{ $entry->price }}</td>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                 <!-- decrease -->
                                                <form action="{{ route('profile.decreaseAmount') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $entry->id }}">
                                                    <button type="submit" class="px-2 py-1 border border-gray-300">-</button>
                                                </form>
                                                
                                                <input type="text" value="{{ $entry->pivot->product_amount }}" class="w-12 text-center border-t border-b border-gray-300 mx-2">
                                                
                                                <!-- increase -->
                                                <form action="{{ route('profile.increaseAmount') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $entry->id }}">
                                                    <button type="submit" class="px-2 py-1 border border-gray-300">+</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="py-4">{{ number_format((float)$entry->price * (float)$entry->pivot->product_amount, 2) }}</td>
                                        <td class="py-4">
                                            <!-- drop -->
                                            <form action="{{ route('profile.drop') }}" method="POST">
                                                @csrf
                                                @method('DELETE') <!-- Spoof DELETE request -->
                                                <input type="hidden" name="id" value="{{ $entry->id }}">
                                                <button class="text-red-500">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                <td>
                                <div class="col-span-4 bg-gray-100 p-6 shadow-lg rounded-lg">
                                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                                        <div class="flex justify-between py-2 border-t">
                                            <span>Subtotal</span>
                                            <span>{{ number_format($sum, 2) }}</span>
                                        </div>
                                        <div class="flex justify-between py-2 border-t">
                                            <span>Grand Total</span>
                                            <span>{{ number_format($sum, 2) }}</span>
                                        </div>

                                        <!-- checkout knack -->
                                        <button class="w-full bg-black text-white py-2 mt-4 rounded">Proceed to Checkout</button>
                                    </div>
                                    </td>
                                    
                                @endif
                                
                            </tbody>
                            </table>

                        </div>

                    
                        
                    </div>
                </div>
            </main>
</x-app-layout>

                    
