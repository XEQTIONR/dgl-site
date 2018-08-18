@extends('layouts.email')
@section('content')
<div class="row" style="min-height: 600px">
  <div class="col">
    <div style="margin: 10px">
  <h2>Welcome to DGLcore.com</h2>
  <p>Click the following button to verify your email address : {{$emailAddress}}</p>
  <a class="button" href="{{config('app.url','http://localhost:8000')}}/verify/{{$verificationCode}}">Verify Email</a>

  <p>If you cannot see the button visit the following link </p>

  <a href="{{config('app.url','http://localhost:8000')}}/verify/{{$verificationCode}}">{{config('app.url','http://localhost:8000')}}/verify/{{$verificationCode}}</a>

  <p>This link only works once for verification. If your email address is unverified and you lose this email you can generate another one from DGL settinngs page</p>
  <a href="{{config('app.url', 'http://localhost:8000')}}/settings">{{config('app.url', 'http://localhost:8000')}}/settings</a>
  <p>Happy Gaming</p>
      <hr>
    </div>
  </div>
</div>
@endsection