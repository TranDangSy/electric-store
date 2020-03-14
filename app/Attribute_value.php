<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_value extends Model
{
    protected $fillable = [
        'value',
        'attribute_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function attribute()
    {
       return $this->belongsTo(Attribute::class);
    }
}
