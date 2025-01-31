<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $size = [];
    public $description;
    public $image;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'size' => 'required|array',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function saveProduct()
{
    $this->validate();

    // Save the uploaded image to the 'uploads' directory
    $imagePath = $this->image->store('uploads', 'public');

    // Create a new product
    Product::create([
        'name' => $this->name,
        'price' => $this->price,
        'size' => implode(',', $this->size),
        'description' => $this->description,
        'target_file' => $imagePath, // Store the image path in the database
    ]);

    // Reset fields and close the modal
    $this->reset(['name', 'price', 'size', 'description', 'image']);
    $this->showModal = false;

    session()->flash('message', 'Product added successfully!');
}


    public function render()
    {
        return view('livewire.add-product');
    }
}