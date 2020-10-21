<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderIssue extends Model
{
    protected $fillable = ['order_id', 'user_id', 'issue_user_id', 'state', 'issue'];
    
}
