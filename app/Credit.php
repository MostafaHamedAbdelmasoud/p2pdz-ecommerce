<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Credit extends Model implements HasMedia
{
    use Notifiable, HasMediaTrait;

    
    protected $fillable = [
        'title',
    ];


    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('icon')
            ->singleFile()
            ->registerMediaConversions(function(Media $media){
                
                $this->addMediaConversion('card')
                    ->format('webp')
                    ->width(200)
                    ->height(200);

                $this->addMediaConversion('thumb')
                    ->format('webp')
                    ->width(50)
                    ->height(50);
                    
            });
           
    }
}