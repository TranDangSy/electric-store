<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $fillable = [
        'quantity',
        'total_price',
        'bill_id',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class)->withDefault();
    }
}
