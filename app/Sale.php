<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'name',
        'price_sale',
        'status',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
}
