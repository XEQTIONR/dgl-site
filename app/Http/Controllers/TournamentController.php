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
      $gamerCollection = $request->gamer;
      $rosters = collect();
      $invites = collect();

      $team = new ContendingTeam();

      $team->name = $request->name;
      $team->tag = $request->tag;
      $team->tournament_id = $tournament->id;
      $team->status = 'registration_incomplete';

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
}
