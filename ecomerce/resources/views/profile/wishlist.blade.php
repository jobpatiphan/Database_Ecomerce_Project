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

   <main class="bg-gray-50 py-10">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12 gap-4">
                    
                        <div class="col-span-8 bg-white p-6 shadow-lg rounded-lg">
                            <table class="w-full">
                            
                            <tbody>
                            @if ($wishListEntries->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center py-4">Your wish list is empty.</td>
                                </tr>
                               
                @else
                    @foreach ($wishListEntries as $entry)
                    
                        <div class="border rounded-lg p-4 relative">
                        <form action="{{ route('profile.dropWishlist') }}" method="POST">
                                                @csrf
                                                @method('DELETE') <!-- Spoof DELETE request -->
                                                <input type="hidden" name="id" value="{{ $entry->id }}">
                                                <button class="text-red-500">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </form>
                            
                            <div class="w-25 h-25 bg-gray-200 ">
                                <img src="{{ asset($entry->photo) }}" alt="{{ $entry->name }}" class="w-full h-auto rounded-lg">
            
                            </div>
                            <a href="{{ route('product.show', $entry->id) }}" class="bg-black text-white px-4 py-2 rounded">
                                    View Product
                                </a>
                            <div class="text-center text-gray-500">
                                <p class="text-lg font-semibold">{{ $entry->name }}</p>
                                <p>${{ $entry->price }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
                            </tbody>
                            </table>

                        </div>

                    
                        
                    </div>
                </div>
            </main>
</x-app-layout>

                    








