<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContendingTeam;
use App\Gamer;
use App\Roster;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm($alias, ContendingTeam $team, Request $request)
    {
      $gamer = Gamer::where('alias', $alias)->first();
      $user = Auth::user();
      $reg_end = $team->tournament->registration_end;
      $now = Carbon::now();
      $deadline = Carbon::createFromTimestamp(strtotime($reg_end));

      if($deadline->gt($now))
      {
        if($gamer->id == $user->id)
        {
        //Following block of code does not work because roster does not have an atomic primary key.
//      $roster = Roster::where('contending_team_id', $team->id)
//                      ->where('gamer_id', $gamer->id)
//                      ->first();
//
//      $roster->status = 'ok';
//      $roster->save();
          Roster::where('contending_team_id', $team->id)
            ->where('gamer_id', $gamer->id)
            ->update(['status'=>'ok']);

          $roster=Roster:: where('contending_team_id', $team->id)
            ->where('gamer_id', $gamer->id)->first();

          //TODO: return a view or flash message with data

          $notification = "Succesfully registered for this tournament.";
          $type = 'success';
          $request->session()->flash('notification', $notification);
          $request->session()->flash('notification_type', $type);
          return redirect('/tournaments/'.$team->tournament->id);
        }
        //registering user is not logged in
        //this should not happen when we apply the middleware
      }
      else //else deadline expired
      {
        $notification = "Deadline for registering for this tournament has expired.";
        $type = 'error';
        $request->session()->flash('notification', $notification);
        $request->session()->flash('notification_type', $type);
        return redirect('/tournaments/'.$team->tournament->id);
      }

    }
}
