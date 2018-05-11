<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class ContendingTeam extends Model
{

  //
  use CrudTrait;

  /*
  |--------------------------------------------------------------------------
  | RELATIONS
  |--------------------------------------------------------------------------
  */
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
  public function matchContestants()
  {
    return $this->hasMany('App\MatchContestant');
  }

  /*
  |--------------------------------------------------------------------------
  | ACCESSORS
  |--------------------------------------------------------------------------
  */

  public function getLogoSize1Attribute($value){
    return "/uploads/images/clan_logos/".$value;
  }

  public function getLogoSize2Attribute($value){
    return "/uploads/images/clan_logos/".$value;
  }
}
