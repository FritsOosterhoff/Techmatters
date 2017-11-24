<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{


  /**
  * Get all of the owning commentable models.
  */
  public function likeable()
  {
    return $this->morphTo();
  }

  public function user()
  {
    return $this->belongsTo();
  }




}
