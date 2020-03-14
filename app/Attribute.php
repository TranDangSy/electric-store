<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name',
    ];

    public function attribute_values()
    {
        return $this->hasMany(Attribute_value::class);
    }
}
