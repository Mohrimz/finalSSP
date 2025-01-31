<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class Wishlist extends Component
{
    public $productId;
    public $isInWishlist = false;

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->isInWishlist = isset(Session::get('wishlist', [])[$this->productId]);
    }

    public function toggleWishlist()
    {
        $wishlist = Session::get('wishlist', []);

        if (isset($wishlist[$this->productId])) {
            unset($wishlist[$this->productId]);
            $this->isInWishlist = false;
        } else {
            $product = Product::find($this->productId);
            if ($product) {
                $wishlist[$this->productId] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->target_file,
                ];
                $this->isInWishlist = true;
            }
        }

        Session::put('wishlist', $wishlist);
        $this->dispatch('wishlistUpdated'); // Notify other components if needed
    }

    public function render()
    {
        return view('livewire.wishlist');
    }
}
