@extends('layouts.x-layout')

@section('title', 'About Us')

@section('content')
<div class="container mx-auto p-4">
    <!-- Hero Section -->
    <div class="text-center py-16 bg-gray-100 rounded-lg">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">ABOUT US</h1>
        <p class="text-xl text-gray-600">Luxurious Interior and Industrial Design</p>
    </div>

    <!-- Our Philosophy Section -->
    <div class="my-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Philosophy</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <p class="text-gray-700 leading-relaxed mb-4">
                    At Britto Charette, we believe in creating luxurious, personalized environments that reflect our clients' tastes and lifestyles.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Modern Elegance: Designs featuring clean lines, neutral palettes, and high-quality materials.
                </p>
            </div>
            <div>
                <img src="{{ asset('images/about-philosophy.jpg') }}" alt="Our Philosophy" class="w-full h-auto rounded-lg shadow-md">
            </div>
        </div>
    </div>

    <!-- Meet the Principals Section -->
    <div class="my-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">MEET THE PRINCIPALS</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Jay Britto -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <img src="{{ asset('images/jay-britto.jpg') }}" alt="Jay Britto" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-2xl font-semibold text-gray-800">Jay Britto</h3>
                <p class="text-gray-600">Founder and Principal</p>
                <p class="text-gray-700 mt-4">
                    As principal and licensed designer, Jay oversees the day-to-day operations of Britto Charette and the design and manufacture of our firm's custom furniture and award-winning accessories.
                </p>
            </div>
            <!-- David Charette -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <img src="{{ asset('images/david-charette.jpg') }}" alt="David Charette" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-2xl font-semibold text-gray-800">David Charette</h3>
                <p class="text-gray-600">Founder and Principal</p>
                <p class="text-gray-700 mt-4">
                    David brings a unique perspective to the firm, ensuring that every project reflects the highest standards of design and craftsmanship.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection