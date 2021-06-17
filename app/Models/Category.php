<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'status',
        'slug',
        'created_at',
        'updated_at'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function getParentsNames()
    {
        return $this->parent ? $this->parent->name : '';
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}
