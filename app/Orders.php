<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['client_email', 'status'];
    /**
     *
     */
    public function partner()
    {
        return $this->belongsTo('App\Partners', 'partner_id');
    }

    /**
     *
     */
    public function products()
    {
        return $this->belongsToMany('App\Products', 'order_products', 'order_id', 'product_id')->withTimestamps()->withPivot(['quantity', 'price']);
    }
}
