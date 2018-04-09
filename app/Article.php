<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

      /**
      * Get the posts for this user
      */
      public function user()
      {
        return $this->BelongsTo('App\User');
      }

}
