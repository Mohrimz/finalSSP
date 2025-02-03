@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit User</h1>

    @if (session('success'))
        <div class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.manage.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" 
                   value="{{ old('name', $user->name) }}" 
                   class="w-full p-2 border border-gray-300 rounded" required>
            @error('name')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" 
                   value="{{ old('email', $user->email) }}" 
                   class="w-full p-2 border border-gray-300 rounded" required>
            @error('email')
                <div class="text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit & Back Buttons -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Update User
            </button>
            <a href="{{ route('admin.manage.users') }}" class="text-blue-600">
                Back to Manage Users
            </a>
        </div>
    </form>
</div>
@endsection
