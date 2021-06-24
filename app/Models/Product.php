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

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color', 'product_color', 'product_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size', 'product_size', 'product_id', 'size_id');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\WishList');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function getRating()
    {
        $ratings = $this->ratings;
        $totalStar = 0;
        $count = 0;
        foreach ($ratings as $rating) {
            $totalStar += $rating->star;
            $count++;
        }
        return $count > 0 ? $totalStar / $count : $totalStar;
    }

    public function getActiveComments()
    {
        return $this->comments()->where('status', 1)->get();
    }

    public function countComment()
    {
        return $this->getActiveComments()->count();
    }
}
