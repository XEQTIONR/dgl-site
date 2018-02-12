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

use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Esport;
use App\Mail\SignUpAndRegister;
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
     * Show registeration form for this tournament.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function register(Tournament $tournament, Request $request)
    {
        echo $tournament->name;
        echo "<br>";
        echo $request->theinput;

    }

    public function mail()
    {
        Mail::to('x.e.q.tionrz@gmail.com')->send(new SignUpAndRegister());
        return(redirect('/'));
        echo "MAIL FUNC";
    }

    public function hi()
    {
        echo "PUBLIC HI FUNCTION";
    }
}
