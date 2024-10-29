<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col sm:flex-row sm:space-x-6">
            <!-- Sidebar -->
            <div class="w-full sm:w-1/4 bg-white shadow-lg rounded-lg p-6">
                <div class="text-center">
                    <div class="rounded-full mx-auto mb-4" alt="User Image">
                        @include('profile.partials.update-profile-photo-form')
                    </div>
                    <h3 class="text-lg font-bold">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-600">Hello 👋</p>
                </div>
                <nav class="mt-8">
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">Personal Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.order') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">My Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.wishList') }}" class="flex items-center p-2 bg-black text-white rounded-lg">
                                <span class="ml-3">My Wishlists</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('history.show') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">My History</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <main class="w-full sm:w-3/4 bg-white shadow-lg rounded-lg p-6">
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

                                                <div class="flex items-center space-x-4">
                                                    <div class="w-24 h-24 bg-gray-200 overflow-hidden rounded-lg">
                                                        <img src="{{ asset($entry->photo) }}" alt="{{ $entry->name }}" class="w-full h-full object-cover"> <!-- Adjusting object-fit -->
                                                    </div>

                                                    <div class="flex-1">
                                                        <div class="text-center text-gray-500">
                                                            <p class="text-lg font-semibold">{{ $entry->name }}</p>
                                                            <p>${{ $entry->price }}</p>
                                                        </div>
                                                        <div class="flex justify-center mt-4">
                                                            <a href="{{ route('product.show', $entry->id) }}" class="bg-black text-white px-4 py-2 rounded">
                                                                View Product
                                                            </a>
                                                        </div>
                                                    </div>
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
        </div>
    </div>
</x-app-layout>
