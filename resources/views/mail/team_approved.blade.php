@extends('layouts.email')
@section('content')
  <div class="row" style="min-height: 600px">
    <div class="col">
      <div style="margin: 10px">
        <h2>Captain {{$alias}},</h2>
        <p>Your team,</p>
        <p>{{$teamName}}</p>
        <p>has been approved for tournament :</p>
        <p>{{$tournament}}</p>

        <p>Now it's up to you to rally your team for matches.
        Visit DGLcore.com to keep up with fixtures.</p>
        <p>Happy Gaming</p>
        <hr>
      </div>
    </div>
  </div>
@endsection