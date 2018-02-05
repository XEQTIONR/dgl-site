<?php
/*
 * Copyright 2018 DAGAMELEAGUE
_____     ____  ___
 ||  \\  //  \\ ||
 ||   || || ___ ||  __
_||__//  \\__// ||__||core.com

@author XEQTIONR
*/

/*
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

Route::resource('/tournaments', 'TournamentController');
Route::get('/tournaments/{tournament}/registration','TournamentController@registration');
Route::post('/tournaments/{tournament}/register','TournamentController@register');
Route::get('/verify/{code}', 'VerificationController@verifyEmail');