<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController;

use Illuminate\Support\Facades\Route;

// // Welcome page
// Route::get('/', function () {
//     return view('home');
// });

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
        return view('admin.products'); // Ensure this view includes the Livewire component
    })->name('products');
});
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.update');
Route::get('/products', [ProductViewController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductViewController::class, 'show'])->name('product.view');

require __DIR__.'/auth.php';
