<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
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
     * Get the posts for this user
     */
    public function posts()
    {
        return $this->hasMany('App\Post')->orderBy('updated_at', 'desc');;
    }

    /**
      * Get the posts for this user
      */
     public function teams()
     {
         return $this->belongsToMany('App\Team');
     }

}
