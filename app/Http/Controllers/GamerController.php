<?php

namespace App\Http\Controllers;

use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request)
    {
      //dd($request);
      if(Auth::check())
      {
        $gamer = Auth::user();
        $changed = false;
        $date = $request->dob;
        $dob = implode('-', array_reverse(explode('/',$date)));
        //dd($dob);
        if($gamer->alias!=$request->alias)
        {
          $gamer->alias = $request->alias;
          $changed = true;
        }
        if($gamer->fname!=$request->fname)
        {
          $gamer->fname = $request->fname;
          $changed = true;
        }
        if($gamer->lname!=$request->lname)
        {
          $gamer->lname = $request->lname;
          $changed = true;
        }
        if($gamer->dob!=$dob)
        {
          $gamer->dob = $dob;
          $changed = true;
        }

        if($changed)
          $gamer->save();

        return redirect('/settings');
      }
      abort(404);
    }

    public function settings()
    {
      if(Auth::check())
      {
        $gamer = Auth::user();
        return view ('user_settings', compact('gamer'));
      }

      abort(404);
    }
    public function getSteamInfo($steam64id)
    {
      $url = env('STEAM_USERINFO_URL');
      $key = env('STEAM_API_KEY');
      $mailadmin = env('MAIL_FROM_NAME');
      $endpoint = $url.$key."&steamids=".$steam64id;

      $contents = file_get_contents($endpoint);

      $data = json_decode($contents, TRUE);

      $info = $data['response']['players'][0];
      $info['responseStatus'] = 'success';
      //dd($info);
      return $info; //consumed by javascript. dot notation
      //returns an array with keys NOT AN OBJECT
      //return view('test', compact('info'));
    }
}