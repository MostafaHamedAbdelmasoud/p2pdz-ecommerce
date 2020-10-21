<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class ChatMessage extends Model implements HasMedia
{


    use Notifiable, HasMediaTrait;

    protected $fillable = ['chat_message_id', 'to_user_id', 'from_user_id', 'chat_message', 'seen'];



    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('image')
            ->singleFile()
            ->registerMediaConversions(function(Media $media){
                
                $this->addMediaConversion('thumb')
                    ->format('webp')
                    ->width(100)
                    ->height(70);
                    
            });
           
    }
    
}
