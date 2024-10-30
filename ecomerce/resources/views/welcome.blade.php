<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shoes Collection</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="min-h-screen">
            <header class="bg-white p-4 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="/webpic/logo.png" alt="Logo" class="w-10 h-10 rounded-lg mr-4">
                    <nav>
                        <ul class="flex space-x-4">
                            <li><a href="#" class="text-black">Home</a></li>
                            <li><a href="#" class="text-black">Shop</a></li>
                            <li><a href="#" class="text-black">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></a>
                    <a href="{{ route('login') }}" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></a>
                    <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded">Login</a>
                </div>
            </header>

            <main>

                
                 <!-- Container -->
                 <div class="relative max-w-full mx-auto">
                        
                        <!-- Background Image Section -->
                        <div class="relative">
                            <img src="{{ asset('/webpic/presenter_walk.jpg') }}"
                             alt="Cloudfoam Walking" class="w-full h-auto object-cover">

                            <!-- Overlay Text Section -->
                            <div class="absolute bottom-8 left-8 bg-white bg-opacity-90 p-4 rounded-lg shadow-md max-w-xs">
                                <h2 class="text-lg font-bold uppercase text-gray-800">Nike Adapt BB 2.0.</h2>
                                <p class="text-sm text-gray-600 mt-1">Endless Comfort with Nike Adapt BB 2.0.</p>
                                <a href="#" class="inline-block mt-4 px-5 py-2 bg-black text-white font-semibold text-sm rounded hover:bg-gray-800 transition">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                        
                        
                    </div>

                    <section class="p-8" x-data="{ currentIndex: 0, productsPerPage: 2 }">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">Shop by Categories</h2>
                    </div>

                    <div class="relative">
                        <!-- Slide Bar -->
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
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Navigation Buttons under Products -->
                        <div class="flex justify-between mt-4">
                            <button @click="currentIndex = Math.max(currentIndex - productsPerPage, 0)"
                                    class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition-colors">
                                &larr; Previous
                            </button>

                            <button @click="currentIndex = Math.min(currentIndex + productsPerPage, Math.ceil({{ count($products) }} / productsPerPage) - 1)"
                                    class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition-colors">
                                Next &rarr;
                            </button>
                        </div>
                    </div>
                

                <div class="max-w-4xl mx-auto py-12">

                    <!-- Image Section -->
                    <div class="flex flex-col items-center md:flex-row bg-black shadow-lg rounded-lg overflow-hidden">
                        <div class="w-full md:w-1/2 p-6 bg-black">
                            <img src="{{ asset('/webpic/hom.png') }}" alt="Tatum 3" class="w-full h-auto object-cover">
                        </div>
                        <div class="w-full md:w-1/2 flex items-center justify-center bg-black text-white p-6">
                            <img src="{{ asset('/webpic/presenter.jpg') }}" alt="Jayson" class="w-full h-auto object-cover">
                        </div>
                    </div>

                    <!-- Text Section -->
                    <div class="text-center py-8">
                        <h2 class="text-xl font-semibold text-gray-500">Nike Air Force 1 High 'Bubble Pop' Edition</h2>
                        <h1 class="text-4xl font-bold text-gray-800 mt-2">Pop Your Reality</h1>
                        <p class="text-gray-700 mt-4 px-6">
                        Make a statement with these eye-catching Nike Air Force 1 High sneakers featuring a playful bubble pattern design. The black and white color blocking is accented with vibrant neon green laces and multicolored polka dots, creating a perfect blend of classic style and modern pop art aesthetics.
                        </p>
                        <button class="mt-8 px-8 py-3 bg-black text-white font-semibold rounded-full hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-opacity-50">
                            Shop now
                        </button>
                    </div>

                </div>

                

                   

                </section>
            </main>

            <footer class="bg-black text-white p-8">
                <div class="flex justify-between">
                    <div>
                        <img src="/webpic/logo.png" alt="Footer Logo" class="w-12 h-12 mb-2">
                        <h3 class="text-xl font-bold">COMMERS FOOT SHOP</h3>
                        <p class="text-sm">SLOGAN HERE</p>
                        <p class="text-sm mt-2">devil.graves15@gmail.com</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Follow Us</h3>
                        <ul class="mt-2">
                            <li><a href="#" class="text-gray-300">Instagram</a></li>
                            <li><a href="#" class="text-gray-300">Twitter</a></li>
                            <li><a href="#" class="text-gray-300">Facebook</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Contact Us</h3>
                        <p class="text-sm">123 Shoe St, City, State, 12345</p>
                        <p class="text-sm">+1 234 567 890</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>