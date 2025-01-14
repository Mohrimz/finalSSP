<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'target_file',
        'size',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'float',
        'size' => 'array', // Cast sizes as an array if stored as JSON or comma-separated
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope to filter products by status.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
