<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class AddToCart extends Component
{
    public $product;
    public $selectedSize = null;
    public $quantity = 1;

    protected $listeners = ['cartUpdated' => 'render'];

    public function selectSize($size)
    {
        $this->selectedSize = $size;
    }

    public function addToCart()
    {
        if (!$this->selectedSize) {
            session()->flash('error', 'Please select a size.');
            return;
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$this->product->id])) {
            $cart[$this->product->id]['quantity'] += $this->quantity;
        } else {
            $cart[$this->product->id] = [
                'name' => $this->product->name,
                'price' => $this->product->price,
                'quantity' => $this->quantity,
                'image' => $this->product->target_file,
                'size' => $this->selectedSize
            ];
        }

        Session::put('cart', $cart);

        // Correct way to emit an event in Livewire
        $this->dispatch('cartUpdated');
        session()->flash('success', 'Product added to cart!');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
