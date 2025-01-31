<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    /**
     * Display the wishlist page.
     */
    public function index()
    {
        // Retrieve wishlist items from session
        $wishlist = Session::get('wishlist', []);

        return view('wishlist', compact('wishlist'));
    }

    /**
     * Remove a product from the wishlist.
     */
    public function remove($id)
    {
        $wishlist = Session::get('wishlist', []);

        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
            Session::put('wishlist', $wishlist);
        }

        return redirect()->route('wishlist')->with('success', 'Product removed from wishlist.');
    }
}
