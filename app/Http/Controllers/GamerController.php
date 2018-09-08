<?php

namespace App\Http\Controllers;

use App\ContendingTeam;
use App\GamerMeta;
use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Roster;
use DB;
use App\Gamer;
use Laravel\Socialite\Facades\Socialite;
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
      $pagesize = config('app.gamers_per_page',2);
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
          $changed = true;
        }
        if($gamer->steamid!=$request->steamid)
        {
          $gamer->steamid = $request->steamid;
          $changed = true;
        }
        if($gamer->discordid != $request->inputDiscord)
        {
          $gamer->discordid = $request->inputDiscord;
          $changed = true;
        }

        if($changed)
          $gamer->save();

        $notification = "Your information has been updated.";
        $type = 'info';
        $request = request();
        $request->session()->flash('notification', $notification);
        $request->session()->flash('notification_type', $type);
        return redirect('/settings');
      }
      abort(404);
    }

    public function setupDiscord()
    {
      return view('discord');
    }

// Functions

    public function findByAlias($alias)
    {
      $gamer = Gamer::where('alias', $alias)->first();

      //returns null if one is not found
      return $gamer;
    }

    public function settings()
    {
      if(Auth::check())
      {

        $gamer=Auth::user();
        $meta=$gamer->meta;

        $steamid=$gamer->steamid;
        $battletag = $gamer->battlenetid;
        $discordtoken = $gamer->discordid;
        if (!is_null($steamid))
        {
          $data=$this->getSteamInfo($steamid);
          $info=json_decode($data);

          $gamer->personaname=$info->personaname;
          $gamer->steamavatar=$info->avatarmedium;
        }
        if(!is_null($battletag))
        {
          $data = $this->getOverwatchInfo($battletag);
          //dd($data);
          $info=json_decode($data);

          if($info->responseStatus == 'success') {
            $gamer->battletag=$battletag;
            $gamer->owavatar=$info->data;
          }
        }
        if(!is_null($discordtoken))
        {

          try
          {
            $discord_data = Socialite::driver('discord')->userFromToken($discordtoken);
          }
          catch(\Exception $e)
          {
            return redirect('/discord-oauth'); // regen discord token
          }

          if(!is_null($discord_data))
          {
            $gamer->discord_username = $discord_data->nickname;
            $gamer->discord_avatar = $discord_data->avatar;
          }
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

        $checkin_meta = Roster::with(['contendingTeam.matchContestants.match.contestants.contending_team',
                          'checkin'])
                    ->where('gamer_id', $gamer->id)
                    ->get();

        return view ('user_settings',
                          compact('gamer','meta','teams_formed', 'teams_joined', 'checkin_meta'));
      }

      abort(404);
    }
    public function getSteamInfo($steam64id)
    {
      $url = config('social.steam_url');
      $key = config('social.steam_api_key');
      $endpoint = $url.$key."&steamids=".$steam64id;

      $contents = file_get_contents($endpoint);

      $data = json_decode($contents);

      if(count($data->response->players) == 1)
      {
        $info = $data->response->players[0];
        $info->responseStatus = 'success';
      }
      else{
        $info = new InfoResponse();
        $info->responseStatus = 'failed';
      }


      return json_encode($info); //consumed by javascript. dot notation
    }

    public function getOverwatchInfo($battletag)
    {
      $btag = str_replace("#", "-", $battletag);
      $url = config('social.owapi_url');
      $url_suffix = config('social.owapi_suffix');

      $endpoint = $url.$btag;//.$url_suffix;

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $endpoint);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent:dgl-site/beta'));

      $contents = curl_exec($ch);
      //return $contents;
      $data = json_decode($contents);

      $response = new InfoResponse();
      if(isset($data->portrait))
      {
        $response->data=$data->portrait;
        $response->responseStatus='success';
      }
      else
      {
        $response->responseStatus='failed';
      }
      return json_encode($response);
    }
}

class InfoResponse
{

}