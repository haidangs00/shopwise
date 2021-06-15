<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'status',
        'created_at',
        'updated_at'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\BlogCategory', 'parent_id');
    }

    public function getParentsNames()
    {
        if ($this->parent) {
            return $this->parent->name;
        } else {
            return '';
        }
    }

    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }
}
