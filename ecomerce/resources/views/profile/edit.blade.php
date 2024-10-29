<x-app-layout>
    <div class="container mx-auto px-4 py-8" x-data="{ showAddressForm: {{ $user->address ? 'false' : 'true' }} }">
        <div class="flex flex-col sm:flex-row sm:space-x-6">
            <!-- Sidebar -->
            <div class="w-full sm:w-1/4 bg-white shadow-lg rounded-lg p-6">
                <div class="text-center">
                    @include('profile.partials.update-profile-photo-form')
                    <h3 class="text-lg font-bold">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-600">Hello 👋</p>
                </div>
                <nav class="mt-8">
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="flex items-center p-2 bg-black text-white hover:bg-gray-700 rounded-lg">
                                <span class="ml-3">Personal Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.order') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">My Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.wishList') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
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

            <!-- Main Content -->
            <div class="w-full sm:w-3/4 bg-white shadow-lg rounded-lg p-6">
                <!-- Profile Information Form -->
                @include('profile.partials.update-profile-information-form')
                <br>
                <br>

                @if ($user->address == null)
                    <p class="bg-red-500 text-white text-xl p-4 rounded-lg">You don't have an address yet. Please add one below.</p>
                @endif

                <!-- Address Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-bold mb-4">Address</h3>
                    
                    <!-- Show address if user has one -->
                    <div x-show="!showAddressForm" class="mb-4">
                        <p class="text-gray-700 text-lg">{{ $user->address }}</p>
                        <br>
                        <br>
                        <button @click="showAddressForm = true" class="bg-black text-white px-4 py-2 rounded-lg">
                            Edit Address
                        </button>
                    </div>

                    <!-- Show address form if user does not have an address or clicks edit -->
                    <div x-show="showAddressForm">
                      
                        <form action="{{ route('profile.updateAddress') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="address_number" class="block text-sm font-medium text-gray-700">Address Number</label>
                                <input type="text" name="address_number" id="address_number" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ old('address_number') }}">
                                @error('address_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="street" class="block text-sm font-medium text-gray-700">Street (optional)</label>
                                    <input type="text" name="street" id="street" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ old('street') }}">
                                    @error('street')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                            </div>


                            <div class="mb-4">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="city" id="city" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ old('city') }}">
                                @error('city')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                <input type="text" name="province" id="province" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ old('province') }}">
                                @error('province')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                <input type="text" name="postal_code" id="postal_code" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ old('postal_code') }}">
                                @error('postal_code')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Save Address</button>
                                <button type="button" @click="showAddressForm = false" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-lg">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
