<?php
/*
 * Copyright 2018 DAGAMELEAGUE

   ____    ___  __
  (  _ \  / __)(  )
   )(_) )( (_-. )(__  / _/ _ \ '_/ -_)_/ _/ _ \ '  \
  (____/  \___/(____) \__\___/_| \___(_)__\___/_|_|_|

  @author XEQTIONR
  @class MatchController
*/
namespace App\Http\Controllers;

use App\Checkin;
use App\MatchContestant;
use App\Roster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Match;
use App\Tournament;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $matches = Match::orderBy('matchstart', 'desc')
                      ->with('contestants.contending_team')
                      ->with('tournament')
                      ->paginate(10);

      $fixtures = array();
      $results = array();
      $today = Carbon::now()->format('jS F');;
      //dd($today);
      foreach ($matches as $match)
      {
        $count = count($results);
        $now = Carbon::now(config('app.user_timezone'));
        $date = Carbon::parse($match->matchstart,config('app.timezone'))->setTimezone(config('app.user_timezone'));
        $match->hrdow = $date->format('l');
        $match->hrdate = $date->format('jS F');
        $match->hrstarttime = $date->format('g:i A');

        if($now->format('jS F') == $match->hrdate)
          $match->today = false;
        else
        {
          $match->today = true;
        }
        if($now->gt($date)) //if after match start
        {
          if($match->won_id > 0) // if match has a winner match has a result
          {
            array_push($results, $match);
          }
          else // if no winner (maybe draw)
          {
            foreach ($match->contestants as $contestant)
            {
              if(!is_null($contestant->score)) // if any contestant has a score
              {
                array_push($results, $match);
                break;
              }
            }
          }
        }
        // checking if a match was pushed into $results array
        if( !( ($count+1) == count($results) ) )
          array_push($fixtures, $match);
      }
      $date = "";
      $fixtures = array_reverse($fixtures);
      for($i=0; $i<count($fixtures); $i++)
      {
        if($i==0) // IF FIRST ITEM
        {
          $date = $fixtures[$i]->hrdate;
          $fixtures[$i]->newtable = true;
          //$fixtures[$i]->DDATE = $date;
        }
        else // NOT FIRST ITEM
        {
          if($fixtures[$i]->hrdate == $date) // SAME TABLE
          {
            $fixtures[$i]->newtable = false;
            //$fixtures[$i]->DDATE = $date;
          }
          else //($fixtures[$i]->matchstart != $date) // NEW TABLE
          {
            $date = $fixtures[$i]->hrdate;
            $fixtures[$i]->newtable = true;
            //$fixtures[$i]->DDATE = $date;
          }
        }
      }

      //$results = array_reverse($results);
      for($i=0; $i<count($results); $i++)
      {
        if($i==0) // IF FIRST ITEM
        {
          $date = $results[$i]->hrdate;
          $results[$i]->newtable = true;
          //$fixtures[$i]->DDATE = $date;
        }
        else // NOT FIRST ITEM
        {
          if($results[$i]->hrdate == $date) // SAME TABLE
          {
            $results[$i]->newtable = false;
            //$fixtures[$i]->DDATE = $date;
          }
          else //($fixtures[$i]->matchstart != $date) // NEW TABLE
          {
            $date = $results[$i]->hrdate;
            $results[$i]->newtable = true;
            //$fixtures[$i]->DDATE = $date;
          }
        }
      }
      //return compact('fixtures', 'results', 'now');
      return view('matches.index', compact('matches','fixtures', 'results', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $tournaments = Tournament::whereDate('enddate', '>' , Carbon::now())->get();
      return view('matches.create', compact('tournaments'));

    }

    public function getContestants(Tournament $tournament)
    {
      $contestants = $tournament->contenders()
                                ->where('status', 'ok')
                                ->get();
      return $contestants;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $match = new Match;
      $contestants = collect(); //empty collection
      $match->tournament_id = $request->tournament;

      $match->save();

      foreach ($request->select as $contestant)
      {
        $mcontestant = new MatchContestant;
        //$mcontestant->match_id = $match->id;
        $mcontestant->contending_team_id = $contestant;

        $contestants->push($mcontestant);
      }

      $match->contestants()->saveMany($contestants);
      echo "DONE";
      //return $request;
      //var_dump($request);
      //echo "W E  H I T  T H I S";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //CUSTOM FUNCTIONS
  public function checkin(Roster $roster, Match $match, Request $request)
  {
    $myid = Auth::id();
    // should check whether a checkin already exists to avoid duplicate
    if($roster->gamer_id == $myid)
    {
      $checkin = new Checkin();
      $checkin->match_id = $match->id;
      $checkin->roster_id = $roster->id;

      $checkin->save();

      $notification = "You are now checked in for this match. Now prepare yourself.";
      $type = 'success';
      $request->session()->flash('notification', $notification);
      $request->session()->flash('notification_type', $type);

      return redirect('/tournaments/'. $match->tournament_id);
    }
  }
}
