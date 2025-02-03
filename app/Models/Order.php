<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // Make sure this matches your DB table name

    // List the columns that can be filled via create/update
    protected $fillable = [
        'user_name',
        'user_address',
        'product_id',
        'product_name',
        'quantity',
        'total_price',
        'order_date',
    ];
}
