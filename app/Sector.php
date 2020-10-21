<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    //

    protected $with = [
        'fields'
    ];

    public function fields()
    {
        $this->belongsTo(Field::class);
    }
}
