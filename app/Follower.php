<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    /*

You may also retrieve the owner of a polymorphic relation from the polymorphic model
by accessing the name of the method that performs the call to morphedByMany.
In our case, that is the posts or  videos methods on the Tag model.
So, you will access those methods as dynamic properties:

    */

      public function user()
      {
        return $this->belongsTo('App\User');
      }
      
      // public function follow($value='')
      // {
      // return $this->morphMany('App\Follow', 'followable_type');
      // }

}
