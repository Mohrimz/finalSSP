<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TRENDY.LK</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased relative">
        
        <!-- Background Video -->
        <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover z-[-1]">
            <source src="{{ asset('storage/uploads/VDO.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Content Container -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <!-- Login/Register Box -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white bg-opacity-80 backdrop-blur-lg shadow-md overflow-hidden sm:rounded-lg">
                
                <!-- Image Inside Box -->
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('storage/uploads/bg.png') }}" alt="Trendy.lk Image" >
                </div>

                <!-- Form Slot -->
                <div class="text-lg font-bold">
                    {{ $slot }}
                </div>

            </div>

        </div>

    </body>
</html>
