<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    //

    public function esport()
    {
      return $this->belongsTo('App\Esport','title'); // FK title references id
    }

    public function contenders()
    {
      return $this->hasMany('App\ContendingTeam');
    }

    public function matches()
    {
      return $this->hasMany('App\Match');
    }
}
