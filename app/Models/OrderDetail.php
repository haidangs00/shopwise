<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
        'order_id',
        'product_id',
        'created_at',
        'updated_at'
    ];
}
