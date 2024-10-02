<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Foot Collection</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="min-h-screen">
            <header class="bg-white p-4 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="https://s3-alpha-sig.figma.com/img/5134/8590/a8d3f72db06db56329330056bc97ed68?Expires=1728259200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=DAeG6B-fX1ZavXbo4g53r9THwyL662fFJzdqZ5L0aQEklrwy9GDrEXXh~McNic8fHFOM-eEvLymdKxznnTgxDimI2f9fTYjCA2JJdrj7iz9sgtbaoIUXNX7Eb~I9LGRJNUopuWUMZ~ACr76mGQ6MsWthFDqMW9DqAjHUcbJP93Z1HRNHOyruvpD-22MMpWFxUnjMcT6xq28u7o~NHqIz-jtpUeeHjZ-nUFoX1xkQU1DUKgwptzTOaVk-O7PjJMIKnc6jArIjguOnsWOTyULnxtXjRAQ~LsDWKux6G~ir03p2KdQiPpCCb1f6w~lrFQKGRHDQ2gZBWr~EUx4g9pqTtA__" alt="Logo" class="w-10 h-10 rounded-lg mr-4">
                    <nav>
                        <ul class="flex space-x-4">
                            <li><a href="#" class="text-black">Home</a></li>
                            <li><a href="#" class="text-black">Shop</a></li>
                            <li><a href="#" class="text-black">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></a>
                    <a href="#" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></a>
                    <a href="{{ route('login') }}"class="bg-black text-white px-4 py-2 rounded">Login</a>
                </div>
            </header>

            <main>
                <section class="bg-black text-white p-8 flex justify-between items-center">
                    <h1 class="text-6xl font-bold">Foot Collection</h1>
                    <img src="https://s3-alpha-sig.figma.com/img/12b6/9cdc/b388ebc0a3376cc06ca83363eb03a031?Expires=1728259200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=bfXAzW7p6ruLdWf0C6Xxks-EKJfcUtOhzcY1SOrRkhApk-aKtYR8oG~LYIl5RLP13mrrCj3AcBSCi29mIlNBN9yXNx8hvrzrDgdjPexrOfzYco2po0oVE4CTFnOnTYMs-BQ~3N-LlwgHP9kBHu13avUkrf8qkw7FjAeZ-eSQeMaldCrlCvfKGFedxF5cof3W2X8Qo5BF0xGsea~EeuZeuOuADhg5JyPiOTZLQBmsunyM9mBMDX0pI5g9hYR7dZ8hH9HbUhVGhjvv7Vb13AVK1HhEKy2uzJL6z5nlENkY0qzb50ICtpF8ISqimEQSHsUjUIaqJxUwoAG7ZPM7TVrieA__" alt="Featured Shoe" class="w-80 h-80 object-contain">
                </section>

                <section class="p-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">Shop by Categories</h2>
                    </div>

                    <div class="grid grid-cols-4 gap-4">
                        @foreach($products as $product)
                        <div class="bg-gray-200 h-96 flex flex-col justify-between items-center p-4 rounded-lg">
                                <!-- Display Product Image -->
                                <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}" class="w-64 h-64 object-contain rounded-lg">

                                <!-- Product Name -->
                                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>

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


            </main>

            <footer class="bg-black text-white p-8">
                <div class="flex justify-between">
                    <div>
                        <img src="/path-to-footer-logo.png" alt="Footer Logo" class="w-12 h-12 mb-2">
                        <h3 class="text-xl font-bold">COMMERS FOOT SHOP</h3>
                        <p class="text-sm">SLOGAN HERE</p>
                        <p class="text-sm mt-2">devilark2020@gmail.com</p>
                    </div>
                    <div>
                        <h4 class="font-bold mb-2">Information</h4>
                        <ul class="space-y-1">
                            <li><a href="#" class="text-sm">My Account</a></li>
                            <li><a href="#" class="text-sm">Login</a></li>
                            <li><a href="#" class="text-sm">My cart</a></li>
                            <li><a href="#" class="text-sm">My Wishlist</a></li>
                            <li><a href="#" class="text-sm">Checkout</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-center mt-8 text-sm">&copy;2024 commers all Rights are reserved</p>
            </footer>
        </div>
    </body>
</html>
