<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{

    /**
     *
     */
    public function orders()
    {
        return $this->hasMany('App\Orders', 'id');
    }
}
