<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContendingTeam extends Model
{

  //

  public function tournament()
  {
    return $this->belongsTo('App\Tournament');
  }

  public function roster()
  {
    return $this->hasMany('App\Roster');
  }
  public function invites()
  {
    return $this->hasMany('App\TournamentInvite');
  }
}
