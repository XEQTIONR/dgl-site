<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamerMeta extends Model
{
    //

  public function gamer()
  {
    return $this->belongsTo('App\Gamer');
  }
}
