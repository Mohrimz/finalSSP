@extends('layouts.x-layout')

@section('title', 'About Us')

@section('content')
<div class="container mx-auto p-4">
    <div class="text-center py-20 rounded-lg shadow-sm" style="background-image: url('{{ asset('storage/uploads/ss (2).png') }}'); background-size: cover; background-position: center;">
        <div class=" bg-opacity-50 py-20 rounded-lg">
        </div>
    </div>

    <div class="my-16 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">Our Mission</h2>
            <p class="text-gray-700 text-center md:text-left max-w-2xl mx-auto leading-relaxed">
                At Trendy.lk, we’re on a mission to redefine footwear by blending cutting-edge design with unparalleled comfort. 
                We believe that every step you take should reflect your unique style while keeping you comfortable all day long.
            </p>
        </div>
        <div class="flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">Our Story</h2>
            <p class="text-gray-700 text-center md:text-left max-w-2xl mx-auto leading-relaxed">
                Founded in 2015, Trendy.lk started as a small idea to revolutionize the footwear industry in Sri Lanka. 
                What began as a passion project has now grown into a trusted brand loved by thousands. Our journey has been fueled 
                by a commitment to quality, innovation, and customer satisfaction. From casual sneakers to elegant formal wear, 
                we've curated collections that cater to every occasion and lifestyle.
            </p>
        </div>
    </div>

    <div class="my-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Core Values</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl text-blue-500 mb-4">👟</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Quality Craftsmanship</h3>
                <p class="text-gray-700">
                    We use premium materials and meticulous craftsmanship to ensure every pair of shoes is built to last.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl text-purple-500 mb-4">🌍</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Sustainability</h3>
                <p class="text-gray-700">
                    We’re committed to reducing our environmental footprint by exploring eco-friendly materials and practices.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-shadow">
                <div class="text-4xl text-green-500 mb-4">❤️</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Customer First</h3>
                <p class="text-gray-700">
                    Your satisfaction is our priority. We strive to deliver exceptional products and experiences.
                </p>
            </div>
        </div>
    </div>
<div class="my-16">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Meet the Founder</h2>
    <div class="flex justify-center">
        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow">
            <img src="{{ asset('storage/uploads/dp.jpg') }}" alt="Mohomed Rimzan" class="w-48 h-48 rounded-full mx-auto mb-4">
            <h3 class="text-2xl font-semibold text-gray-800">Mohomed Rimzan</h3>
            <p class="text-gray-600">Founder & CEO</p>
            <p class="text-gray-700 mt-4">
                Mohomed Rimzan’s innovative vision and leadership have driven Trendy.lk to become a trusted name in footwear, setting high standards of quality and style.
            </p>
        </div>
    </div>
</div>


    <div class="my-16 text-center bg-gradient-to-r from-blue-50 to-purple-50 py-12 rounded-lg shadow-sm">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Join the Trendy.lk Family</h2>
        <p class="text-gray-700 mb-6">Discover the perfect pair for every step of your journey.</p>
        <a href="{{ route('home') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700 transition-colors">
            Shop Now
        </a>
    </div>
</div>
@endsection
