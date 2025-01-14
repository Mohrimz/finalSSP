<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class TestComponent extends Component
{
    public $search = ''; // To bind the search input
    public $products = []; // To hold the fetched products

    public function fetchProducts()
    {
        // Fetch products matching the search term
        $this->products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function render()
    {
        return view('livewire.test-component');
    }
}