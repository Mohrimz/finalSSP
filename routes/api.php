<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;

// Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);
Route::post('/logout',   [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user',      [AuthController::class, 'user'])->middleware('auth:sanctum');

// Product Routes
Route::get('/products',             [ProductController::class, 'index']);
Route::post('/products',            [ProductController::class, 'store']);
Route::get('/products/{id}',        [ProductController::class, 'show']);
Route::put('/products/{id}',        [ProductController::class, 'update']);
Route::delete('/products/{id}',     [ProductController::class, 'destroy']);
Route::patch('/products/{id}/{action}', [ProductController::class, 'toggleStatus']);
