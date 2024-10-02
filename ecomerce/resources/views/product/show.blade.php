<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <!-- Add Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
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

    <!-- Header Section -->
    <header class="bg-white p-4 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="https://s3-alpha-sig.figma.com/img/5134/8590/a8d3f72db06db56329330056bc97ed68?Expires=1728259200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=DAeG6B-fX1ZavXbo4g53r9THwyL662fFJzdqZ5L0aQEklrwy9GDrEXXh~McNic8fHFOM-eEvLymdKxznnTgxDimI2f9fTYjCA2JJdrj7iz9sgtbaoIUXNX7Eb~I9LGRJNUopuWUMZ~ACr76mGQ6MsWthFDqMW9DqAjHUcbJP93Z1HRNHOyruvpD-22MMpWFxUnjMcT6xq28u7o~NHqIz-jtpUeeHjZ-nUFoX1xkQU1DUKgwptzTOaVk-O7PjJMIKnc6jArIjguOnsWOTyULnxtXjRAQ~LsDWKux6G~ir03p2KdQiPpCCb1f6w~lrFQKGRHDQ2gZBWr~EUx4g9pqTtA__" alt="Logo" class="w-10 h-10 rounded-lg mr-4">
                    <nav>
                        <ul class="flex space-x-4">
                            <li><a href="{{ route('dashboard') }}" class="text-black">Home</a></li>
                            <li><a href="#" class="text-black">Shop</a></li>
                            <li><a href="#" class="text-black">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></a>
                    <a href="#" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></a>
                    <div x-data="{ open: false }" @click.away="open = false" class="relative">
                        <button @click="open = ! open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </button>

                        <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                            <!-- Dropdown content -->
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

    <!-- Product Section -->
    <div class="container mx-auto p-4">
        <div class="product-page flex">
            <!-- Product Image -->
            <div class="w-1/2">
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
                    <label for="product_amount" class="text-gray-700">FAVARITE:</label>
                        <button type="submit">
                            <svg :class="favorite ? 'text-red-500' : 'text-gray-400'" class="w-6 h-6 cursor-pointer" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </button>
                    </div>
                </form>
                <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    
                    <div class="flex items-center space-x-4">
                        <!-- Quantity Label and Input -->
                        <div class="flex items-center space-x-2">
                            <label for="product_amount" class="text-gray-700">Quantity:</label>
                            <input type="number" id="product_amount" name="product_amount" value="1" min="1" max="{{ $product->stock }}" class="border border-gray-300 rounded-lg p-2 w-24">
                        </div>
                        
                        <!-- Add to Cart Button -->
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add to Cart</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>

        <!-- Tabs Section -->
        <div x-data="{ activeTab: 'description' }" class="mt-8">
            <div class="flex space-x-4">
                <button @click="activeTab = 'description'" :class="activeTab === 'description' ? 'border-b-4 border-black' : ''" class="pb-2 text-lg font-bold focus:outline-none">Description</button>
                <button @click="activeTab = 'otherProduct'" :class="activeTab === 'otherProduct' ? 'border-b-4 border-black' : ''" class="pb-2 text-lg font-bold focus:outline-none">Other Products</button>
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
                                    <!-- Display Product Image -->
                                    <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}" class="w-64 h-64 object-contain rounded-lg">

                                    <!-- Product Name -->
                                    <h3 class="text-lg font-semibold">{{ $item->name }}</h3>

                                    <!-- Product Price -->
                                    <p class="text-gray-700">${{ number_format($item->price, 2) }}</p>

                                    <!-- Link to Product Page -->
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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>
</body>
</html>
