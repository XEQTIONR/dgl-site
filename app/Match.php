<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
  //
  protected $table = 'matches';

  public function tournament()
  {
    return $this->belongsTo('App\Tournament');
  }

  public function winner()
  {
    // won_id references id on contending_teams table
    return $this->belongsTo('App\ContendingTeam', 'won_id');
  }

  public function contestants()
  {
    return $this->hasMany('App\MatchContestant');
  }
}
