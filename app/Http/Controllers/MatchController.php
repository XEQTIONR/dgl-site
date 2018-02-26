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

use Carbon\Carbon;
use Illuminate\Http\Request;

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
}
