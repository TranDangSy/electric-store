<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'image',
        'keyword',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
