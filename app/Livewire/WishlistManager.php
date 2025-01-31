<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class WishlistManager extends Component
{
    public $wishlist = [];

    protected $listeners = ['wishlistUpdated' => 'loadWishlist'];

    public function mount()
    {
        $this->loadWishlist();
    }

    public function loadWishlist()
    {
        $this->wishlist = Session::get('wishlist', []);
    }

    public function removeFromWishlist($productId)
    {
        $wishlist = Session::get('wishlist', []);

        if (isset($wishlist[$productId])) {
            unset($wishlist[$productId]);
            Session::put('wishlist', $wishlist);
        }

        $this->loadWishlist(); // Reload wishlist after removal
        $this->dispatch('wishlistUpdated'); // Notify other components if needed
    }

    public function render()
    {
        return view('livewire.wishlist-manager');
    }
}
