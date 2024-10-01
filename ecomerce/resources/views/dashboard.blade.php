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
                        <div class="space-x-2">
                            <button class="bg-gray-200 p-2 rounded">&larr;</button>
                            <button class="bg-gray-200 p-2 rounded">&rarr;</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        <div class="bg-gray-200 h-64">
                        <a href="/product"class="bg-black text-white px-4 py-2 rounded"></a>
                        </div>
                        <div class="bg-gray-200 h-64"></div>
                        <div class="bg-gray-200 h-64"></div>
                        <div class="bg-gray-200 h-64"></div>
                    </div>
                </section>
    </section>
</x-app-layout>
