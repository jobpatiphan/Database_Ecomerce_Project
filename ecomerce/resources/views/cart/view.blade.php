<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Include your CSS here (e.g., Bootstrap, Tailwind) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white p-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="https://your-logo-url.com/logo.png" alt="Logo" class="w-10 h-10 rounded-lg mr-4">
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="text-black">Home</a></li>
                    <li><a href="#" class="text-black">Shop</a></li>
                    <li><a href="#" class="text-black">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <div class="flex items-center space-x-4">
            <!-- User actions can be added here -->
            <a href="#" class="text-gray-600">Cart</a>
            <div>
                <div>{{ Auth::user()->name }}</div>
                <!-- Dropdown for user actions (Profile, Logout) -->
            </div>
        </div>
    </header>

    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold">Your Cart</h1>

        @if($cartItems->isEmpty())
            <p class="mt-4">Your cart is empty.</p>
            <a href="{{ route('shop') }}" class="text-blue-500 mt-4 inline-block">Continue Shopping</a>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Product</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                        <th class="py-2 px-4 border-b">Total Price</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->pivot->product_amount }}</td>
                            <td class="py-2 px-4 border-b">${{ number_format($item->pivot->total_price, 2) }}</td>
                            <td class="py-2 px-4 border-b">
                                <!-- You can add buttons to remove items or update quantities here -->
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                <a href="{{ route('checkout') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Proceed to Checkout</a>
            </div>
        @endif
    </div>
</body>
</html>
