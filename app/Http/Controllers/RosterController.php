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

          $roster=Roster:: where('contending_team_id', $team->id)
            ->where('gamer_id', $gamer->id)->first();

          if($roster->status == 'ok')
          {
            $notification = "You are already registered in this tournament.";
            $type = 'warning';
            $request->session()->flash('notification', $notification);
            $request->session()->flash('notification_type', $type);

          }
          else
          {
            Roster::where('contending_team_id', $team->id)
              ->where('gamer_id', $gamer->id)
              ->update(['status'=>'ok']);

            $notification = "Succesfully registered for this tournament for team ". $team->name.".";
            $type = 'success';
            $request->session()->flash('notification', $notification);
            $request->session()->flash('notification_type', $type);
          }
        }
        else
        {
          $notification = "This invite is not for you.";
          $type = 'error';
          $request->session()->flash('notification', $notification);
          $request->session()->flash('notification_type', $type);

        }
      }
      else //else deadline expired
      {
        $notification = "Deadline for registering for this tournament has expired.";
        $type = 'error';
        $request->session()->flash('notification', $notification);
        $request->session()->flash('notification_type', $type);
      }
      return redirect('/tournaments/'.$team->tournament->id);
    }
}
