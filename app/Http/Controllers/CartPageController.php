<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function index()
    {
        return view('cart'); // This will load cart.blade.php
    }
}
