<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  /**
  * Get the posts for this user
  */
  public function user()
  {
    return $this->BelongsTo('App\User');
  }

  /**
  * Get the posts for this user
  */
  public function team()
  {
    return $this->BelongsTo('App\Team');
  }

  /**
  * Get all of the post's comments.
  */
  public function comments()
  {
    return $this->morphMany('App\Comment', 'commentable');
  }
  
  /**
  * Get all of the post's comments.
  */
  public function likes()
  {
    return $this->morphMany('App\Like', 'likeable');
  }
}
