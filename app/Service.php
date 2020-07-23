<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'service';

    protected $fillable = [
        'name', 'summary', 'detail','image_path','price','rank', 'ishome'
    ];
}
