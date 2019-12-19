<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $fillable = [
        'name',
        'image',
        'decription',
        'price_sale',
        'status',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
}
