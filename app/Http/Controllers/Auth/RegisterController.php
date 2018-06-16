<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

use App\Gamer;
use App\GamerMeta;
use App\ContendingTeam;
use App\Roster;
use App\TournamentInvite;

use App\Mail\VerifyEmailAddress;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:gamers',
            'password' => 'required|string|min:6|confirmed',
            'alias' => 'required|string|min:1|max:25|unique:gamers',
            'fname' =>  'required|alpha_dash|min:1|max:25',
            'lname' =>  'required|alpha_dash|min:1|max:25',
            'dob' =>  'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $date = explode("/",$data['dob']);

        $formatted = $date[2]."-".$date[1]."-".$date[0];

        $gamer =  Gamer::create([

            'email' => $data['email'],
            'password' => bcrypt($data['password']),

            'alias' =>  $data['alias'],
            'fname' =>  $data['fname'],
            'lname' =>  $data['lname'],
            'dob'   =>  $formatted,
            'status'=>  'unverified',

            'steamid'     =>  $data['steamid'],
            'battlenetid' =>  $data['battlenetid'],
            'discordid'   =>  $data['discordid'],
        ]);

        if(array_has($data, ['inviteId']))//skip the email verification
        {

          //update game status to normal
          $gamer->status = 'normal';
          $gamer->save();

          //add gamer to the roster of the contending team
          $roster = new Roster();
          $tournament_invite = TournamentInvite::find($data['inviteId']);
          $teamId = $tournament_invite->contending_team_id;
          $team = ContendingTeam::find($teamId);

          $roster->gamer_id = $gamer->id;
          $roster->status =  'ok';
          $roster->contending_team_id = $teamId;
          $team->roster()->save($roster);

          //update the tournament invite to unusable
          $tournament_invite->status = 'used';
          $tournament_invite->save();
          // Send an email confirming entry into tournament
          $notification = "You have successfully registered to DaGameLeague and for the tournament";
        }
        else
        {
          $metaVerify = new GamerMeta();

          $metaVerify->meta_key = 'email_verification_code';
          $metaVerify->meta_value = uniqid();

          $gamer->meta()->save($metaVerify);
          $email = new VerifyEmailAddress($data['email'], $metaVerify->meta_value);

          Mail::to($data['email'])->send($email);
          $notification = "You have successfully registered to DaGameLeague. Don't forget to verify your email address.";
        }


        $type = 'success';
        $request = request();
        $request->session()->flash('notification', $notification);
        $request->session()->flash('notification_type', $type);

        return $gamer;

    }

    public function tournamentInvites(TournamentInvite $invite)
    {
      $inviteId = $invite->id;
      $toEmail = $invite->email;

      return view('auth.register_with_tournament', compact('inviteId', 'toEmail'));
    }
}
