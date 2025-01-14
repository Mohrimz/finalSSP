<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;


class ShowProducts extends Component
{
    public $products;

    public function mount()
    {
        // Fetch all products from the database
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.show-products');
    }
}
