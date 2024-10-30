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

    <section class="bg-black text-white p-8 flex justify-between items-center">
        <h1 class="text-6xl font-bold">Shoes Collection</h1>
        <img src="/webpic/hom.png" alt="Featured Shoe" class="w-80 h-80 object-contain">
    </section>

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
                                <a href="{{ route('product.show', $product->id) }}" class="bg-black text-white px-4 py-2 rounded">
                                    View Product
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Navigation Buttons under Products -->
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
        </div>
    </section>
</x-app-layout>