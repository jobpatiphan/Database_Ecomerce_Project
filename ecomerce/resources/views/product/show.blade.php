<x-app-layout>
    <x-slot name="header">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>{{ $product->name }} - Shoes Collection</title>
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
            @vite('resources/css/app.css')
            <style>
                .star-rating {
                    display: inline-flex;
                    align-items: center;
                }
                .star-rating svg {
                    transition: all 0.2s ease;
                }
                .star-rating:hover svg {
                    transform: scale(1.05);
                }
            </style>
        </head>
    </x-slot>

    <body class="bg-gray-100">
        <!-- Notification Section -->
        @if(session('success'))
            <div id="notification" class="fixed bottom-4 right-4 bg-green-500 text-white p-4 rounded-md shadow-lg flex justify-between items-center"
                 x-data="{ show: true }" 
                 x-show="show" 
                 x-init="setTimeout(() => show = false, 5000)">
                <span>{{ session('success') }}</span>
                <button @click="show = false" class="ml-4 text-white focus:outline-none">&times;</button>
            </div>
        @endif

        <div class="container mx-auto p-4">
            <div class="product-page flex flex-col md:flex-row gap-8">
                <!-- Product Image -->
                <div class="w-full md:w-1/4">
                    <img src="{{ asset('storage/' . $product->photo) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-96 object-contain rounded-lg shadow-lg">
                </div>

                <!-- Product Details -->
                <div class="w-full md:w-1/2">
                    <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                    
                    <!-- Average Rating Display -->
                    <div class="flex items-center mt-2 mb-4">
                        <div class="star-rating">
                            @php
                                $averageRating = $product->averageRating();
                                $fullStars = floor($averageRating);
                                $halfStar = $averageRating - $fullStars >= 0.5;
                                $emptyStars = 5 - ceil($averageRating);
                            @endphp
                            
                            @for ($i = 1; $i <= $fullStars; $i++)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                            
                            @if ($halfStar)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                    <defs>
                                        <linearGradient id="half">
                                            <stop offset="50%" stop-color="currentColor"/>
                                            <stop offset="50%" stop-color="#e5e7eb"/>
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#half)" d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endif
                            
                            @for ($i = 1; $i <= $emptyStars; $i++)
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                </svg>
                            @endfor
                            
                            <span class="ml-2 text-gray-600">
                                {{ number_format($averageRating, 1) }} 
                                <span class="text-gray-500">({{ $product->totalReviews() }} {{ Str::plural('review', $product->totalReviews()) }})</span>
                            </span>
                        </div>
                    </div>

                    <p class="text-xl text-gray-700">Price: ${{ number_format($product->price, 2) }}</p>
                    <p class="text-xl text-gray-700">Stock: {{ $product->stock }}</p>

                    @guest
                        <a href="{{ route('login') }}" class="focus:outline-none">
                            <svg class="w-6 h-6 text-gray-400 cursor-pointer transition-colors duration-200" 
                                 fill="currentColor" 
                                 xmlns="http://www.w3.org/2000/svg" 
                                 viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </a>
                    @endguest

                    <!-- Heart Icon for Wishlist -->
                    @auth
                        <form action="{{ $product->isInWishlist(Auth::user()) ? route('wishlist.remove') : route('wishlist.add') }}" 
                              method="POST" 
                              class="mt-4 flex items-center">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div x-data="{ favorite: {{ $product->isInWishlist(Auth::user()) ? 'true' : 'false' }} }">
                                <label class="text-gray-700 mr-2">FAVORITE:</label>
                                <button type="submit" class="focus:outline-none">
                                    <svg :class="favorite ? 'text-red-500' : 'text-gray-400'" 
                                         class="w-6 h-6 cursor-pointer transition-colors duration-200" 
                                         fill="currentColor" 
                                         xmlns="http://www.w3.org/2000/svg" 
                                         viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endauth

                    <!-- Add to Cart Form -->
                    <form action="{{ route('cart.add') }}" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center space-x-2">
                                <label for="product_amount" class="text-gray-700">Quantity:</label>
                                <input type="number" 
                                       id="product_amount" 
                                       name="product_amount" 
                                       value="1" 
                                       min="1" 
                                       max="{{ $product->stock }}" 
                                       class="border border-gray-300 rounded-lg p-2 w-20"
                                       @guest disabled @endguest>
                            </div>

                            <div class="flex items-center space-x-2">
                                <label for="size" class="text-gray-700">Size:</label>
                                <select id="size" 
                                        name="size" 
                                        class="border border-gray-300 rounded-lg p-2 w-20"
                                        @guest disabled @endguest>
                                    @for ($i = 36; $i <= 47; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            @guest
                                <a href="{{ route('login') }}" 
                                   class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                    Login to Add to Cart
                                </a>
                            @else
                                <button type="submit" 
                                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                    Add to Cart
                                </button>
                            @endguest
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabs Section -->
            <div x-data="{ activeTab: 'description' }" class="mt-12">
                <!-- Tab Navigation -->
                <div class="flex space-x-4 border-b border-gray-200">
                    <button @click="activeTab = 'description'" 
                            :class="activeTab === 'description' ? 'border-b-2 border-black' : ''" 
                            class="pb-2 px-4 text-lg font-semibold focus:outline-none">
                        Description
                    </button>
                    <button @click="activeTab = 'otherProduct'" 
                            :class="activeTab === 'otherProduct' ? 'border-b-2 border-black' : ''" 
                            class="pb-2 px-4 text-lg font-semibold focus:outline-none">
                        Other Products
                    </button>
                    <button @click="activeTab = 'reviews'" 
                            :class="activeTab === 'reviews' ? 'border-b-2 border-black' : ''" 
                            class="pb-2 px-4 text-lg font-semibold focus:outline-none">
                        Reviews
                    </button>
                </div>

                <!-- Tab Contents -->
                <div class="mt-6">
                    <!-- Description Tab -->
                    <div x-show="activeTab === 'description'">
                        <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                    </div>

                    <!-- Other Products Tab -->
                    <div x-show="activeTab === 'otherProduct'">
                        <h2 class="text-2xl font-bold">Other Products</h2>
                        <section section class="p-8" x-data="{ currentIndex: 0, productsPerPage: 2 }">
                            <div class="overflow-hidden">
                                <div class="flex transition-transform" :style="'transform: translateX(-' + (currentIndex * (100 / productsPerPage)) + '%);'">
                                    @foreach($products as $product)
                                        <div class="w-1/4 flex-none p-2">
                                            <div class="bg-gray-200 h-96 flex flex-col justify-between items-center p-4 rounded-lg">
                                                <!-- Display Product Image -->
                                                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-64 object-contain rounded-lg">

                                                <!-- Product Name -->
                                                <h3 class="text-lg font-semibold">{{ Str::limit($product->name, 30, ' ...') }}</h3>

                                                <!-- Product Price -->
                                                <p class="text-gray-700">${{ number_format($product->price, 2) }}</p>

                                                <!-- Link to Product Page -->
                                                <a href="{{ route('product.show', $product->id) }}" class="bg-black text-white px-4 py-2 rounded">
                                                    View Product
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex justify-between mt-4">
                                <button @click="currentIndex = Math.max(currentIndex - productsPerPage, 0)"
                                        class="bg-black text-white px-4 py-2 rounded-l-lg">
                                    &larr; Previous
                                </button>

                                <button @click="currentIndex = Math.min(currentIndex + productsPerPage, Math.ceil({{ count($products) }} / productsPerPage) - 1)"
                                        class="bg-black text-white px-4 py-2 rounded-r-lg">
                                    Next &rarr;
                                </button>
                            </div>
                        </section>
                    </div>
                                        <!-- Reviews Tab Content -->
                    <div x-show="activeTab === 'reviews'" class="mt-8">
                        <h2 class="text-2xl font-bold mb-4">Reviews</h2>

                        <!-- Display existing comments -->
                        <div class="space-y-4">
                            @forelse($product->comments as $comment)
                                <div class="bg-white p-4 rounded-lg shadow-md">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <p class="font-semibold">{{ $comment->user->name }}</p>
                                            <span class="ml-4 text-yellow-500">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="inline w-5 h-5" fill="{{ $i <= $comment->star ? 'currentColor' : 'none' }}" 
                                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                    </svg>
                                                @endfor
                                            </span>
                                            <span class="ml-2 text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        @if($comment->user_id === auth()->id())
                                            <div class="flex items-center">
                                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="ml-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                    <p class="text-gray-700">{{ $comment->comment }}</p>
                                </div>
                            @empty
                                <div class="bg-gray-50 p-4 rounded-lg text-center">
                                    <p class="text-gray-600">No reviews yet. Be the first to review this product!</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Add Comment Form -->
                        <div class="mt-8">
                            <form action="{{ route('comments.store', $product->id) }}" method="POST" 
                                x-data="{ rating: 0, hoveredRating: 0 }" 
                                class="bg-white p-6 rounded-lg shadow-md">
                                @csrf

                                <!-- Star Rating -->
                                <div class="mb-4">
                                    <label class="block text-lg font-semibold mb-2">Rating:</label>
                                    <div class="flex space-x-1">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <button type="button" 
                                                    @click="rating = {{ $i }}" 
                                                    @mouseover="hoveredRating = {{ $i }}" 
                                                    @mouseleave="hoveredRating = 0" 
                                                    class="focus:outline-none transform transition-transform hover:scale-110">
                                                <svg class="w-8 h-8" 
                                                    :class="{'text-yellow-400': hoveredRating >= {{ $i }} || rating >= {{ $i }}, 'text-gray-300': hoveredRating < {{ $i }} && rating < {{ $i }}}"
                                                    fill="currentColor" 
                                                    viewBox="0 0 24 24">
                                                    <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                                </svg>
                                            </button>
                                        @endfor
                                    </div>
                                    <input type="hidden" name="star" x-model="rating" required>
                                    <div class="mt-1 text-sm text-gray-500" x-show="rating > 0">
                                        Selected rating: <span x-text="rating"></span> stars
                                    </div>
                                </div>

                                <!-- Comment Text Area -->
                                <div class="mb-4">
                                    <label for="comment" class="block text-lg font-semibold mb-2">Your Review:</label>
                                    <textarea name="comment" id="comment" rows="4" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            required></textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" 
                                        class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition-colors duration-200"
                                        x-bind:disabled="!rating"
                                        x-bind:class="{'opacity-50 cursor-not-allowed': !rating, 'hover:bg-blue-600': rating}">
                                    Submit Review
                                </button>
                            </form>
                        </div>

                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg" 
                                x-data="{ show: true }"
                                x-show="show"
                                x-init="setTimeout(() => show = false, 3000)">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    
        
        <!-- Add AlpineJS for interactivity -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
    </body>
</x-app-layout>
