<?php

namespace App\Http\Controllers;


use App\ContendingTeam;
use App\Gamer;
use App\Roster;
use Illuminate\Http\Request;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm($alias, ContendingTeam $team)
    {
      $gamer = Gamer::where('alias', $alias)->first();


    //Following block of code does not work because roster does not have an atomic primary key.
//      $roster = Roster::where('contending_team_id', $team->id)
//                      ->where('gamer_id', $gamer->id)
//                      ->first();
//
//      $roster->status = 'ok';
//      $roster->save();

      Roster::where('contending_team_id', $team->id)
            ->where('gamer_id', $gamer->id)
            ->update(['status' => 'ok']);

      $roster = Roster:: where('contending_team_id', $team->id)
      ->where('gamer_id', $gamer->id)->first();

      return [$alias, $team->name, $roster->status];
    }
}
