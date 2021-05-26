<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'star',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function comment()
    {
        return $this->hasOne('App\Models\Comment');
    }
}
