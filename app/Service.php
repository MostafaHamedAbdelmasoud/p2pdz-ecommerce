<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;



class Service extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'user_id', 'user_verified', 'label', 'main_category','sub_category', 'quantity', 'price', 'price_desc', 'description', 'tags', 'duration','requirements', 'state', 'stars', 'reviewed', 'availability', 'rate', 'archive'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function service()
    {
        return $this->hasMany('App\Order');
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('service')
            ->singleFile()
            ->registerMediaConversions(function(Media $media){
                
                $this->addMediaConversion('thumb')
                    ->format('webp')
                    ->width(100)
                    ->height(100);

                $this->addMediaConversion('card')
                    ->format('webp')
                    ->width(200)
                    ->height(200);

                $this->addMediaConversion('banner')
                    ->format('webp')
                    ->width(500)
                    ->height(500);
                    
            });
           
    }


}
