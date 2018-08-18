@extends('layouts.email')
@section('content')
  <div class="row" style="min-height: 600px">
    <div class="col">
      <div style="margin: 10px">
        <h2>Hey {{$alias}}</h2>
        <p>You have been invited to participate in tournament </p>
        <h5>{{$tournament->name}}</h5>
        <p>for team</p>
        <h5> {{$team->name}} </h5>
        <p>Please go to the following link to confirm your registration. You are considered officially not on the roster until you have confirmed your spot.
          {{$team->name}} will be disqualified if all teammates have not signed up and confirmed by the time registration closes.</p>

        <a class="button" href="{{config('app.url','http://localhost:8000')}}/roster/{{$alias}}/{{$team->id}}">Join {{$team->name}}</a>

        <p>If you cannot see the button visit the following link </p>

        <a href="{{config('app.url','http://localhost:8000')}}/roster/{{$alias}}/{{$team->id}}">{{config('app.url','http://localhost:8000')}}/roster/{{$alias}}/{{$team->id}}</a>
        <p>Happy Gaming</p>
        <hr>
      </div>
    </div>
  </div>
@endsection