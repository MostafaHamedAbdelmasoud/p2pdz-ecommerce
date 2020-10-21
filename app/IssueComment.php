<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class IssueComment extends Model implements HasMedia
{

    use Notifiable, HasMediaTrait;

    protected $fillable = [
        'user_id', 'issue_id', 'message',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }



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
