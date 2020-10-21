<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   

    protected $fillable = [
        'user_id', 'service_id', 'message',  'quantity', 'price_desc', 'label', 'main_category', 'sub_category', 'state'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    

}
