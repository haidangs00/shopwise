<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'note',
        'status',
        'date_begin',
        'date_end',
        'created_at',
        'updated_at'
    ];
}
