<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRate extends Model
{
    protected $fillable = ['service_id', 'service_owner','order_id', 'user_id', 'rate'];

}
