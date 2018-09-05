<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class ContendingTeam extends Model
{

  //
  use CrudTrait;

  protected $fillable = ['name', 'tag', 'clan_id','tournament_id','status',
                        'logo_size1', 'logo_size2'];

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

  public function approveButton()
  {
    // if not verified by admin yet.
    if($this->status=='unverified')
      return "<a href='/".config('backpack.base.route_prefix')."/approve/".$this->id."' class='btn btn-xs btn-success'><i class='fa fa-check'></i> Approve</a>";
    else
      return null;
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
