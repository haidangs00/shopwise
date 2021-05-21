<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'image_id',
        'category_id',
        'color_id',
        'size_id',
        'brand_id',
        'regular_price',
        'promotional_price',
        'description',
        'status',
        'star',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function productColors()
    {
        return $this->hasMany('App\Models\ProductColor');
    }

    public function productSizes()
    {
        return $this->hasMany('App\Models\ProductSize');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\WishList');
    }

}
