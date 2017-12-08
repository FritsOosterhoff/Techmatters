<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

  /**
  * Get all of the owning notifiable models.
  */
  public function notifiable()
  {
    return $this->morphTo();
  }

}
