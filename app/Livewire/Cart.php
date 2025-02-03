<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
    public $cart = [];
    public $total = 0;

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = Session::get('cart', []);
        $this->calculateTotal();
    }

    public function updateCart($productId, $quantity)
    {
        // Ensure the quantity is at least 1
        if ($quantity < 1) {
            $quantity = 1;
        }

        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            Session::put('cart', $cart);
            $this->loadCart();
        }
    }

    public function removeFromCart($productId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
            $this->loadCart();
        }
    }

    public function calculateTotal()
    {
        $this->total = array_reduce($this->cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
