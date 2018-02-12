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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hi', 'TournamentController@hi');

Route::resource('/tournaments', 'TournamentController');
Route::get('/tournaments/{tournament}/registration','TournamentController@registration');
Route::post('/tournaments/{tournament}/register','TournamentController@register');
Route::get('/verify/{code}', 'VerificationController@verifyEmail');
Route::get('/mail','TournamentController@mail');


Route::resource('/gamers', 'GamerController');
