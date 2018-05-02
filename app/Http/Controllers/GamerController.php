<?php

namespace App\Http\Controllers;

use App\ContendingTeam;
use App\GamerMeta;
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
      if(Auth::check())
      {
        $gamer = Auth::user();
        $changed = false;
        $date = $request->dob;
        $dob = implode('-', array_reverse(explode('/',$date)));
        $meta = array();

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
        if($gamer->battlenetid!=$request->battlenetid)
        {
          $gamer->battlenetid = $request->battlenetid;
          $battnet_meta = new GamerMeta();
          $battnet_meta->meta_key = 'overwatch_avatar_url';
          $battnet_meta->meta_value = $request->battleNetAvatarURL;
          array_push($meta, $battnet_meta);

          GamerMeta::where('gamer_id', $gamer->id)
                  ->where('meta_key', 'overwatch_avatar_url')
                  ->delete();
          $changed = true;
        }
        if($gamer->steamid!=$request->steamid)
        {
          $gamer->steamid = $request->steamid;
          $steam_meta = new GamerMeta();
          $steam_meta->meta_key = 'steam_avatar_url';
          $steam_meta->meta_value = $request->steamAvatarURL;
          array_push($meta, $steam_meta);

          GamerMeta::where('gamer_id', $gamer->id)
                  ->where('meta_key', 'steam_avatar_url')
                  ->delete();
          $changed = true;
        }

        if($changed)
          $gamer->save();

        if(count($meta)>0)
          $gamer->meta()->saveMany($meta);

        return redirect('/settings');
      }
      abort(404);
    }

    public function settings()
    {
      if(Auth::check())
      {
        //$id = Auth::id()
        $gamer=Auth::user();
        $meta=$gamer->meta;

        $steamid=$gamer->steamid;

        if (!is_null($steamid))
        {
          $data=$this->getSteamInfo($steamid);
          $info=json_decode($data);
          $personaname=$info->personaname;
          $gamer->personaname=$personaname;
        }

        $rosters = Roster::where('gamer_id', $gamer->id)
                        ->get();
        $teams_captained = array();
        $teams_not_captained = array();

        foreach ($rosters as $roster)
        {
            if($roster->captain == 'true')
              array_push($teams_captained, $roster->contending_team_id);
            else
              array_push($teams_not_captained, $roster->contending_team_id);
        }

        $teams_captained_ids = array_unique($teams_captained);
        $teams_not_captained_ids = array_unique($teams_not_captained);

        $teams_formed = ContendingTeam::with([
        'roster' =>
          function($query) use ($gamer)
          {
            $query->where('gamer_id','!=',$gamer->id);
          },
        'roster.gamer',
        'tournament',
        'invites' =>
          function($query)
          {
            $query->whereNotIn('status', ['used']);
          }])->whereIn('id', $teams_captained_ids)
            ->get();

        $teams_joined = ContendingTeam::with([
          'tournament',
          'roster' =>
            function($query) use ($gamer)
            {
              $query->where('captain', 'true')
                    ->orWhere('gamer_id', $gamer->id)
                    ->get();
            },
          'roster.gamer' =>
            function($query) use ($gamer)
            {
              $query->where('id', '!=', $gamer->id)
                    ->get();
            }
          ])->whereIn('id', $teams_not_captained_ids)
              ->get();

        //return compact('teams_formed','teams_joined');
        return view ('user_settings', compact('gamer','meta','teams_formed', 'teams_joined'));
      }

      abort(404);
    }
    public function getSteamInfo($steam64id)
    {
      $url = env('STEAM_USERINFO_URL');
      $key = env('STEAM_API_KEY');
      $endpoint = $url.$key."&steamids=".$steam64id;

      $contents = file_get_contents($endpoint);

      $data = json_decode($contents);

      $info = $data->response->players[0];
      $info->responseStatus = 'success';

      return json_encode($info); //consumed by javascript. dot notation
    }

    public function getOverwatchInfo($battletag)
    {
      $btag = str_replace("#", "-", $battletag);
      $url = env('OW_API_URL');
      $url_suffix = env('OW_API_SUFFIX');

      $endpoint = $url.$btag.$url_suffix;

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $endpoint);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent:dgl-site/beta'));

      $contents = curl_exec($ch);
      $data = json_decode($contents);
      $response = new InfoResponse();

      $response->data = $data->us->stats->quickplay->overall_stats->avatar;
      $response->status = 'success';

      return json_encode($response);
    }
}

class InfoResponse
{

}