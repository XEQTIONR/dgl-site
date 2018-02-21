<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentInvite extends Model
{
    //
    public $incrementing = false;
    protected $keyType = 'string';

    public function contendingTeam()
    {
      $this->belongsTo('App\ContendingTeam');
    }
}
