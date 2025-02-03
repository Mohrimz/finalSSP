@extends('layouts.x-layout')

@section('title', 'Checkout - TRENDY.LK')

@section('content')
<div class="container mx-auto p-8">
    @if(session('order_success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-2 mb-6 rounded shadow">
            {{ session('order_success') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded shadow-lg max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center">Shipping Information</h2>
        <form action="{{ route('checkout.submit') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="first_name" class="text-gray-700 font-semibold mb-2">First Name</label>
                    <input type="text" id="first_name" name="first_name" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="last_name" class="text-gray-700 font-semibold mb-2">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col md:col-span-2">
                    <label for="email" class="text-gray-700 font-semibold mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col md:col-span-2">
                    <label for="address" class="text-gray-700 font-semibold mb-2">Street Address</label>
                    <input type="text" id="address" name="address" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="city" class="text-gray-700 font-semibold mb-2">City</label>
                    <input type="text" id="city" name="city" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="state" class="text-gray-700 font-semibold mb-2">State/Province</label>
                    <input type="text" id="state" name="state" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="zip" class="text-gray-700 font-semibold mb-2">Zip/Postal Code</label>
                    <input type="text" id="zip" name="zip" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="country" class="text-gray-700 font-semibold mb-2">Country</label>
                    <input type="text" id="country" name="country" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
            </div>
            <h3 class="text-xl font-bold mt-8 mb-4">Payment Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="card_number" class="text-gray-700 font-semibold mb-2">Card Number</label>
                    <input type="text" id="card_number" name="card_number" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="expiry_date" class="text-gray-700 font-semibold mb-2">Expiry Date</label>
                    <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="cvv" class="text-gray-700 font-semibold mb-2">CVV</label>
                    <input type="text" id="cvv" name="cvv" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
                <div class="flex flex-col">
                    <label for="name_on_card" class="text-gray-700 font-semibold mb-2">Name on Card</label>
                    <input type="text" id="name_on_card" name="name_on_card" required
                           class="border border-gray-300 p-3 rounded focus:outline-none focus:border-blue-500">
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button type="submit"
                        class="bg-blue-500 text-white py-3 px-6 rounded hover:bg-blue-600 transition-colors duration-200">
                    Complete Purchase
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
