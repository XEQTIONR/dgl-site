@extends('layouts.email')
@section('content')
  <div class="row" style="min-height: 600px">
    <div class="col">
      <div style="margin: 10px">
        <h2>Welcome to DGLcore.com</h2>
        <p>You have been invited to participate in tournament </p>
        <h5>{{$tournament->name}}</h5>
        <p>for team</p>
        <h5> {{$team->name}} </h5>
        <p>by {{$captain->alias}}({{$captain->fname}} {{$captain->lname}})</p>
        <p>Please go to the following link to register to DGL. You are considered officially not on the roster until you have registered and confirmed your spot.
        {{$team->name}} will be disqualified if all teammates have not signed up and confirmed by the time registration closes.</p>

        <a class="button" href="{{env('APP_URL','http://localhost:8000')}}/tournament_invites/{{$inviteId}}">Join {{$team->name}}</a>

        <p>If you cannot see the button visit the following link </p>

        <a href="{{env('APP_URL','http://localhost:8000')}}/tournament_invites/{{$inviteId}}">{{env('APP_URL','http://localhost:8000')}}/tournament_invites/{{$inviteId}}</a>
        <p>Happy Gaming</p>


      {{--Tournament ID : {{$tournamentId}} Tournament {{$tournamentName}} <br>--}}

      {{--Team ID: {{$teamId}}  Team Name {{$teamName}}   Team Tag {{$teamTag}}<br>--}}

      {{--<a href="http://localhost:8000/tournament_invites/{{$inviteId}}">INVITE LINK</a>--}}

      <hr>
      </div>
    </div>
  </div>
@endsection