<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
        'created_at',
        'updated_at'
    ];

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function getColorCode()
    {
        return $this->color->color_code;
    }

}
