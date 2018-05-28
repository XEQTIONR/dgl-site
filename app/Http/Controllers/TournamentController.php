<?php

/*
 * Copyright 2018 DAGAMELEAGUE

 ____    ___  __
(  _ \  / __)(  )
 )(_) )( (_-. )(__  / _/ _ \ '_/ -_)_/ _/ _ \ '  \
(____/  \___/(____) \__\___/_| \___(_)__\___/_|_|_|

  @author XEQTIONR
  @class Tournament Controller
*/

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignUpAndRegister;
use App\Mail\RegisterforTournament;

use App\Tournament;
use App\Esport;
use App\Roster;
use App\ContendingTeam;
use App\Gamer;
use App\TournamentInvite;
use App\Match;

use Carbon\Carbon;


class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $Parsedown = new \Parsedown();
      $now = Carbon::now();
      $nowstr = Carbon::now()->toDateString();
      $ids = array();
      $future = array();
      $past = array();
      //return $now;
      $active_tournaments = Tournament::whereDate('startdate', '<=', $nowstr)
                                      ->whereDate('enddate','>=', $nowstr)
                                      ->get();
      foreach ($active_tournaments as $active_tournament)
      {
        $active_tournament->description = $Parsedown->text($active_tournament->description);
        array_push($ids,$active_tournament->id);
      }
      $tournaments = Tournament::whereNotIn('id', $ids)
                                ->orderBy('startdate','DESC')
                                ->orderBy('enddate','DESC')
                                ->get();
      foreach ($tournaments as $tournament)
      {
        $tournament->description = $Parsedown->text($tournament->description);
        $date = Carbon::createFromFormat('Y-m-d',$tournament->startdate);
        if($date->gt($now))
          $tournament->upcoming = true;
        else
          $tournament->upcoming = false;
      }

      return view('tournaments.index', compact('active_tournaments',
                                                          'tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $titles = Esport::all();

        return view('tournaments.create', compact('titles'));
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
        //dd("HEREY");
        $tournament = new Tournament;

        $tournament->name = $request->name;
        $tournament->description = $request->description;
        $tournament->rules = $request->rules;
        $tournament->startdate = $request->startdate;
        $tournament->enddate = $request->enddate;
        $tournament->title = $request->title;
        $tournament->squadsize = $request->squadsize;

        $tournament->save();

        return redirect('/');
        //echo "STORE FUNCTION";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //
      $Parsedown = new \Parsedown();
      $registration_active = 'true';
      $future = collect();
      $checkingin = collect();
      $waiting = collect();
      $past = collect();
      $now = Carbon::now();
      $contenders = $tournament->contenders()->get();
      $matches = $tournament->matches()
        ->with(['contestants.contending_team.roster'=>function($query){
            $query->where('status','ok');
            $query->with('gamer');
          },'checkins'])
        ->get();

      foreach ($matches as $match)
      {
        $start = new Carbon($match->matchstart);
        $checkinstart = new Carbon($match->checkinstart);
        $checkinend = new Carbon($match->checkinend);

        if($now->lt($checkinstart))
        {
          $future->push($match);
        }
        else if( ($now->gte($checkinstart)) && ($now->lte($checkinend)) )
        {
          $checkingin->push($match);
        }
        else if($now->lt($start))
        {
          $waiting->push($match);
        }
        else
        {
          $past->push($match);
        }
      }

      if(!is_null($tournament->description))
        $tournament->description = $Parsedown->text($tournament->description);

      if(!is_null($tournament->rules))
        $tournament->rules = $Parsedown->text($tournament->rules);

      if($now->gte(new Carbon($tournament->registration_end)))
        $registration_active = 'false';

      $tournament->registration_active = $registration_active;

      //return ['waiting' => $waiting, 'checkingin' => $checkingin, 'future' => $future, 'past' => $past];

      return view('tournaments.atournament',
        compact('tournament', 'waiting','checkingin','future', 'past','contenders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //
    }

    ////CUSTOM FUNCTIONS

  /**
   * This function just redirects back to the same tournament page
   * Applies the auth middleware in the routes file.
   *
   * @param  \App\Tournament  $tournament
   * @return \Illuminate\Http\Response
   */
    public function loginForTournament($id)
    {
      return redirect('/tournaments/'.$id);
    }
    /**
     * Show registeration form for this tournament.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function registration(Tournament $tournament)
    {

        return view('tournaments.register', compact('tournament'));
    }

    /**
     * Process Registration for tournment.
     *
     * @param  \App\Tournament  $tournament
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, Tournament $tournament)
    {

      $validatedData = $request->validate([
        //'title' => 'required|unique:posts|max:255',
        'img300' => 'required',
      ]);


      $gamerCollection = $request->gamer;
      $rosters = collect();
      $invites = collect();
      $path1 = $request->file('img300')->store('images/clan_logos', 'uploads');
      $path1 = basename($path1);

      if(!is_null($request->img100)) //100 px image optional
      {
        $path2 = $request->file('img100')->store('images/clan_logos', 'uploads');
        $path2 = basename($path2);
      }

      $team = new ContendingTeam();

      $team->name = $request->name;
      $team->tag = $request->tag;
      $team->tournament_id = $tournament->id;
      $team->status = 'registration_incomplete';
      $team->logo_size1 = $path1;
      if(!is_null($request->img100))
        $team->logo_size2 = $path2;
      $team->save();

      foreach ($gamerCollection as $alias)
      {
        // if the alias returned is an email then create a new gamer
        if( filter_var($alias, FILTER_VALIDATE_EMAIL))
        {

          $invite = new TournamentInvite();
          $invite->id = uniqid();
          $invite->contending_team_id = $team->id;
          $invite->email = $alias;
          $invite->status = 'available';
          $email = new SignUpandRegister($alias, $invite->id, $team, $tournament);

          $invites->push($invite);
          Mail::to($alias)->send($email);
        }
        else // an alias of an already existing gamer was returned
        {
          $gamer = Gamer::where('alias', $alias)->first();
          $roster  = new Roster();
          $emailNotification = new RegisterforTournament($alias, $team, $tournament);

          $roster->gamer_id = $gamer->id;
          $roster->status = 'confirmation_required'; //previously ok
          $roster->contending_team_id = $team->id;

          if($gamerCollection[0] == $alias) // if this is the first in gamer collection
            $roster->captain = "true"; // then this person is the captain of the team
          else
            $roster->captain = "false";

          $rosters->push($roster);
          Mail::to($gamer->email)->send($emailNotification);
        }
      }
      $team->roster()->saveMany($rosters);
      $team->invites()->saveMany($invites);
      return $team->id;
    }

    public function verifyGamer($identifier, Tournament $tournament)
    {
      $is_email = filter_var($identifier, FILTER_VALIDATE_EMAIL);

      if($is_email) //identifier is an email try searching by email
        $gamer = Gamer::where('email', $identifier)->first();
      else
      {
        //try searching by id
        $gamer = Gamer::where('id', $identifier)->first();
        if(is_null($gamer)) // if fails try searching by alias
          $gamer = Gamer::where('alias', $identifier)->first();
      }
      if(is_null($gamer)) // if null then 2 possibilities
      {
        if($is_email) // 1. New unregistered gamer
          return $identifier;
        else // 2. Incorrect gamer id or alias;
          return "NOT FOUND";
      }
      else // a gamer was found. Now check whether already registered for tournament
      {
        if( $gamer->status == 'unverified')
          return "gamer-unverified";
        $registrations = Roster::where('gamer_id', $gamer->id)
          ->where('status', 'ok')
          ->get();

        foreach ($registrations as $registration)
        {
          if($registration->contendingTeam->tournament->id == $tournament->id)
          {
            return "already-registered"; // we check against this returned text
            break;
          }
        }
      }
      // Check whether this gamer is already registered in a team
      // for this tournament
      return $gamer;

    }
}
