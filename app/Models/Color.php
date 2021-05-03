<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color_code',
        'created_at',
        'updated_at'
    ];

    public function productColors()
    {
        return $this->hasMany('App\Models\ProductColor');
    }

}
