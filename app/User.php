<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable  implements HasMedia
{
    use Notifiable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country', 'city', 'email', 'password','user_type', 'last_known_notification', 'language', 'state', 'verified','verification_key'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function message()
    {
        return $this->hasMany('App\Message');
    }

    public function notification()
    {
        return $this->hasMany('App\Notification');
    }


    public function service()
    {
        return $this->hasMany('App\Service');
    }

    
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile()
            ->registerMediaConversions(function(Media $media){
                
                $this->addMediaConversion('thumb')
                    ->format('webp')
                    ->width(70)
                    ->height(70);
                    

                $this->addMediaConversion('card')
                    ->format('webp')
                    ->width(260)
                    ->height(260);

            });
           
    }




}
