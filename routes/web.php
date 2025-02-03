<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\CartPageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ManageOrdersController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\ManageUsersController; 
use Illuminate\Support\Facades\Route;

// About Us route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Home page
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes 
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/products', function () {
        return view('admin.products'); 
    })->name('products');
    Route::get('/manage-users', [ManageUsersController::class, 'index'])->name('manage.users');
    Route::get('/manage-users/{user}/edit', [ManageUsersController::class, 'edit'])->name('manage.users.edit');
    Route::put('/manage-users/{user}', [ManageUsersController::class, 'update'])->name('manage.users.update');
    Route::delete('/manage-users/{user}', [ManageUsersController::class, 'destroy'])->name('manage.users.destroy');
    Route::get('/manage-orders', [ManageOrdersController::class, 'index'])
    ->name('manage.orders');

Route::get('/manage-orders/{order}/edit', [ManageOrdersController::class, 'edit'])
    ->name('manage.orders.edit');

Route::put('/manage-orders/{order}', [ManageOrdersController::class, 'update'])
    ->name('manage.orders.update');

Route::delete('/manage-orders/{order}', [ManageOrdersController::class, 'destroy'])
    ->name('manage.orders.destroy');
});

Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.update');
Route::get('/products', [ProductViewController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductViewController::class, 'show'])->name('product.view');

// Cart and Wishlist routes
Route::get('/cart', [CartPageController::class, 'index'])->name('cart');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.submit');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout.page');

require __DIR__.'/auth.php';
