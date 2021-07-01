<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'parent_id',
        'user_id',
        'product_id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function replies()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function rating()
    {
        return $this->hasOne('App\Models\Rating');
    }
}
