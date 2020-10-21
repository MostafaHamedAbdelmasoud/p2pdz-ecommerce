<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'content', 'language', 'seen', 'delete_token', 'source', 'order_id', 'issue_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
