<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <header class="bg-white p-4 flex justify-between items-center">
        <div class="flex items-center">
            <img src="/webpic/logo.png"
                alt="Logo" class="w-10 h-10 rounded-lg mr-4">
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('dashboard') }}" class="text-black">Home</a></li>
                    <li><a href="#" class="text-black">Shop</a></li>
                    <li><a href="#" class="text-black">Contact Us</a></li>
                    @if (Auth::user() && Auth::user()->is_admin)
                        <li><a href="{{ route('admin.products.index') }}" class="text-black">Admin Management</a></li>
                    @endif
                </ul>
            </nav>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('profile.wishList') }}" class="text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </a>
            <a href="{{ route('profile.cart') }}" class="text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </a>
            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                <button @click="open = ! open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                    <div>{{ Auth::user()->name }}</div>
                    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>

                <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link href="/" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>

                </div>
            </div>
        </div>
    </header>
</nav>
