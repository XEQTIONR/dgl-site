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
  <div class="row" style="
      display: flex;
      justify-content: center;
      min-height: 600px">
    <div class="col" style="padding: 0 20px; width: 500px;">
      <div style="margin: 10px">
        <h2>Hey {{$alias}}</h2>
        <p>You have been invited to participate in tournament </p>
        <h5>{{$tournament->name}}</h5>
        <p>for team</p>
        <h5> {{$team->name}} </h5>
        <p>Please go to the following link to confirm your registration. You are considered officially not on the roster until you have confirmed your spot.
          {{$team->name}} will be disqualified if all teammates have not signed up and confirmed by the time registration closes.</p>

        <a class="button" style="display: block;
        font-weight: bold;
    margin: 20px auto;
    width: 30%;
    min-width: 200px;
    text-align: center;
    padding: 6px 0px;
    background-color: #6677CC;
    text-decoration: none;
    color: white;" href="{{config('app.url','http://localhost:8000')}}/roster/{{$alias}}/{{$team->id}}">Join {{$team->name}}</a>

        <p>If you cannot see the button visit the following link </p>

        <a href="{{config('app.url','http://localhost:8000')}}/roster/{{$alias}}/{{$team->id}}">{{config('app.url','http://localhost:8000')}}/roster/{{$alias}}/{{$team->id}}</a>
        <p style="font-weight: bold;">Happy Gaming</p>
        <hr>
      </div>
    </div>
  </div>
</body>
{{--@endsection--}}