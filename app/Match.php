<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Match extends Model
{
  //
  use CrudTrait;

  protected $table = 'matches';

  protected $fillable = ['checkinstart','checkinend', 'matchstart', 'stage', 'notes',
                        'tournament_id', 'won_id'];


  /*
  |--------------------------------------------------------------------------
  | RELATIONS
  |--------------------------------------------------------------------------
  */

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

  public function potentialContestants()
  {
    return $this->belongsToMany('App\ContendingTeam','id','tournament_id');
  }

  
}
