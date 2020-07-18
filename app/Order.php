<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function service()
    {
    	return $this->hasOne('App\Service', 'id', 'service_id');
    }
}
