<nav x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->
    <footer class="bg-black text-white p-8 ">
    
                <div class="flex justify-between">
                    <div>
                        <img src="/webpic/logo.png" alt="Footer Logo" class="w-12 h-12 mb-2">
                        <h3 class="text-xl font-bold">COMMERS SHOES SHOP</h3>
                        <p class="text-sm">SLOGAN HERE</p>
                        <p class="text-sm mt-2">devilark2020@gmail.com</p>
                    </div>
                    <div>
                        <h4 class="font-bold mb-2">Information</h4>
                        <ul class="space-y-1">
                            <li><a href="{{ route('profile.edit') }}" class="text-sm">My Account</a></li>
                            <li><a href="{{ route('profile.cart') }}" class="text-sm">My cart</a></li>
                            <li><a href="{{ route('profile.wishList') }}" class="text-sm">My Wishlist</a></li>
                            <li><a href="{{ route('profile.order') }}" class="text-sm">My Order</a></li>
                        </ul>
                    </div>
                </div>
                <p class="text-center mt-8 text-sm">&copy;2024 commers all Rights are reserved</p>
        </footer>
</nav>
