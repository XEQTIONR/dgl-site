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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify/{code}', 'VerificationController@verifyEmail');
Route::get('/resend_verify/{gamer}','VerificationController@resendVerificationEmail');

Route::resource('/tournaments', 'TournamentController');
Route::get('/tournaments/{tournament}/registration','TournamentController@registration');
Route::post('/tournaments/{tournament}/register','TournamentController@register');
Route::get('/tournament_invites/{invite}', 'Auth\RegisterController@tournamentInvites');
Route::get('/tournaments/{identifier}/{tournament}', 'TournamentController@verifyGamer');
Route::resource('/gamers', 'GamerController');

Route::get('/roster/{alias}/{team}', 'RosterController@confirm');

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

  Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['admin'],
    'namespace' => 'Admin'
  ], function() {
    // your CRUD resources and other admin routes here
    CRUD::resource('tournament', 'TournamentCrudController');
    CRUD::resource('gamer', 'GamerCrudController');
    CRUD::resource('blog_post', 'Blog_postCrudController');

    CRUD::resource('esport','EsportCrudController');
    CRUD::resource('contending_team','Contending_teamCrudController');
    CRUD::resource('match','MatchCrudController');
    CRUD::resource('match_contestant', 'Match_contestantCrudController'); // for scores
    CRUD::resource('banner','BannerCrudController');
  });

Route::get('/steamapi/{steam64id}', 'GamerController@getSteamInfo');
Route::get('/owapi/{battletag}', 'GamerController@getOverwatchInfo');

Route::get('/settings', 'GamerController@settings')->name('settings');