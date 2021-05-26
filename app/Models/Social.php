<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'provider',
        'user',
        'created_at',
        'updated_at'
    ];

    public function login()
    {
        return $this->belongsTo('App\Models\User', 'user');
    }
}
