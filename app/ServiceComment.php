<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceComment extends Model
{
    protected $fillable = ['user_id', 'service_id', 'comment'];
}
