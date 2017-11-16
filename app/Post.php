<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


		/**
      * Get the posts for this user
      */
     public function posts()
     {
         return $this->BelongsTo('App\Team', 'App\User');
     }


}
