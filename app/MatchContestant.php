<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
class MatchContestant extends Model
{
    use CrudTrait;
    //protected $primaryKey = 'contending_team_id';
    //protected $table = 'match_contestant'; should auto detect
    protected $fillable = ['match_id', 'contending_team_id', 'score'];
    // protected $hidden = [];
    public function contending_team()
    {
      return $this->belongsTo('App\ContendingTeam');
    }
}
