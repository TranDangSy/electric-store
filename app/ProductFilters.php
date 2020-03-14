<?php

namespace App;

class ProductFilters extends QueryFilter
{
    public function price_desc($order = 'desc')
    {
        return $this->builder->orderBy('price', $order);
    }

    public function price_asc($order = 'asc')
    {
        return $this->builder->orderBy('price', $order);
    }

    // public function quantity($qty)
    // {
    //     return $this->builder->where('quantity', $qty);
    // }

    public function length($order = 'desc')
    {
        return $this->builder->orderBy('length', $order);
    }
}
