<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_attribute extends Model
{
    protected $table = "product_attribute";

    protected $fillable = [
        'product_id',
        'attribute_value_id',
    ];
}
