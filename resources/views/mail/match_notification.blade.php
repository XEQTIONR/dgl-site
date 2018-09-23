{{--@extends('layouts.email')--}}
{{--@section('content')--}}
<body style="font-family: Helvetica, Sans-Serif">
<div class="row" style="width: 100%;
    display: flex;
    justify-content: center;">
  <div class="col" style="
    width: 500px">
    <img class="logo"
         style="display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 15px;"
         src="{{URL::asset('storage/DGLcolorLogo.png')}}"  alt="DaGameLeague Logo">
    {{--<img src="{{URL::asset('storage/banner-email.png')}}" width="100%">--}}
    {{--<h2 class="text-center">ĐAGAMELEAGUE</h2>--}}
  </div>
  {{--<hr>--}}
</div>
  <div class="row" style="display: flex;
      justify-content: center;
      min-height: 600px">
    <div class="col"  style="padding: 0 20px; max-width: 500px;">
      {{--<div class="row">--}}
        You have a match coming up for
        <h3>{{$team->tournament->name}}</h3>
      {{--</div>--}}
      <div class="row" style="
      display: flex;
      justify-content: center; margin-bottom: 30px;">
        <div class="col" style="display: flex; width: 15%;">
          <img style="display: block; margin: auto;" src="{{config('app.url','http://localhost:8000')}}{{$team->logo_size2}}" width="50" height="50"  alt="Esports team {{$team->name}} logo.">
        </div>
        <div class="col" style="display: inline-block; width: 30%;">
          {{--<span style="margin: 10px 0px;">{{$team->name}}</span><span  style="displaymargin: 10px 0px;">({{$team->tag}})</span>--}}
          <h3 style="text-align: center">{{$team->name}}({{$team->tag}})</h3>
        </div>
        <div class="col" style="display: flex; width: 10%; justify-content: center;">
          <h5 style="text-align: center;">vs</h5>
        </div>
        {{--<div class="col">--}}
          @foreach($contestants as $contestant)
            @if($contestant->contending_team->id != $team->id)
              <div class="col" style="display: inline-block; width: 30%;">
                <h3 style="text-align: center">({{$contestant->contending_team->tag}}){{$contestant->contending_team->name}}</h3>
              </div>
              <div class="col" style="display: flex; width: 15%;">
                <img style="display: block; margin: auto;" src="{{config('app.url','http://localhost:8000')}}{{$contestant->contending_team->logo_size2}}" width="50" height="50"  alt="Esports team {{$contestant->contending_team->name}} logo.">
              </div>
            @endif
          @endforeach
        {{--</div>--}}
      </div>
      {{--<div class="row">--}}
        <h3 style="font-weight: bolder;">Checkin starts : </h3> <span>{{\Carbon\Carbon::parse($match->checkinstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('l jS F g:i A')}}</span>
      {{--</div>--}}
      {{--<div class="row">--}}
        <h3 style="font-weight: bolder;">Checkin ends : </h3> <span style=" color: red;">{{\Carbon\Carbon::parse($match->checkinend,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('l jS F g:i A')}}</span>
      {{--</div>--}}
      {{--<div class="row">--}}
        <h3 style="font-weight: bolder;">Match starts : </h3> <span style="font-weight: bolder;">{{\Carbon\Carbon::parse($match->matchstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('l jS F g:i A')}}</span>
      {{--</div>--}}
      {{--<div class="row">--}}
        <span style="display: block; margin-top: 20px;">Make sure to to checkin to your matches during the checkin window before the match. You can do that by either
          going you <a href="{{config('app.url','http://localhost:8000')}}/settings">settings page</a> or by visiting the <a href="{{config('app.url','http://localhost:8000')}}/tournaments/{{$team->tournament->id}}">tournament page</a> on DGL. You must be signed in.</span>

      <span style="font-weight: bold; display: block; margin-top: 20px;">Join our <a href="https://discord.gg/jsq68nE">Discord Channel</a> after you are done checking in for further instructions.</span>
      <span style="font-weight: bold; display: block; margin-top: 20px; font-style: italic">Check-in Early, Join Early.</span>
        <p style="font-weight: bold;">Happy, Gaming</p>
      {{--</div>--}}
      <br>
      <span style="font-size: 9px;">Please do not reply to this email. Any questions/comments should be sent to
        <a href="mailto:admin@dglcore.com" style="font-weight: bold;">admin@dglcore.com</a>
      </span>
      <hr>
    </div>
  </div>
</body>
{{--@endsection--}}