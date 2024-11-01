<x-app-layout>   
   <x-slot name="header">
       <head>
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>Shoes Collection</title>
           <link rel="preconnect" href="https://fonts.bunny.net">
           <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
           @vite('resources/css/app.css')
           <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
       </head>
   </x-slot>

   <main class="bg-gray-50 py-10" x-data="{ 
       selectedItems: new Set(),
       calculateTotal() {
           let total = 0;
           for (const id of this.selectedItems) {
               const item = this.$refs[`item_${id}`];
               if (item) {
                   total += parseFloat(item.dataset.price) * parseFloat(item.dataset.quantity);
               }
           }
           return total;
       },
       toggleItem(id, checked) {
           if (checked) {
               this.selectedItems.add(id);
           } else {
               this.selectedItems.delete(id);
           }
       }
   }">
       <div class="container mx-auto px-4">
           <div class="flex justify-center">
               <div class="w-full max-w-4xl bg-white p-8 shadow-lg rounded-lg">
                   <h1 class="text-2xl font-semibold mb-6 text-center text-gray-800">Shopping Cart</h1>
                   <table class="min-w-full">
                       <thead>
                           <tr class="border-b border-gray-200">
                               <th class="py-4 px-6 text-center text-gray-600 font-medium w-16">Select</th>
                               <th class="py-4 px-6 text-left text-gray-600 font-medium">Product</th>
                               <th class="py-4 px-6 text-center text-gray-600 font-medium">Price</th>
                               <th class="py-4 px-6 text-center text-gray-600 font-medium">Quantity</th>
                               <th class="py-4 px-6 text-center text-gray-600 font-medium">Subtotal</th>
                               <th class="py-4 px-6 text-center text-gray-600 font-medium w-16">Delete</th>
                           </tr>
                       </thead>
                       <tbody>
                        @if ($cartEntries->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-8 text-gray-500">Your cart is empty.</td>
                            </tr>
                        @else
                            @foreach ($cartEntries as $entry)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors" 
                                    x-ref="item_{{ $entry->id }}" 
                                    data-price="{{ $entry->price }}" 
                                    data-quantity="{{ $entry->pivot->product_amount }}">
                                    <td class="py-6 px-6 text-center">
                                        <input type="checkbox" 
                                            @change="toggleItem({{ $entry->id }}, $event.target.checked)"
                                            class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                    </td>
                                    <td class="py-6 px-6">
                                        <div class="flex items-center">
                                            <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                                                <img src="{{ asset('storage/' . $entry->photo) }}" alt="{{ $entry->name }}" class="object-cover w-full h-full">
                                            </div>
                                            <div class="ml-6">
                                                <a href="{{ route('product.show', $entry) }}" class="text-lg font-semibold text-gray-800 hover:underline">{{ $entry->name }}</a>
                                                <p class="text-sm text-gray-500 mt-1">Size: {{ $entry->pivot->size }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-6 px-6 text-center text-gray-800">${{ number_format($entry->price, 2) }}</td>
                                    <td class="py-6 px-6">
                                        <div class="flex items-center justify-center">
                                            <form action="{{ route('profile.decreaseAmount') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $entry->id }}">
                                                <button type="submit" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors">
                                                    <span class="text-gray-600">-</span>
                                                </button>
                                            </form>
                                            <input type="text" value="{{ $entry->pivot->product_amount }}" 
                                                class="w-12 text-center border-t border-b border-gray-300 mx-2 py-1 text-gray-800" readonly>
                                            <form action="{{ route('profile.increaseAmount') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $entry->id }}">
                                                <button type="submit" class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-100 transition-colors">
                                                    <span class="text-gray-600">+</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="py-6 px-6 text-center font-medium text-gray-800">
                                        ${{ number_format((float)$entry->price * (float)$entry->pivot->product_amount, 2) }}
                                    </td>
                                    <td class="py-6 text-center">
                                        <form action="{{ route('profile.drop') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $entry->id }}">
                                            <input type="hidden" name="size" value="{{ $entry->pivot->size }}">
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6">
                                    <div class="bg-gray-50 p-6 mt-8 rounded-lg">
                                        <h2 class="text-lg font-semibold mb-4 text-gray-800">Order Summary</h2>
                                        <div class="flex justify-between py-3 border-t border-gray-200">
                                            <span class="text-gray-600">Selected Items Total</span>
                                            <span class="font-medium text-gray-800" x-text="'$' + calculateTotal().toFixed(2)"></span>
                                        </div>
                                        @if ($user->address === null)
                                            <div class="flex items-center justify-center h-full p-4 border border-red-500 bg-red-500 text-white rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8z" />
                                                </svg>
                                                <span class="text-white font-semibold">No address found. Please add an address before proceeding to checkout.</span>
                                            </div>
                                            <div class="flex justify-end mt-4">
                                                <a href="/profile" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    Add Address
                                                </a>
                                            </div>
                                        @else
                                            <div class="flex justify-end mt-6">
                                                <form action="{{ route('checkout') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="selected_items" x-bind:value="JSON.stringify(Array.from(selectedItems))">
                                                    <button type="submit" 
                                                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors font-medium"
                                                            x-bind:disabled="selectedItems.size === 0"
                                                            x-bind:class="{'opacity-50 cursor-not-allowed': selectedItems.size === 0}">
                                                        Proceed to Checkout
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endif
                       </tbody>
                   </table>
               </div>
           </div>
       </div>  
   </main>
</x-app-layout>