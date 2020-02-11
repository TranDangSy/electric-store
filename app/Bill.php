<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    protected $fillable = [
        'customer_id',
        'date_order',
        'total',
        'note',
        'status',
    ];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class)->withDefault();
    }
    public function bill_details()
    {
        return $this->hasMany(Bill_detail::class);
    }
}
