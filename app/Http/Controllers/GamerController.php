<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roster;
use DB;
use App\Gamer;
class GamerController extends Controller
{
    //
    public function index()
    {
      //$rosters = Roster::all();
      $rosters = DB::table('rosters')
                  ->select('gamer_id')
                  //->groupBy('gamer_id')
                  ->where('status', 'ok') //change this to ok
                  ->distinct()
                  ->get();
      $ids = array();
      foreach ($rosters as $roster)
      {
        array_push($ids, $roster->gamer_id);
      }

      $players = DB::table('gamers')
                  ->whereIn('id', $ids)
                  ->paginate(15);
      //return $ids;
      return view('players', compact('players'));
    }
}
