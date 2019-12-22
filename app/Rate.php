<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'rating',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
