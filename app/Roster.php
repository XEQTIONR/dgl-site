<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    //
    public $incrementing = false;

    public function contendingTeam()
    {
      return $this->belongsTo('App\ContendingTeam'); //foreign key contending_team_id
    }

    public function gamer()
    {
      return $this->belongsTo('App\Gamer'); //foreign key gamer_id;
    }

    public function checkin()
    {
      return $this->hasMany('App\Checkin');
    }
}
