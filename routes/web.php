<?php
/*
 * Copyright 2018 DAGAMELEAGUE

 ____    ___  __
(  _ \  / __)(  )
 )(_) )( (_-. )(__  / _/ _ \ '_/ -_)_/ _/ _ \ '  \
(____/  \___/(____) \__\___/_| \___(_)__\___/_|_|_|

@author XEQTIONR
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MiscController@home');
Route::get('/about-us','MiscController@aboutus')->name('about');
Route::get('/about-dateam','MiscController@aboutdateam')->name('about-dateam');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify/{code}', 'VerificationController@verifyEmail');
Route::get('/resend_verify/{gamer}','VerificationController@resendVerificationEmail');

Route::resource('/tournaments', 'TournamentController');
Route::get('/tournaments/{tournament}/registration','TournamentController@registration');
Route::post('/tournaments/{tournament}/register','TournamentController@register');
Route::get('/tournament_invites/{invite}', 'Auth\RegisterController@tournamentInvites');
Route::get('/tournaments/{identifier}/{tournament}', 'TournamentController@verifyGamer'); // not used anymore
Route::get('/tournament/login/{id}', 'TournamentController@loginForTournament')->middleware('auth');

Route::resource('/gamers', 'GamerController');

Route::get('/roster/{alias}/{team}', 'RosterController@confirm')->middleware('auth');

Route::resource('/matches', 'MatchController');
Route::get('/checkin/{roster}/{match}', 'MatchController@checkin');
Route::get('/matches/contestants/{tournament}', 'MatchController@getContestants');

Route::resource('/teams', 'ContendingTeamController');
Route::get('/teams/tournament/{tournament}', 'ContendingTeamController@indexTournament');

Route::get('/api/contendingteams', 'ContendingTeamController@index');
Route::get('/api/category/{id}', 'ContendingTeamController@show');

Route::resource('/news', 'NewsController');

Route::get('/players', 'GamerController@index');

Route::resource('/media', 'MediaController');
Route::get('/album/{album}','MediaController@listAlbum');
  Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['admin'],
    'namespace' => 'Admin'
  ], function() {
    // your CRUD resources and other admin routes here
    Route::get('/approve/{team}', 'Contending_teamCrudController@approve');
    CRUD::resource('tournament', 'TournamentCrudController');
    CRUD::resource('gamer', 'GamerCrudController');
    CRUD::resource('blog_post', 'Blog_postCrudController');

    CRUD::resource('esport','EsportCrudController');
    CRUD::resource('contending_team','Contending_teamCrudController');
    CRUD::resource('match','MatchCrudController');
    CRUD::resource('match_contestant', 'Match_contestantCrudController'); // for scores
    CRUD::resource('banner','BannerCrudController');
    CRUD::resource('album', 'AlbumCrudController');
    CRUD::resource('widget', 'WidgetCrudController');
  });


Route::get('/findgamer/{alias}', 'GamerController@findByAlias');

Route::get('/steamapi/{steam64id}', 'GamerController@getSteamInfo');
Route::get('/owapi/{battletag}', 'GamerController@getOverwatchInfo');

Route::get('/settings', 'GamerController@settings')->name('settings')->middleware('auth');
Route::get('/settings/discord','GamerController@setupDiscord')->middleware('auth');

//This link goes to discord site.. use this.
Route::get('/discord-oauth', function(Illuminate\Http\Request $request){

  return Socialite::with('discord')->redirect();
});
Route::get('/discord', function(Illuminate\Http\Request $request){

  $data = Socialite::driver('discord')->user();

  $user = Auth::user();

  $user->discordid = $data->token;
  $user->save();

  $notification = "All done. Discord ID setup with DGL.";
  $type = 'success';
  $request = request();
  $request->session()->flash('notification', $notification);
  $request->session()->flash('notification_type', $type);


  $rosters = Roster::with('contendingTeam.tournament')
    ->where('gamer_id', $user->id)
    ->get();

  foreach($rosters as $roster)
  {
    $tournament = $rosters->contendingTeam->tournament;
    $team = $rosters->contendingTeam;
    $teamsize = $tournament->esport->teamsize;

    $startdate = Carbon::parse($tournament->startdate);

    if($startdate->gte(Carbon::now()))
    {
      if ($roster->status=='discord_required')
      {
        $roster->status=='ok';
        $roster->save();

        $rosters = \App\Roster::where('contending_team_id', $team->id)
                  ->where('status', 'ok')
                  ->get();

        if(count($rosters)>=$teamsize);
          if($team->status == 'registration_incomplete')
          {
            $team->status = 'unverified';
            $team->save();
            //send email to admin.
          }

      }


    }
  }

  //echo "in /discord";
  //return $request;
  return redirect('/settings');
});




Route::get('/test', function(){

  //return view('test');
  $address = 'test@test.com';
  $code = '321j3u1j3o1';
  return new App\Mail\VerifyEmailAddress($address, $code);
});

Route::get('/test2', function(){


  //return view('test');
  $tournament = App\Tournament::first();
  $team = App\ContendingTeam::first();
  //dd($tournament, $team);
  $alias = 'gamertag1';
//    $tournament->name = 'DA* League 2018';
//    $team->name = 'DaTeaM Prime';
//    $team->id = 1;
  return new App\Mail\RegisterforTournament($alias, $team, $tournament);
});
Route::get('/test3', function(){


  //return view('test');
  $tournamentId = \App\Tournament::first();
  $tournamentName = "DA* League 2018";
  $teamId = \App\ContendingTeam::first();
  $teamName = 'DaTeaM Prime';
  $teamTag = 'DtM`';
  $inviteId = 1;
  $email = 'x.e.q.tionrz@gmail.com';
  //dd($tournament, $team);
  //$alias = 'gamertag1';
//    $tournament->name = 'DA* League 2018';
//    $team->name = 'DaTeaM Prime';
//    $team->id = 1;
  return new App\Mail\SignUpAndRegister($email, $inviteId, $teamId, $tournamentId);
});
Route::get('/test4', function(){

  $to = 'x.e.q.tionrz@gmail.com';
  $al = 'XEQTIONR';
  $tn = 'DaTeaM';
  $tt = 'DtM`';
  $tourney = 'DA* League 2018';

  return new App\Mail\TeamApproved($to, $al, $tn, $tt, $tourney);
});



