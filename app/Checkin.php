<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    //

  public function roster()
  {
    return $this->belongsTo('App\Roster');
  }

  public function match()
  {
    return $this->belongsTo('App\Match');
  }
}
