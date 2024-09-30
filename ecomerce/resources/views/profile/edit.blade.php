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
                            <a href="#" class="flex items-center p-2 bg-black text-white rounded-lg">
                                <span class="ml-3">Personal Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">My Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
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
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
        </div>
        <!-- Footer -->
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
    
</x-app-layout>
