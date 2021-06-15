<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size_id',
        'created_at',
        'updated_at'
    ];

    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function getSize()
    {
        return $this->size->name;
    }
}
