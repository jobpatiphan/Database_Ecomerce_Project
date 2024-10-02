<x-profile-page-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-8">My Profile</h1>
        <div class="flex flex-col sm:flex-row sm:space-x-6">
            <!-- Sidebar -->
            <div class="w-full sm:w-1/4 bg-white shadow-lg rounded-lg p-6">
                <div class="text-center">
                    <div class="rounded-full mx-auto mb-4">
                        @include('profile.partials.update-profile-photo-form')
                    </div>
                    <h3 class="text-lg font-bold">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-600">Hello 👋</p>
                </div>
                <nav class="mt-8">
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <svg class="w-5 h-5" fill="currentColor">
                                    <!-- Personal Info Icon -->
                                </svg>
                                <span class="ml-3">Personal Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <svg class="w-5 h-5" fill="currentColor">
                                    <!-- Orders Icon -->
                                </svg>
                                <span class="ml-3">My Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 bg-black text-white rounded-lg">
                                <svg class="w-5 h-5" fill="currentColor">
                                    <!-- Wishlist Icon -->
                                </svg>
                                <span class="ml-3">My Wishlists</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <svg class="w-5 h-5" fill="currentColor">
                                    <!-- Manage Addresses Icon -->
                                </svg>
                                <span class="ml-3">Manage Addresses</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="w-full sm:w-3/4 bg-white shadow-lg rounded-lg p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Wishlist Item -->
                    @foreach ($wishListEntries as $entry)
                        <div class="border rounded-lg p-4 relative">
                            <button class="absolute top-2 right-2 text-red-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            <div class="bg-gray-200 h-48 rounded-md mb-4"></div>
                            <button class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg mb-2 w-full">Move to Cart</button>
                            <div class="text-center text-gray-500">
                                <p class="text-lg font-semibold">xxxx</p>
                                <p>xxxx</p>
                                <p>$xx.xx</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
