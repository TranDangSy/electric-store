<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'decription',
        'image',
        'quantity',
        'price',
        'discount',
        'popular',
        'hot',
        'status',
        'category_id',
        'brand_id',
        'media_id',
    ];

    public function category()
    {
       return $this->belongsTo(Category::class)->withDefault();
    }

    public function brand()
    {
       return $this->belongsTo(Brand::class)->withDefault();
    }

    public function media()
    {
       return $this->belongsTo(Media::class)->withDefault();
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function bills()
    {
    	return $this->hasMany(Bill::class);
    }

    public function sales()
    {
    	return $this->hasMany(Sale::class);
    }

    public function advertises()
    {
    	return $this->hasMany(Advertise::class);
    }
}
