<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gamer;
class GamerController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  alias or email  $identifier
     * @return \Illuminate\Http\Response
     */
    public function show($identifier, Request $request)
    {
        //
      //dd($request->route()->uri);
        $is_email = filter_var($identifier, FILTER_VALIDATE_EMAIL);

        if($is_email) //identifier is an email try searching by email
          $gamer = Gamer::where('email', $identifier)->first();
        else
        {
          //try searching by id
          $gamer=Gamer::where('id', $identifier)->first();
          if(is_null($gamer)) // if fails try searching by alias
            $gamer = Gamer::where('alias', $identifier)->first();
        }
        if(is_null($gamer))
          return "NOT FOUND";

        $gamer->uri = $request->route()->uri;
        return $gamer;
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
