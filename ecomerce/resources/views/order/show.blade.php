<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col sm:flex-row sm:space-x-6">
<div class="container">
    <h2 class="text-2xl font-bold mb-6">Order Details</h2>

    <div class="bg-white shadow-md rounded-lg p-4">
        
        <ul class="mt-4">
            @foreach($products as $item)
            <li class="mb-4">
                <div class="flex items-center">
                <img src="{{ asset($item->photo) }}" class="w-16 h-16 object-cover rounded-md" alt="{{ $item->name }}">
                    <div class="ml-4">
                        <h4 class="font-semibold">{{ $item->name }}</h4>
                        <p class="text-sm text-gray-600">Qty:{{ $item->product_amount }} </p>
                        <p class="font-bold">${{ $item->price }}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
</div>
        </div>
        
</x-app-layout>
