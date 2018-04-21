<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roster;
use DB;
use App\Gamer;
class GamerController extends Controller
{
    //
    public function index(Request $request)
    {
      $rosters = DB::table('rosters')
                  ->select('gamer_id')
                  ->where('status', 'ok')
                  ->distinct()
                  ->get();
      $ids = array();
      foreach ($rosters as $roster)
      {
        array_push($ids, $roster->gamer_id);
      }
      $page = $request->page;
      $pagesize = 2;
      $offset = ($page-1) * $pagesize;
      if($offset<0)
        $offset=0;
      $a =
        DB::select(DB::raw("
            SELECT R.gamer_id, G.alias, G.fname, G.lname, R.contending_team_id, T.name, T.tag, R.captain, L.recent_at , R.status
            FROM (
                  SELECT gamer_id AS rosters_gamer_id, MAX(created_at) AS recent_at
                  FROM rosters 
                  GROUP BY rosters_gamer_id
                  ) AS L,
                  rosters AS R,
                  gamers AS G,
                  contending_teams AS T
            WHERE L.rosters_gamer_id = R.gamer_id
              AND L.recent_at = R.created_at 
              AND L.rosters_gamer_id = G.id
              AND T.id = R.contending_team_id
              
              "));

      $players = new \Illuminate\Pagination\LengthAwarePaginator(array_slice($a,$offset,$pagesize), count($a),$pagesize);
      $players->withPath('/players/');

      return view('players', compact('players'));
    }
}
