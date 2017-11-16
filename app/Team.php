<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

		/**
      * Get the posts for this user
      */
     public function posts()
     {
         return $this->hasMany('App\Post');
     }


}
