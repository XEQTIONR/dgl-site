@extends('layouts.email')
@section('content')

  <div class="row" style="min-height: 600px">
    <div class="col">
      <div class="row">
        <h3>You have a match coming up for</h3>
        <h3>{{$team->tournament->name}}</h3>
      </div>
      <div class="row">
        <div class="col">
          <img src="{{config('app.url','http://localhost:8000')}}{{$team->logo_size2}}" width="50" height="50"  alt="Esports team {{$team->name}} logo.">
          <span>{{$team->name}}</span><span>{{$team->tag}}</span>
        </div>
        <div class="col">
          vs
        </div>
        <div class="col">
          @foreach($contestants as $contestant)
            @if($contestant->contending_team->id != $team->id)
              <span>{{$team->tag}}</span><span>{{$team->name}}</span>
              <img src="{{config('app.url','http://localhost:8000')}}{{$contestant->contending_team->logo_size2}}" width="50" height="50"  alt="Esports team {{$team->name}} logo.">
            @endif
          @endforeach
        </div>
      </div>
      <div class="row">
        <span style="font-weight: bolder;">Checkin starts : </span> <span>{{\Carbon\Carbon::parse($match->checkinstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->toDateTimeString()}}</span>
      </div>
      <div class="row">
        <span style="font-weight: bolder;">Checkin ends : </span> <span>{{\Carbon\Carbon::parse($match->checkinend,config('app.timezone'))->setTimezone(config('app.user_timezone'))->toDateTimeString()}}</span>
      </div>
      <div class="row">
        <span style="font-weight: bolder;">Match starts : </span> <span>{{\Carbon\Carbon::parse($match->matchstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->toDateTimeString()}}</span>
      </div>
      <div class="row">
        <h3>Make sure to to checkin to your matches during the checkin window before the match. You can do that by either
        going you settings page or by visiting the tournament page on DGL. You must be signed in.</h3>

        <h6>Happy, Gaming</h6>
      </div>

    </div>
  </div>
@endsection