<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Us - Shoes Collection</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-white">
        <!-- Header -->
        <header class="bg-white shadow-sm fixed w-full top-0 z-50">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <img src="/webpic/logo.png" alt="Logo" class="w-10 h-10 rounded-lg mr-4">
                        <nav>
                            <ul class="flex space-x-6">
                                <li><a href="/" class="text-gray-800 hover:text-gray-600 transition">Home</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                    
                </div>
            </div>
        </header>

      <!-- Main Content -->
<main class="pt-20 pb-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-16">CONTACT US</h1>
        
        <div class="flex  pb-6 max-w-full mx-auto mb-16 items-center items-center justify-center">
            <!-- Patiphan Klinhom - ข้อความด้านล่าง -->
            <div class="flex flex-col items-center justify-start transform hover:scale-105 transition duration-300 flex-shrink-0 w-64">
                <div class="w-48 h-48 rounded-full overflow-hidden mb-6 border-4 border-gray-200">
                    <img src="/webpic/job.jpg" alt="Patiphan Klinhom" class="w-full h-full object-cover">
                </div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('/webpic/facebook.png') }}" alt="Facebook" class="w-6 h-6">
                    <span class="text-lg font-medium">Patiphan Klinhom</span>
                </div>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('/webpic/phone.png') }}" alt="Phone" class="w-6 h-6">
                    <span class="text-lg">093-3738594</span>
                </div>
            </div>

            <!-- Wayu Tharai - ข้อความด้านบน -->
            <div class="flex flex-col items-center justify-end transform hover:scale-105 transition duration-300 flex-shrink-0 w-64">
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('/webpic/facebook.png') }}" alt="Facebook" class="w-6 h-6">
                    <span class="text-lg font-medium">Wayu Tharai</span>
                </div>
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('/webpic/phone.png') }}" alt="Phone" class="w-6 h-6">
                    <span class="text-lg">080-8256593</span>
                </div>
                <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-gray-200">
                    <img src="/webpic/wayu.jpg" alt="Wayu Tharai" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Peerawich Rattanahiran - ข้อความด้านล่าง -->
            <div class="flex flex-col items-center justify-start transform hover:scale-105 transition duration-300 flex-shrink-0 w-64">
                <div class="w-48 h-48 rounded-full overflow-hidden mb-6 border-4 border-gray-200">
                    <img src="/webpic/nack.jpg" alt="Peerawich Rattanahiran" class="w-full h-full object-cover">
                </div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('/webpic/facebook.png') }}" alt="Facebook" class="w-6 h-6">
                    <span class="text-lg font-medium">Peerawich Rattanahiran</span>
                </div>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('/webpic/phone.png') }}" alt="Phone" class="w-6 h-6">
                    <span class="text-lg">087-8764466</span>
                </div>
            </div>

            <!-- Watanyu Phanapaisansakul - ข้อความด้านบน -->
            <div class="flex flex-col items-center justify-end transform hover:scale-105 transition duration-300 flex-shrink-0 w-64">
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('/webpic/facebook.png') }}" alt="Facebook" class="w-6 h-6">
                    <span class="text-lg font-medium">Watanyu Phanapaisansakul</span>
                </div>
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('/webpic/phone.png') }}" alt="Phone" class="w-6 h-6">
                    <span class="text-lg">082-2265843</span>
                </div>
                <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-gray-200">
                    <img src="/webpic/non.jpg" alt="Watanyu Phanapaisansakul" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Engineeris Makibishi - ข้อความด้านล่าง -->
            <div class="flex flex-col items-center justify-start transform hover:scale-105 transition duration-300 flex-shrink-0 w-64">
                <div class="w-48 h-48 rounded-full overflow-hidden mb-6 border-4 border-gray-200">
                    <img src="/webpic/fluke.jpg" alt="Engineeris Makibishi" class="w-full h-full object-cover">
                </div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('/webpic/facebook.png') }}" alt="Facebook" class="w-6 h-6">
                    <span class="text-lg font-medium">Engineeris Makibishi</span>
                </div>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('/webpic/phone.png') }}" alt="Phone" class="w-6 h-6">
                    <span class="text-lg">092-8761394</span>
                </div>
            </div>
        </div>

        
    </div>
</main>
        <div class="text-center mt-16 bg-gray-50 py-8 rounded-lg">
                    <p class="text-xl font-medium mb-2">มหาวิทยาลัยเชียงใหม่</p>
                    <p class="text-lg text-gray-600">239 ถนนห้วยแก้ว ต.สุเทพ อ.เมือง จ.เชียงใหม่ 50200</p>
                </div>
            </div>

        <!-- Footer -->
        <footer class="bg-black text-white py-12">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <img src="/webpic/logo.png" alt="Footer Logo" class="w-12 h-12 mb-4">
                        <h3 class="text-xl font-bold mb-2">COMMERS FOOT SHOP</h3>
                        <p class="text-gray-400 mb-2">SLOGAN HERE</p>
                        <p class="text-gray-400">devil.graves15@gmail.com</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Follow Us</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Instagram</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Twitter</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Facebook</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                        <p class="text-gray-400 mb-2">123 Shoe St, City, State, 12345</p>
                        <p class="text-gray-400">+1 234 567 890</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>