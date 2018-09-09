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
    <div class="col" style="padding: 0 20px; max-width: 500px;">
      <div style="margin: 10px">
        <h2>Captain {{$alias}},</h2>
        <p style="font-weight: bold;">Your team,</p>
        <img src="{{config('app.url','http://localhost:8000')}}{{$logo}}"
             style="display: block; margin : 10px auto;" width="100" height="100">
        <p  style="font-weight: bold;">{{$teamName}}</p>
        <p>has been approved for tournament :</p>
        <p style="font-weight: bold;">{{$tournament}}</p>

        <p>Now its time to make sure you all your teammates join our Discord channel.
        All moderation and match refereeing is done through discord. This is mandatory for
        all players.</p>

        <p style="font-weight: bold">Our Discord Server</p>
        <a href="https://discord.gg/jsq68nE">https://discord.gg/jsq68nE</a>

        <p style="font-weight: bold">Happy Gaming</p>
        <hr>
      </div>
    </div>
  </div>
</body>
{{--@endsection--}}