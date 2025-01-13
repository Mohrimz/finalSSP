<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name if it's different from the default 'products'
    protected $table = 'products';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'name',
        'size',
        'price',
        'description',
        'status',
        'image', // This will store the image file name or path
    ];
    public $timestamps = false;
    

    // Optionally, you can add any relationships with other models here
    // For example, if products belong to a category, you could define a relationship method
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
