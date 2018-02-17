<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContendingTeam extends Model
{
    //
  protected $table = 'contending_team';


  public function tournament()
  {
    return $this->belongsTo('App\Tournament');
  }

  public function roster()
  {
    return $this->hasMany('App\Roster');
  }
}
