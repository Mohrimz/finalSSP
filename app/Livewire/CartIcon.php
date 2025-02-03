<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartIcon extends Component
{
    public $count = 0;

    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function mount()
    {
        $this->updateCount();
    }

    public function updateCount()
    {
        $cart = Session::get('cart', []);
        $this->count = 0;
        foreach ($cart as $item) {
            $this->count += $item['quantity'];
        }
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
