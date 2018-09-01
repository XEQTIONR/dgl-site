<?php

namespace App;

use App\Mail\MatchNotification;
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
    return $this->belongsTo('App\MatchContestant', 'won_id');
  }

  public function contestants()
  {
    return $this->hasMany('App\MatchContestant');
  }

  public function potentialContestants()
  {
    return $this->hasMany('App\ContendingTeam','id','tournament_id');
  }

  public function checkins()
  {
    return $this->hasMany('App\Checkin');
  }

  public function notifyButton()
  {
    if(!$this->notified)
      return "<a href='/".config('backpack.base.route_prefix')."/notify-match/".$this->id."' class='btn btn-xs btn-warning'><i class='fa fa-envelope'></i>Email Contestants</a>";
    return null;
//    $contestants = $this->contestants->with('contending_team.tournament')->get();
//
//    if(count($contestants>1))
//    {
//      foreach($contestants as $contestant)
//      {
//        $team = $contestant->contending_team;
//        $rosters = $team->roster->with('gamer');
//
//        foreach($rosters as $roster)
//        {
//          if($roster->status == 'ok')
//          {
//            $mail = new MatchNotification($this, $contestants, $team);
//          }
//        }
//      }
//    }
  }

  
}
