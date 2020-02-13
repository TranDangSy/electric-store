<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $fillable = [
        'bill_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class)->withDefault();
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
    

   
}
