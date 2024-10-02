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
                <section class="bg-black text-white p-8 flex justify-between items-center">
                    <h1 class="text-6xl font-bold">Foot Collection</h1>
                    <img src="https://s3-alpha-sig.figma.com/img/12b6/9cdc/b388ebc0a3376cc06ca83363eb03a031?Expires=1728259200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=bfXAzW7p6ruLdWf0C6Xxks-EKJfcUtOhzcY1SOrRkhApk-aKtYR8oG~LYIl5RLP13mrrCj3AcBSCi29mIlNBN9yXNx8hvrzrDgdjPexrOfzYco2po0oVE4CTFnOnTYMs-BQ~3N-LlwgHP9kBHu13avUkrf8qkw7FjAeZ-eSQeMaldCrlCvfKGFedxF5cof3W2X8Qo5BF0xGsea~EeuZeuOuADhg5JyPiOTZLQBmsunyM9mBMDX0pI5g9hYR7dZ8hH9HbUhVGhjvv7Vb13AVK1HhEKy2uzJL6z5nlENkY0qzb50ICtpF8ISqimEQSHsUjUIaqJxUwoAG7ZPM7TVrieA__" alt="Featured Shoe" class="w-80 h-80 object-contain">
                </section>

                <section class="p-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">Shop by Categories</h2>
                    </div>

                    <div class="grid grid-cols-4 gap-4 rounded-lg">
                        @foreach($products as $product)
                            <div class="bg-gray-200 h-96 flex flex-col justify-between items-center p-4 rounded-lg">
                                <!-- Display Product Image -->
                                <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}" class="w-64 h-64 object-contain rounded-lg">

                                <!-- Product Name -->
                                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>

                                <!-- Product Price -->
                                <p class="text-gray-700">${{ number_format($product->price, 2) }}</p>

                                <!-- Link to Product Page -->
                                <a href="{{ route('product.show', $product->id) }}" class="bg-black text-white px-4 py-2 rounded">
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
</x-app-layout>
    </body>
</html>
