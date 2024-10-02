<x-app-layout>
    <div class="container mx-auto px-4 py-8" x-data="{ showAddressForm: false }">
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

                        <li><a href="#" class="flex items-center p-2 bg-black text-white rounded-lg">Personal Information</a></li>
                        <li><a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">My Orders</a></li>
                        <li><a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">My Wishlists</a></li>
                        <li><a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">Manage Addresses</a></li>
                        <li>
                            <a href="{{route('profile.edit')}}" class="flex items-center p-2 bg-black text-white rounded-lg">
                                <span class="ml-3">Personal Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('profile.order')}}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">My Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.wishList') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">My Wishlists</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">Manage Addresses</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="w-full sm:w-3/4 bg-white shadow-lg rounded-lg p-6">
                <!-- Profile Information Form -->
                @include('profile.partials.update-profile-information-form')

                <!-- Save Button -->
                <div class="flex items-center gap-4 mt-6">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition
                           x-init="setTimeout(() => show = false, 2000)"
                           class="text-sm text-gray-600 dark:text-gray-400">{{ __('Profile updated.') }}</p>
                    @endif
                </div>

                <!-- Manage Addresses Button -->
                <div class="mt-6">
                    <a href="javascript:void(0);" @click="showAddressForm = !showAddressForm" class="flex items-center p-2 bg-black text-white rounded-lg">
                        <span class="ml-3">Manage Addresses</span>
                    </a>
                </div>

                <!-- Address Form (Toggled) -->
                <div x-show="showAddressForm" class="mt-6">
                    <h4 class="text-lg font-bold mb-4">{{ __('Your Address') }}</h4>
                    @include('profile.partials.update-address-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
