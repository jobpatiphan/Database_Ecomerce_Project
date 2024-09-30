<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Foot Collection</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>

    </head>
    <body class="font-sans antialiased bg-white">
        <div class="min-h-screen">
            <header class="bg-white p-4 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="https://s3-alpha-sig.figma.com/img/5134/8590/a8d3f72db06db56329330056bc97ed68?Expires=1728259200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=DAeG6B-fX1ZavXbo4g53r9THwyL662fFJzdqZ5L0aQEklrwy9GDrEXXh~McNic8fHFOM-eEvLymdKxznnTgxDimI2f9fTYjCA2JJdrj7iz9sgtbaoIUXNX7Eb~I9LGRJNUopuWUMZ~ACr76mGQ6MsWthFDqMW9DqAjHUcbJP93Z1HRNHOyruvpD-22MMpWFxUnjMcT6xq28u7o~NHqIz-jtpUeeHjZ-nUFoX1xkQU1DUKgwptzTOaVk-O7PjJMIKnc6jArIjguOnsWOTyULnxtXjRAQ~LsDWKux6G~ir03p2KdQiPpCCb1f6w~lrFQKGRHDQ2gZBWr~EUx4g9pqTtA__" alt="Logo" class="w-10 h-10 rounded-lg mr-4">
                    <nav>
                        <ul class="flex space-x-4">
                            <li><a href="#" class="text-black">Home</a></li>
                            <li><a href="#" class="text-black">Shop</a></li>
                            <li><a href="#" class="text-black">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></a>
                    <a href="#" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></a>
                    <div x-data="{ open: false }" @click.away="open = false" class="relative">
                        <button @click="open = ! open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </button>

                        <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                            <!-- Dropdown content -->
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>


                    
            
        
                
               
                </div>
            </header>

            <main class="bg-gray-50 py-10">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12 gap-4">
                    
                        <div class="col-span-8 bg-white p-6 shadow-lg rounded-lg">
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left text-gray-600">Product</th>
                                        <th class="text-left text-gray-600">Price</th>
                                        <th class="text-left text-gray-600">Quantity</th>
                                        <th class="text-left text-gray-600">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="border-t">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div class="w-16 h-16 bg-gray-200"></div>
                                                <div class="ml-4">
                                                    <p>Girls Pink Moana Printed Dress</p>
                                                    <p class="text-sm text-gray-500">size: 43</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">$80.00</td>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <button class="px-2 py-1 border border-gray-300">-</button>
                                                <input type="text" value="1" class="w-12 text-center border-t border-b border-gray-300 mx-2">
                                                <button class="px-2 py-1 border border-gray-300">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">$80.00</td>
                                        <td class="py-4">
                                            <button class="text-red-500">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                
                                    <tr class="border-t">
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <div class="w-16 h-16 bg-gray-200"></div>
                                                <div class="ml-4">
                                                    <p>Girls Pink Moana Printed Dress</p>
                                                    <p class="text-sm text-gray-500">size: 43</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4">$80.00</td>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <button class="px-2 py-1 border border-gray-300">-</button>
                                                <input type="text" value="1" class="w-12 text-center border-t border-b border-gray-300 mx-2">
                                                <button class="px-2 py-1 border border-gray-300">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">$80.00</td>
                                        <td class="py-4">
                                            <button class="text-red-500">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    
                        <div class="col-span-4 bg-gray-100 p-6 shadow-lg rounded-lg">
                            <h2 class="text-lg font-semibold mb-4">Summary</h2>
                            <div class="flex justify-between py-2 border-t">
                                <span>Subtotal</span>
                                <span>$200.00</span>
                            </div>
                            <div class="flex justify-between py-2 border-t">
                                <span>Grand Total</span>
                                <span>$200.00</span>
                            </div>
                            <button class="w-full bg-black text-white py-2 mt-4 rounded">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="bg-black text-white p-8">
                <div class="flex justify-between">
                    <div>
                        <img src="https://s3-alpha-sig.figma.com/img/94e5/e241/a76ee442c6383c739360bfa998e63939?Expires=1728259200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=RccYWGzRO2u4RPBpvykCDQ-Er7bLt8hPXPLsEsY~9IY0aohP25E4wmJq94ac2Oa5rv1UzXA1jdP-82YyyHXsQM1uHx7-W7FwiedBgAHErRu9wSKHGXYDCrT0DRTFATAf8xKEsxztyrFnUC1gVnocikW0716qE3ioWGCC0cgnq85amwf7N0-5i~BGlz~gHVBt~pO-ACuj6xOEgi7zr~J~oUOFK6DdQ6d4dj4qRb0vcZog~3CGE8~rkHFiL2lq4IctcobXnakJiLFPIzsHfISqZy7lJrV8laVbn1IE7nkGscqVyFrLccFjzNMD5f26qDmZ6urxVdisdUZinGrH2O7wKQ__" alt="Footer Logo" class="w-12 h-12 mb-2">
                        <h3 class="text-xl font-bold">COMMERS FOOT SHOP</h3>
                        <p class="text-sm">SLOGAN HERE</p>
                        <p class="text-sm mt-2">devilark2020@gmail.com</p>
                    </div>
                    <div>
                        <h4 class="font-bold mb-2">Information</h4>
                        <ul class="space-y-1">
                            <li><a href="#" class="text-sm">My Account</a></li>
                            <li><a href="#" class="text-sm">Login</a></li>
                            <li><a href="#" class="text-sm">My cart</a></li>
                            <li><a href="#" class="text-sm">My Wishlist</a></li>
                            <li><a href="#" class="text-sm">Checkout</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-center mt-8 text-sm">&copy;2024 commers all Rights are reserved</p>
            </footer>
        </div>
    </body>
</html>


