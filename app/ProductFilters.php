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

    public function new_pro($order = 'desc')
    {
        return $this->builder->orderBy('id', $order);
    }

    public function buy_max($order = 'desc')
    {
        return $this->builder->orderBy('pay', $order);
    }

    public function status()
    {
        return $this->builder->where('status', 1);
    }
}
