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
            <button onclick="closeNotification()" class="ml-4 text-white focus:outline-none">
                &times;
            </button>
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
                    <li><a href="#" class="{{ route('dashboard') }}">Shop</a></li>
                    <li><a href="#" class="text-black">Contact Us</a></li>
                </ul>
            </nav>
        </div>

        <div class="flex items-center space-x-4">
            <a href="#" class="text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </a>
            <a href="#" class="text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </a>
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
                <p class="text-xl text-gray-700">Category: {{ $product->id }}</p>


        <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <label for="product_amount" class="block text-gray-700 mb-2">Quantity:</label>
            <input type="number" id="product_amount" name="product_amount" value="1" min="1" max="{{ $product->stock }}" class="border border-gray-300 rounded-lg p-2 mb-4 w-24">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add to Cart</button>
        </form>


              
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-bold">Description</h2>
            <p class="mt-2 text-gray-600">{{ $product->description }}</p>
        </div>

        <a href="{{ route('dashboard') }}" class="mt-8 inline-block px-6 py-2 bg-gray-600 text-white rounded-lg">Back to Dashboard</a>
    </div>

    <!-- Add Tailwind's AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>
</body>
</html>
