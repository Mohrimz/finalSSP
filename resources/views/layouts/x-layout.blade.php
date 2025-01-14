<!DOCTYPE html>
<html lang="en">

<head>
    @livewireStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRENDY.LK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-gray-100 to-gray-50 border-b border-gray-200 py-2">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="flex items-center space-x-4 text-gray-700">
                <a href="#" class="hover:text-black transition-colors duration-200"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-black transition-colors duration-200"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-black transition-colors duration-200"><i class="fab fa-youtube"></i></a>
                <a href="#" class="hover:text-black transition-colors duration-200"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="hover:text-black transition-colors duration-200"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="text-red-600 font-semibold tracking-wide">
                EXPRESS SHIPPING ON ALL ORDERS
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto flex items-center justify-between px-6 py-4">
            <div class="flex items-center space-x-2">
                <div>
                
                    <h1 class="text-xl font-bold text-black tracking-wide">TRENDY.LK</h1>
                    <p class="text-xs text-gray-500 tracking-widest">EVERY STEP MATTERS</p>
                </div>
            </div>

            <nav class="flex-grow flex justify-center items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-black font-semibold transition-colors duration-200">Home</a>
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-black font-semibold transition-colors duration-200">Products</a>
                <div class="relative group">
                    <a href="#" class="text-gray-700 hover:text-black font-semibold transition-colors duration-200">About</a>
                    <div class="absolute left-0 hidden mt-2 w-32 bg-white border border-gray-200 shadow-lg group-hover:block">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contact</a>
                    </div>
                </div>
                <a href="#" class="text-gray-700 hover:text-black font-semibold transition-colors duration-200">Contact</a>
            </nav>

            <div class="flex items-center space-x-8">
                <a href="#" class="text-gray-700 hover:text-black transition-colors duration-200 text-lg"><i class="fas fa-search"></i></a>
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-black transition-colors duration-200 relative text-lg">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="absolute top-0 right-0 bg-orange-300 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                </a>
                <a href="#" class="text-gray-700 hover:text-black transition-colors duration-200 text-lg"><i class="fas fa-heart"></i></a>

                <div class="flex items-center space-x-6">
                    @auth
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-700 font-semibold">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-700 hover:text-black">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-black">
                            <i class="fas fa-user"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-black">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    @yield('content') <!-- Page content goes here -->

    <!-- Footer -->
<footer class="bg-gray-800 text-gray-200 py-16">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-xl font-semibold mb-4">Download Our App</h3>
            <p class="text-gray-400">Download App for Android and iOS mobile phone.</p>
            <div class="flex space-x-4 mt-4">
                <img src="{{ asset('storage/uploads/play-store.png') }}" alt="Play Store" class="w-24">
                <img src="{{ asset('storage/uploads/app-store.png') }}" alt="App Store" class="w-24">
            </div>
        </div>
        <div>
            <img src="{{ asset('storage/uploads/trendy.lk.PNG') }}" alt="Logo" class="w-32">
            <p class="text-gray-400 mt-4">Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.</p>
        </div>
        <div>
            <h3 class="text-xl font-semibold mb-4">Useful Links</h3>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-400 hover:text-white">Coupons</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Blog Post</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Return Policy</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Join Affiliate</a></li>
            </ul>
        </div>
        <div>
            <h3 class="text-xl font-semibold mb-4">Follow us</h3>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-400 hover:text-white">Facebook</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Twitter</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Instagram</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Youtube</a></li>
            </ul>
        </div>
    </div>
    <hr class="border-gray-700 my-6">
    <p class="text-center text-gray-500">&copy; 2024 Mohomed Rimzan</p>
</footer>
    @livewireScripts

</body>
</html>
