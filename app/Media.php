<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'link',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
