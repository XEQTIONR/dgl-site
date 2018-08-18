@extends('layouts.email')
@section('content')
  <div class="row" style="min-height: 600px">
    <div class="col">
      <div style="margin: 10px">
        <h2>Captain {{$alias}},</h2>
        <p>Your team,</p>
        <img src="{{config('app.url','http://localhost:8000')}}/{{$logo}}"
          style="display: block; margin-left: auto; margin-right: auto">
        <p>{{$teamName}}</p>
        <p>has been approved for tournament :</p>
        <p>{{$tournament}}</p>

        <p>Now its time to make sure you all your teammates join our Discord channel.
        All moderation and match refereeing is done through discord. This is mandatory for
        all players.</p>

        <p style="font-weight: bold">Our Discord Server</p>
        <a href="https://discord.gg/9rcvXmZ">https://discord.gg/9rcvXmZ</a>

        <p>Happy Gaming</p>
        <hr>
      </div>
    </div>
  </div>
@endsection