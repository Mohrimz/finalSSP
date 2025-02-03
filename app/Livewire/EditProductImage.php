<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditProductImage extends Component
{
    use WithFileUploads;

    public $product;
    public $image;
    public $progress = 0;

    public function updatedImage()
{
    $this->progress = 0;

    // Validate the uploaded file
    $this->validate([
        'image' => 'required|image|max:2048', // Max 2MB
    ]);

    $path = $this->image->store('uploads', 'public');
    
    $this->product->update(['target_file' => $path]);

    $this->progress = 100;
    session()->flash('message', 'Image uploaded successfully!');
}


    public function render()
    {
        return view('livewire.edit-product-image');
    }
}