{{--@extends('layouts.email')--}}
{{--@section('content')--}}
<body style="font-family: Helvetica, Sans-Serif">
<div class="row" style="width: 100%;
    display: flex;
    justify-content: center;">
  <div class="col" style="width: 500px">
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
  <div class="row" style="width: 100%;
    display: flex;
    justify-content: center;">
    <div class="col" style="width: 500px">
      <div style="margin: 10px">
        <h2>DGLcore.com Password reset request</h2>
        <p>Click the button below to reset your password</p>
        <a class="button"
           style="display: block;
    margin: 20px auto;
    width: 30%;
    min-width: 200px;
    text-align: center;
    padding: 6px 0px;
    background-color: #6677CC;
    text-decoration: none;
    color: white;
    font-weight: bold"
           href="{{config('app.url','http://localhost:8000')}}/{{$link}}">Reset Password</a>

        <p>If you cannot see the button visit the following link </p>

        <a href="{{config('app.url','http://localhost:8000')}}/{{$link}}">{{config('app.url','http://localhost:8000')}}/{{$link}}</a>
        <p style="font-weight: bold;">Happy Gaming</p>
        <hr>
      </div>
    </div>
  </div>
</body>
{{--@endsection--}}