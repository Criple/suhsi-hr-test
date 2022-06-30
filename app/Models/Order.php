<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['client_email', 'status'];

    /**
     * Gets status label
     * @return string
     */
    public function getStatusLabel()
    {
        switch ($this->status)
        {
            case 0:
                return 'Новый';
            case 10:
                return 'Подтвержден';
            case 20:
                return 'Завершен';
        }

        return 'Новый';
    }

    /**
     *
     */
    public function partner()
    {
        return $this->belongsTo('App\Models\Partner', 'partner_id');
    }

    /**
     *
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_products', 'order_id', 'product_id')->withTimestamps()->withPivot(['quantity', 'price']);
    }
}
