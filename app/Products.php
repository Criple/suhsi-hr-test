<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     *
     */
    public function orders()
    {
        return $this->belongsToMany('App\Orders', 'order_products', 'product_id','order_id')->withTimestamps()->withPivot(['quantity', 'price']);
    }
}
