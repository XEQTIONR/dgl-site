<?php

namespace App\Http\Controllers;

use App\Clan;
use Illuminate\Http\Request;

class ClanController extends Controller
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
        $clan = new Clan;

        $clan->name = $request->name;
        $clan->clantag = $request->clantag;
        $clan->clanlord = $request->clanlord;

        $clan->save();

    return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function show(Clan $clan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function edit(Clan $clan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clan $clan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clan $clan)
    {
        //
    }
}
