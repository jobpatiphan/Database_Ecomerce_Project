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

    <body class="bg-gray-100">
        <!-- Notification Section -->
        @if(session('success'))
            <div id="notification" class="bg-green-500 text-white p-4 rounded-md mb-4 flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button onclick="closeNotification()" class="ml-4 text-white focus:outline-none">&times;</button>
            </div>
        @endif

        <!-- JavaScript to close notification -->
        <script>
            function closeNotification() {
                const notification = document.getElementById('notification');
                if (notification) {
                    notification.style.display = 'none'; // Hide the notification
                }
            }

            // Auto-hide notification after 5 seconds
            window.onload = function() {
                const notification = document.getElementById('notification');
                if (notification) {
                    setTimeout(closeNotification, 5000); // Close after 5000ms (5 seconds)
                }
            }
        </script>

        <div class="container mx-auto p-4">
            <div class="product-page flex">
                <!-- Product Image -->
                <div class="w-1/4">
                    <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg">
                </div>

                <!-- Product Details -->
                <div class="w-1/2 ml-8">
                    <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                    <p class="text-xl text-gray-700 mt-4">Price: ${{ number_format($product->price, 2) }}</p>
                    <p class="text-xl text-gray-700">Stock: {{ $product->stock }}</p>

                    <!-- Heart Icon for Wishlist -->
                    <form action="{{ $product->isInWishlist(Auth::user()) ? route('wishlist.remove') : route('wishlist.add') }}" method="POST" class="mt-4 flex items-center">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div x-data="{ favorite: {{ $product->isInWishlist(Auth::user()) ? 'true' : 'false' }} }">
                            <label for="product_amount" class="text-gray-700">FAVOURITE:</label>
                            <button type="submit">
                                <svg :class="favorite ? 'text-red-500' : 'text-gray-400'" class="w-6 h-6 cursor-pointer" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Add to Cart Form -->
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                                <label for="product_amount" class="text-gray-700">Quantity:</label>
                                <input type="number" id="product_amount" name="product_amount" value="1" min="1" max="{{ $product->stock }}" class="border border-gray-300 rounded-lg p-2 w-20">
                            </div>

                            <div class="flex items-center space-x-2">
                                <label for="size" class="text-gray-700 text-lg">Size:</label>
                                <select id="size" name="size" class="border border-gray-300 rounded-lg p-3 text-lg w-20">
                                    @for ($i = 36; $i <= 47; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add to Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tab Navigation -->
            <div x-data="{ activeTab: 'description' }" class="mt-8">
                <div class="flex space-x-4">
                    <button 
                        @click="activeTab = 'description'" 
                        :class="activeTab === 'description' ? 'border-b-4 border-black' : 'border-b-4 border-white'" 
                        class="pb-2 text-lg font-bold focus:outline-none">
                        Description
                    </button>
                    
                    <button 
                        @click="activeTab = 'otherProduct'" 
                        :class="activeTab === 'otherProduct' ? 'border-b-4 border-black' : 'border-b-4 border-white'" 
                        class="pb-2 text-lg font-bold focus:outline-none">
                        Other Products
                    </button>
                </div>

                <!-- Tab Contents -->
                <div class="tab-content mt-4">
                    <!-- Description Tab Content -->
                    <div x-show="activeTab === 'description'">
                        <h2 class="text-2xl font-bold">Description</h2>
                        <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                    </div>

                    <!-- Other Products Tab Content -->
                    <div x-show="activeTab === 'otherProduct'">
                        <h2 class="text-2xl font-bold">Other Products</h2>
                        <section class="p-8">
                            <div class="grid grid-cols-6 gap-3 rounded-lg">
                                @foreach($products as $item)
                                    @if ($item->id == $product->id)
                                        @continue
                                    @endif
                                    <div class="bg-gray-200 h-96 flex flex-col justify-between items-center p-4 rounded-lg">
                                        <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}" class="w-32 h-32 object-contain rounded-lg">
                                        <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                                        <p class="text-gray-700">${{ number_format($item->price, 2) }}</p>
                                        <a href="{{ route('product.show', $item->id) }}" class="bg-black text-white px-4 py-2 rounded">
                                            View Product
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Pagination Controls -->
                            <div class="flex justify-center mt-4">
                                <div class="flex space-x-2">
                                    @if ($products->onFirstPage())
                                        <span class="disabled cursor-not-allowed text-gray-400 font-bold px-4 py-2 rounded bg-gray-200">&larr; Previous</span>
                                    @else
                                        <a href="{{ $products->previousPageUrl() }}" class="text-white bg-black hover:bg-gray-700 px-4 py-2 rounded transition duration-200">
                                            &larr; Previous
                                        </a>
                                    @endif

                                    @if ($products->hasMorePages())
                                        <a href="{{ $products->nextPageUrl() }}" class="text-white bg-black hover:bg-gray-700 px-4 py-2 rounded transition duration-200">
                                            Next &rarr;
                                        </a>
                                    @else
                                        <span class="disabled cursor-not-allowed text-gray-400 font-bold px-4 py-2 rounded bg-gray-200">Next &rarr;</span>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add AlpineJS for interactivity -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
    </body>
</x-app-layout>
