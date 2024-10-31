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

    <section class="bg-gray-100 p-20">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl">All Product</h2>
        </div>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Filter Form -->
        <div class="bg-white p-4 mb-6 rounded-lg shadow">
            <form action="{{ route('shop.shopProduct') }}" method="GET" class="flex gap-4 items-start">
                <!-- Search by name -->
                <div class="flex flex-col">
                    <label for="search" class="mb-1 text-gray-600">Search Product</label>
                    <input type="text" 
                           id="search"
                           name="search" 
                           value="{{ old('search', request('search')) }}"
                           placeholder="Search products..." 
                           class="border rounded p-2 w-40 text-gray-500 placeholder-gray-400">
                    @error('search')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Price range -->
                <div class="flex flex-col">
                    <label class="mb-1 text-gray-600">Price Range</label>
                    <div class="flex gap-2">
                        <div class="flex flex-col">
                            <input type="number" 
                                   id="min_price"
                                   name="min_price" 
                                   value="{{ old('min_price', request('min_price')) }}"
                                   placeholder="Min price" 
                                   min="0"
                                   step="0.01"
                                   oninput="validatePriceRange()"
                                   class="border rounded p-2 w-40 text-gray-500 placeholder-gray-400">
                            @error('min_price')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <span class="self-center text-gray-500">-</span>
                        <div class="flex flex-col">
                            <input type="number" 
                                   id="max_price"
                                   name="max_price" 
                                   value="{{ old('max_price', request('max_price')) }}"
                                   placeholder="Max price" 
                                   min="0"
                                   step="0.01"
                                   oninput="validatePriceRange()"
                                   class="border rounded p-2 w-40 text-gray-500 placeholder-gray-400">
                            @error('max_price')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- JavaScript validation error message -->
                    <span id="priceRangeError" class="text-red-500 text-sm mt-1 hidden"></span>
                </div>

                <!-- Sort by price -->
                <div class="flex flex-col">
                    <label for="sort_price" class="mb-1 text-gray-600">Sort by Price</label>
                    <select name="sort_price" 
                            id="sort_price" 
                            class="border rounded p-2 w-40 text-gray-500">
                        <option value="" class="text-gray-500">Select order</option>
                        <option value="asc" {{ old('sort_price', request('sort_price')) == 'asc' ? 'selected' : '' }} class="text-gray-500">
                            Low to High
                        </option>
                        <option value="desc" {{ old('sort_price', request('sort_price')) == 'desc' ? 'selected' : '' }} class="text-gray-500">
                            High to Low
                        </option>
                    </select>
                    @error('sort_price')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Buttons: Filter and Reset -->
                <div class="flex flex-col items-start gap-2 mt-6">
                    <div class="flex space-x-2">
                        <!-- Submit button -->
                        <button type="submit" class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800">
                            Filter
                        </button>

                        <!-- Reset button -->
                        @if(isset($filter_applied) && $filter_applied)
                            <a href="{{ route('shop.shopProduct') }}" class="bg-gray-500 text-white px-6 py-2 rounded-full hover:bg-gray-600">
                                Reset
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- Update JavaScript validation -->
        <script>
            function validatePriceRange() {
                const minPrice = document.getElementById('min_price');
                const maxPrice = document.getElementById('max_price');
                const errorSpan = document.getElementById('priceRangeError');
                
                // Reset error message
                errorSpan.classList.add('hidden');
                
                // Validate minimum price is not negative
                if (minPrice.value && parseFloat(minPrice.value) < 0) {
                    errorSpan.textContent = 'Minimum price cannot be negative';
                    errorSpan.classList.remove('hidden');
                    return;
                }
                
                // Validate maximum price is not negative
                if (maxPrice.value && parseFloat(maxPrice.value) < 0) {
                    errorSpan.textContent = 'Maximum price cannot be negative';
                    errorSpan.classList.remove('hidden');
                    return;
                }
                
                // Validate max price is greater than min price
                if (minPrice.value && maxPrice.value && 
                    parseFloat(maxPrice.value) < parseFloat(minPrice.value)) {
                    errorSpan.textContent = 'Maximum price cannot be less than minimum price';
                    errorSpan.classList.remove('hidden');
                    return;
                }
            }
        </script>

        <!-- Products Grid -->
        <div class="grid grid-cols-4 gap-4 rounded-lg">
            @foreach ($products as $product)
                <div class="bg-gray-200 h-96 flex flex-col justify-between items-center p-4 rounded-lg">
                    <!-- Display Product Image -->
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}"
                        class="w-64 h-64 object-contain rounded-lg">

                    <!-- Product Name -->
                    <h3 class="text-lg font-semibold">{{ Str::limit($product->name, 20, ' ...') }}</h3>

                    <!-- Product Price -->
                    <p class="text-gray-700">${{ number_format($product->price, 2) }}</p>

                    <!-- Link to Product Page -->
                    @if (Auth::check())
                        <a href="{{ route('product.show', $product->id) }}" class="bg-black text-white px-4 py-2 rounded">
                            View Product
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded">
                            Login to View Product
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
