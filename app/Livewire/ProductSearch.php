<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $search = ''; // Search input value

    public function render()
    {
        // Query products based on the search term
        $products = Product::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.product-search');
    }
}
