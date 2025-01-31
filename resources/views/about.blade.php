@extends('layouts.x-layout')

@section('title', 'About Us')

@section('content')
<div class="container mx-auto p-4">
    <!-- Hero Section -->
    <div class="text-center py-16 bg-gray-100 rounded-lg">
        <h1 class="text-5xl font-bold text-gray-800 mb-4">ABOUT TRENDY.LK</h1>
        <p class="text-xl text-gray-600">Style, Comfort, and Quality in Every Step</p>
    </div>

    <!-- Our Story Section -->
    <div class="my-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Story</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Welcome to Trendy.lk, Sri Lanka’s go-to destination for stylish and high-quality footwear. 
                    Our journey began with a simple vision—to create shoes that blend fashion, comfort, and durability. 
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Whether it's casual sneakers, formal dress shoes, or everyday wear, our collections are designed 
                    for people who value both style and comfort. We believe that the right pair of shoes can make all the difference.
                </p>
            </div>
            <div>
                <img src="{{ asset('images/about-story.jpg') }}" alt="Our Story" class="w-full h-auto rounded-lg shadow-md">
            </div>
        </div>
    </div>

    <!-- Our Commitment Section -->
    <div class="my-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Commitment</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <img src="{{ asset('images/about-commitment.jpg') }}" alt="Our Commitment" class="w-full h-auto rounded-lg shadow-md">
            </div>
            <div>
                <p class="text-gray-700 leading-relaxed mb-4">
                    At Trendy.lk, we are committed to delivering shoes that combine style, durability, and all-day comfort. 
                    Our team carefully selects premium materials to ensure every pair is built to last.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    We also believe in sustainability, which is why we continually explore eco-friendly alternatives 
                    without compromising on quality. When you choose Trendy.lk, you're choosing fashion with purpose.
                </p>
            </div>
        </div>
    </div>

    <!-- Meet the Founders Section -->
    <div class="my-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Meet the Founders</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Founder 1 -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <img src="{{ asset('images/founder1.jpg') }}" alt="Founder Name" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-2xl font-semibold text-gray-800">Michael Sole</h3>
                <p class="text-gray-600">Co-Founder & CEO</p>
                <p class="text-gray-700 mt-4">
                    With years of experience in footwear design, Michael ensures that every pair of Trendy.lk shoes 
                    meets the highest standards of quality and craftsmanship. His passion for stylish yet functional shoes 
                    drives the brand forward.
                </p>
            </div>
            <!-- Founder 2 -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <img src="{{ asset('images/founder2.jpg') }}" alt="Founder Name" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-2xl font-semibold text-gray-800">Emily Stride</h3>
                <p class="text-gray-600">Co-Founder & Creative Director</p>
                <p class="text-gray-700 mt-4">
                    Emily brings innovation and style to Trendy.lk. With a keen eye for the latest fashion trends, 
                    she ensures our collections stay ahead of the curve while maintaining comfort and versatility.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
