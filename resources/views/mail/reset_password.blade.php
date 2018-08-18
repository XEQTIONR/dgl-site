@extends('layouts.email')
@section('content')
  <div class="row" style="min-height: 600px">
    <div class="col">
      <div style="margin: 10px">
        <h2>DGLcore.com Password reset request</h2>
        <p>Click the button below to reset your password</p>
        <a class="button" href="{{config('app.url','http://localhost:8000')}}/{{$link}}">Reset Password</a>

        <p>If you cannot see the button visit the following link </p>

        <a href="{{config('app.url','http://localhost:8000')}}/{{$link}}">{{config('app.url','http://localhost:8000')}}/{{$link}}</a>
        <p>Happy Gaming</p>
        <hr>
      </div>
    </div>
  </div>
@endsection