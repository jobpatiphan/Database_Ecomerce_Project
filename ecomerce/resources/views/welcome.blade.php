<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shoes Collection</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="min-h-screen">
            <header class="bg-white p-4 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="/webpic/logo.png" alt="Logo" class="w-10 h-10 rounded-lg mr-4">
                    <nav>
                        <ul class="flex space-x-4">
                            <li><a href="#" class="text-black">Home</a></li>
                            <li><a href="#" class="text-black">Shop</a></li>
                            <li><a href="#" class="text-black">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></a>
                    <a href="{{ route('login') }}" class="text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></a>
                    <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded">Login</a>
                </div>
            </header>

            <main>
   <!-- Container -->
<div class="relative max-w-full mx-auto overflow-hidden">
    <div class="carousel relative">
        <!-- Slides Container -->
        <div class="flex transition-transform duration-500 ease-in-out">
            <!-- Clone last slide for infinite effect -->
            <div class="min-w-full h-[600px] relative slide-clone">
                <img src="{{ asset($slides[count($slides)-1]['image']) }}" alt="Slide" class="w-full h-full object-cover">
                <div class="overlay-text absolute bottom-8 left-8 bg-white bg-opacity-90 p-6 rounded-lg shadow-md max-w-sm opacity-0 transition-opacity duration-500 transform translate-y-4">
                    <h2 class="text-2xl font-bold uppercase text-gray-800">{{ $slides[count($slides)-1]['title'] }}</h2>
                    <p class="text-base text-gray-600 mt-2">{{ $slides[count($slides)-1]['description'] }}</p>
                    <a href="{{ $slides[count($slides)-1]['button_link'] }}" class="inline-block mt-4 px-6 py-3 bg-black text-white font-semibold text-sm rounded-full hover:bg-gray-800 transition">
                        {{ $slides[count($slides)-1]['button_text'] }}
                    </a>
                </div>
            </div>

            <!-- Original slides -->
            @foreach($slides as $index => $slide)
            <div class="min-w-full h-[600px] relative">
                <img src="{{ asset($slide['image']) }}" alt="Slide" class="w-full h-full object-cover">
                <div class="overlay-text absolute bottom-8 left-8 bg-white bg-opacity-90 p-6 rounded-lg shadow-md max-w-sm transition-all duration-700 ease-out opacity-0 translate-y-full slide-out" data-index="{{ $index }}">
                    <h2 class="text-2xl font-bold uppercase text-gray-800 transition-transform duration-700 translate-x-0">
                        {{ $slide['title'] }}
                    </h2>
                    <p class="text-base text-gray-600 mt-2 transition-transform duration-700 delay-100 translate-x-0">
                        {{ $slide['description'] }}
                    </p>
                    <a href="{{ $slide['button_link'] }}" class="inline-block mt-4 px-6 py-3 bg-black text-white font-semibold text-sm rounded-full hover:bg-gray-800 transition-all duration-700 delay-200 translate-x-0">
                        {{ $slide['button_text'] }}
                    </a>
                </div>
            </div>
            @endforeach

            <!-- Clone first slide for infinite effect -->
            <div class="min-w-full h-[600px] relative slide-clone">
                <img src="{{ asset($slides[0]['image']) }}" alt="Slide" class="w-full h-full object-cover">
                <div class="overlay-text absolute bottom-8 left-8 bg-white bg-opacity-90 p-6 rounded-lg shadow-md max-w-sm opacity-0 transition-opacity duration-500 transform translate-y-4">
                    <h2 class="text-2xl font-bold uppercase text-gray-800">{{ $slides[0]['title'] }}</h2>
                    <p class="text-base text-gray-600 mt-2">{{ $slides[0]['description'] }}</p>
                    <a href="{{ $slides[0]['button_link'] }}" class="inline-block mt-4 px-6 py-3 bg-black text-white font-semibold text-sm rounded-full hover:bg-gray-800 transition">
                        {{ $slides[0]['button_text'] }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <button class="prev-button absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/75 rounded-full p-3 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        
        <button class="next-button absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/75 rounded-full p-3 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Dot Navigation -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
            @foreach($slides as $index => $slide)
            <button 
                class="nav-dot w-3 h-3 rounded-full bg-white/50 transition-colors duration-300 hover:bg-white/75" 
                data-index="{{ $index }}">
            </button>
            @endforeach
        </div>
    </div>
</div>
                

                    <section class="p-8" x-data="{ currentIndex: 0, productsPerPage: 2 }">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">Shop by Categories</h2>
                    </div>

                    <div class="relative">
                        <!-- Slide Bar -->
                        <div class="overflow-hidden">
                            <div class="flex transition-transform" :style="'transform: translateX(-' + (currentIndex * (100 / productsPerPage)) + '%);'">
                                @foreach($products as $product)
                                    <div class="w-1/4 flex-none p-2">
                                        <div class="bg-gray-200 h-96 flex flex-col justify-between items-center p-4 rounded-lg">
                                            <!-- Display Product Image -->
                                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-full h-64 object-contain rounded-lg">

                                            <!-- Product Name -->
                                            <h3 class="text-lg font-semibold">{{ Str::limit($product->name, 30, ' ...') }}</h3>

                                            <!-- Product Price -->
                                            <p class="text-gray-700">${{ number_format($product->price, 2) }}</p>

                                            <!-- Link to Product Page -->
                                            @if (Auth::check())
                                                <a href="{{ route('product.show', $product->id) }}" class="bg-black text-white px-4 py-2 rounded">
                                                    View Product
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded">
                                                    Login to View Product
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Navigation Buttons under Products -->
                        <div class="flex justify-between mt-4">
                            <button @click="currentIndex = Math.max(currentIndex - productsPerPage, 0)"
                                    class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition-colors">
                                &larr; Previous
                            </button>

                            <button @click="currentIndex = Math.min(currentIndex + productsPerPage, Math.ceil({{ count($products) }} / productsPerPage) - 1)"
                                    class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition-colors">
                                Next &rarr;
                            </button>
                        </div>
                    </div>
                

                <div class="max-w-4xl mx-auto py-12">

                    <!-- Image Section -->
                    <div class="flex flex-col items-center md:flex-row bg-black shadow-lg rounded-lg overflow-hidden">
                        <div class="w-full md:w-1/2 p-6 bg-black">
                            <img src="{{ asset('/webpic/hom.png') }}" alt="Tatum 3" class="w-full h-auto object-cover">
                        </div>
                        <div class="w-full md:w-1/2 flex items-center justify-center bg-black text-white p-6">
                            <img src="{{ asset('/webpic/presenter.jpg') }}" alt="Jayson" class="w-full h-auto object-cover">
                        </div>
                    </div>

                    <!-- Text Section -->
                    <div class="text-center py-8">
                        <h2 class="text-xl font-semibold text-gray-500">Nike Air Force 1 High 'Bubble Pop' Edition</h2>
                        <h1 class="text-4xl font-bold text-gray-800 mt-2">Pop Your Reality</h1>
                        <p class="text-gray-700 mt-4 px-6">
                        Make a statement with these eye-catching Nike Air Force 1 High sneakers featuring a playful bubble pattern design. The black and white color blocking is accented with vibrant neon green laces and multicolored polka dots, creating a perfect blend of classic style and modern pop art aesthetics.
                        </p>
                        <a href="{{ route('shop.shopProduct') }}" class="mt-12 px-8 py-3 bg-black text-white font-semibold rounded-full hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-opacity-50">
                            Shop now
                        </a>
                    </div>
                </div>
                </section>
            </main>

            <footer class="bg-black text-white p-8">
                <div class="flex justify-between">
                    <div>
                        <img src="/webpic/logo.png" alt="Footer Logo" class="w-12 h-12 mb-2">
                        <h3 class="text-xl font-bold">COMMERS FOOT SHOP</h3>
                        <p class="text-sm">SLOGAN HERE</p>
                        <p class="text-sm mt-2">devil.graves15@gmail.com</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Follow Us</h3>
                        <ul class="mt-2">
                            <li><a href="#" class="text-gray-300">Instagram</a></li>
                            <li><a href="#" class="text-gray-300">Twitter</a></li>
                            <li><a href="#" class="text-gray-300">Facebook</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Contact Us</h3>
                        <p class="text-sm">123 Shoe St, City, State, 12345</p>
                        <p class="text-sm">+1 234 567 890</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- วาง script ตรงนี้ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
$(document).ready(function() {
    const carousel = $('.carousel > div:first-child');
    const items = $('.carousel-item');
    const dots = $('.nav-dot');
    const overlays = $('.overlay-text');
    const slideCount = {{ count($slides) }};
    let currentIndex = 0; // เปลี่ยนเป็น 0
    let intervalId;
    let isAnimating = false;

    // Initialize position to show first slide
    initializeCarousel();

    function initializeCarousel() {
        // Start at first slide
        carousel.css('transform', 'translateX(-100%)');
        updateOverlays(0);
        dots.first().addClass('!bg-white');
    }

    function hideOverlay(index) {
        const overlay = overlays.eq(index + 1);
        const title = overlay.find('h2');
        const description = overlay.find('p');
        const button = overlay.find('a');

        // Animate content out to the right
        title.css('transform', 'translateX(-100px)');
        description.css('transform', 'translateX(-100px)');
        button.css('transform', 'translateX(-100px)');

        setTimeout(() => {
            overlay.addClass('translate-y-full opacity-0')
                  .removeClass('translate-y-0 opacity-100');
        }, 300);
    }

    function showOverlay(index) {
        const overlay = overlays.eq(index + 1);
        const title = overlay.find('h2');
        const description = overlay.find('p');
        const button = overlay.find('a');

        // Reset initial positions
        title.css('transform', 'translateX(100px)');
        description.css('transform', 'translateX(100px)');
        button.css('transform', 'translateX(100px)');
        
        overlay.removeClass('translate-y-full opacity-0')
               .addClass('translate-y-0 opacity-100');

        setTimeout(() => {
            title.css('transform', 'translateX(0)');
            setTimeout(() => {
                description.css('transform', 'translateX(0)');
                setTimeout(() => {
                    button.css('transform', 'translateX(0)');
                }, 100);
            }, 100);
        }, 300);
    }

    function updateOverlays(index) {
        hideOverlay(currentIndex);
        
        setTimeout(() => {
            showOverlay(index);
        }, 300);

        dots.removeClass('!bg-white')
            .eq(index)
            .addClass('!bg-white');
    }

    function moveToIndex(index, instant = false) {
        if (isAnimating) return;
        isAnimating = true;

        const realIndex = (index + slideCount) % slideCount; // แก้ไขการคำนวณ realIndex
        const offset = -(realIndex + 1) * 100; // ปรับการคำนวณ offset

        if (instant) {
            carousel.css('transition', 'none');
            carousel.css('transform', `translateX(${offset}%)`);
            carousel[0].offsetHeight;
            carousel.css('transition', '');
        } else {
            carousel.css('transform', `translateX(${offset}%)`);
        }

        updateOverlays(realIndex);

        setTimeout(() => {
            if (index < 0) {
                carousel.css('transition', 'none');
                carousel.css('transform', `translateX(-${slideCount * 100}%)`);
                currentIndex = slideCount - 1;
                carousel[0].offsetHeight;
                carousel.css('transition', '');
            } else if (index >= slideCount) {
                carousel.css('transition', 'none');
                carousel.css('transform', 'translateX(-100%)');
                currentIndex = 0;
                carousel[0].offsetHeight;
                carousel.css('transition', '');
            } else {
                currentIndex = realIndex;
            }
            isAnimating = false;
        }, 500);
    }

    function startAutoplay() {
        intervalId = setInterval(() => {
            if (!isAnimating) {
                moveToIndex(currentIndex + 1);
            }
        }, 5000);
    }

    function stopAutoplay() {
        clearInterval(intervalId);
    }

    // Event handlers
    $('.next-button').click(function() {
        if (!isAnimating) {
            stopAutoplay();
            moveToIndex(currentIndex + 1);
            startAutoplay();
        }
    });

    $('.prev-button').click(function() {
        if (!isAnimating) {
            stopAutoplay();
            moveToIndex(currentIndex - 1);
            startAutoplay();
        }
    });

    dots.click(function() {
        if (!isAnimating) {
            const index = $(this).data('index');
            stopAutoplay();
            moveToIndex(index);
            startAutoplay();
        }
    });

    carousel.on('transitionend', function() {
        isAnimating = false;
    });

    startAutoplay();

    $('.carousel').hover(
        function() { stopAutoplay(); },
        function() { startAutoplay(); }
    );
});
</script>
</body>
</html>
    </body>
</html>