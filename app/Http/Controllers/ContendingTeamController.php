<?php

namespace App\Http\Controllers;

use App\ContendingTeam;
use App\Tournament;
use Illuminate\Http\Request;

class ContendingTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $tournaments = Tournament::all();
      $this_tournament = "All";
      $teams = ContendingTeam::where('status', 'ok')->paginate(2);

      return view('teams', compact('teams', 'tournaments', 'this_tournament'));
    }

    public function indexTournament(Tournament $tournament)
    {
      $tournaments = Tournament::all();
      $this_tournament = $tournament;
      $teams = ContendingTeam::where('tournament_id', $tournament->id)
                              ->where('status', 'ok')
                              ->get();
      return view('teams', compact('teams', 'tournaments', 'this_tournament'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContendingTeam  $contendingTeam
     * @return \Illuminate\Http\Response
     */
    public function show(ContendingTeam $contendingTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContendingTeam  $contendingTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(ContendingTeam $contendingTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContendingTeam  $contendingTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContendingTeam $contendingTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContendingTeam  $contendingTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContendingTeam $contendingTeam)
    {
        //
    }
}
