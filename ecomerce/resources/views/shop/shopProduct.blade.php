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

    <section class="bg-gray-100 p-20 ">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl ">Product categories</h2>
        </div>

        <div class="grid grid-cols-4 gap-4 rounded-lg">
            @foreach ($products as $product)
                <div class="bg-gray-200 h-96 flex flex-col justify-between items-center p-4 rounded-lg">
                    <!-- Display Product Image -->
                    <img src="{{ asset($product->photo) }}" alt="{{ $product->name }}"
                        class="w-64 h-64 object-contain rounded-lg">

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
                    <span class="disabled text-gray-400 font-bold px-4 py-2 rounded bg-gray-200">1</span>
                @else
                    <a href="{{ $products->previousPageUrl() }}"
                        class="text-white bg-black hover:bg-gray-700 px-4 py-2 rounded transition duration-200">
                        1
                    </a>
                @endif

                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}"
                        class="text-white bg-black hover:bg-gray-700 px-4 py-2 rounded transition duration-200">
                        2
                    </a>
                @else
                    <span class="disabled text-gray-400 font-bold px-4 py-2 rounded bg-gray-200">2</span>
                @endif
            </div>
        </div>

    </section>

</x-app-layout>