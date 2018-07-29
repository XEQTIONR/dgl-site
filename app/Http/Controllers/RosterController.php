<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContendingTeam;
use App\Gamer;
use App\Roster;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm($alias, ContendingTeam $team, Request $request)
    {
      $tournament = $team->tournament;
      $gamer = Gamer::where('alias', $alias)->first();
      $user = Auth::user();
      $reg_end = $tournament->registration_end;
      $now = Carbon::now();
      $deadline = Carbon::createFromTimestamp(strtotime($reg_end));

      if($deadline->gt($now))
      {
        if($gamer->id == $user->id)
        {

          //only one match
          $roster=Roster:: where('contending_team_id', $team->id)
            ->where('gamer_id', $gamer->id)->first();

          if($roster->status == 'ok')
          {
            $notification = "You are already registered in this tournament.";
            $type = 'warning';
            $request->session()->flash('notification', $notification);
            $request->session()->flash('notification_type', $type);

          }
          else if($roster->status == 'confirmation_required')
          {
            $roster->status = 'ok';
            $roster->save();

            //change status of team in enough members are registered.
            $verified_rosters = Roster::where('contending_team_id', $team->id)
                              ->where('status', 'ok')
                              ->get();

            $teamsize = $tournament->esport->teamsize;

            if(count($verified_rosters)>=$teamsize)
            {
              if($team->status == 'registration_incomplete')
              {
                $team->status = 'unverified';
                $team->save();
              }
            }

            $other_rosters = DB::table('rosters')
              ->join('contending_teams', function($join) use($tournament){
                $join->on('rosters.contending_team_id', '=', 'contending_teams.id')
                  ->where('contending_teams.tournament_id', '=', $tournament->id);
              })
              ->where('gamer_id', $gamer->id)
              ->where('contending_team_id', '!=', $team->id)
              ->select('rosters.id')//, 'rosters.gamer_id' , 'rosters.contending_team_id', 'contending_teams.tournament_id')
              ->get();

            //Loop over them if you want to send email to each captain
//            foreach($other_rosters as $aroster)

            //Otherwise update all other roster request to rejected
            if(count($other_rosters)>0)
              DB::table('rosters')
                ->whereIn('id', $other_rosters)
                ->update(['status' => 'ineligible']);


            $notification = "Succesfully registered for this tournament for team ". $team->name.".";
            $type = 'success';
            $request->session()->flash('notification', $notification);
            $request->session()->flash('notification_type', $type);
          }
          else if($roster->status == 'ineligible')
          {
            $notification = "You are ineligible to join this team";
            $type = 'error';
            $request->session()->flash('notification', $notification);
            $request->session()->flash('notification_type', $type);
          }
          else if($roster->status == 'rejected')
          {
            $notification = "You already rejected this invitation. You cannot accept it again.";
            $type = 'error';
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
      return redirect('/tournaments/'.$tournament->id);
    }
}
