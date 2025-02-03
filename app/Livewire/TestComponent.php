<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class TestComponent extends Component
{
    public $search = ''; 
    public $products = []; 

    public function mount()
    {
        $this->fetchProducts();
    }

    public function fetchProducts()
    {
        $this->products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function toggleStatus($productId, $newStatus)
    {
        $product = Product::find($productId);

        if ($product) {
            $product->status = $newStatus;
            $product->save();

            $this->fetchProducts();

            session()->flash('message', 'Product status updated successfully!');
        }   
    }

    public function render()
    {
        return view('livewire.test-component');
    }
}