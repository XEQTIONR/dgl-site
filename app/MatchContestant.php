<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchContestant extends Model
{
    //

    public function contending_team()
    {
      return $this->belongsTo('App\ContendingTeam');
    }
}
