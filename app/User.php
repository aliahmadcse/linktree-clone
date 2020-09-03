<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'background_color',
        'text_color'
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
     * Get the links associated with a user
     *
     * @return Relationship
     */
    public function links()
    {
        return $this->hasMany('App\Link');
    }

    /**
     * Get all the visits for a user
     * 
     * @return Relationship
     */
    public function visits()
    {
        return $this->hasManyThrough('App\Visit', 'App\Link');
    }

    /**
     * Get the route key for the model
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }
}
