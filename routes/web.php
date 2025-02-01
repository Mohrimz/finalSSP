<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\CartPageController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\ManageUsersController; // Controller for user editing/updating
use Illuminate\Support\Facades\Route;

// About Us route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Home page
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard (requires authentication)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile management routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes (prefix: admin)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Admin dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Product management route (using Livewire component for products)
    Route::get('/products', function () {
        return view('admin.products'); // Ensure this view includes the Livewire component if needed
    })->name('products');

    // Manage Users route using Livewire for listing users
    // The view 'admin.manage_users' embeds the Livewire component.
    Route::get('/manage-users', [ManageUsersController::class, 'index'])->name('manage.users');

    // Edit, update, and delete routes for users (handled by the controller)
    Route::get('/manage-users/{user}/edit', [ManageUsersController::class, 'edit'])->name('manage.users.edit');
    Route::put('/manage-users/{user}', [ManageUsersController::class, 'update'])->name('manage.users.update');
    Route::delete('/manage-users/{user}', [ManageUsersController::class, 'destroy'])->name('manage.users.destroy');
});

// Additional product routes (outside admin group)
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.update');
Route::get('/products', [ProductViewController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductViewController::class, 'show'])->name('product.view');

// Cart and Wishlist routes
Route::get('/cart', [CartPageController::class, 'index'])->name('cart');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

require __DIR__.'/auth.php';
