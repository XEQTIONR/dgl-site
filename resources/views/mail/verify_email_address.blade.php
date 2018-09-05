{{--@extends('layouts.email')--}}
{{--@section('content')--}}
<body style="font-family: Helvetica, Sans-Serif">

<div class="row" style="
    display: flex;
    justify-content: center;">
  <div class="col" style="
    padding: 0 20px; max-width: 500px;">
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
<div class="row"
     style="width: 100%;
      display: flex;
      justify-content: center;
      min-height: 600px">
  <div class="col"
        style="width: 500px;">
    <div style="margin: 10px">
  <h2>Welcome to DGLcore.com</h2>
  <p>Click the following button to verify your email address : {{$emailAddress}}</p>
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

     href="{{config('app.url','http://localhost:8000')}}/verify/{{$verificationCode}}">Verify Email</a>

  <p>If you cannot see the button visit the following link </p>

  <a href="{{config('app.url','http://localhost:8000')}}/verify/{{$verificationCode}}">{{config('app.url','http://localhost:8000')}}/verify/{{$verificationCode}}</a>

  <p>This link only works once for verification. If your email address is unverified and you lose this email you can generate another one from DGL settings page</p>
  <a href="{{config('app.url', 'http://localhost:8000')}}/settings">{{config('app.url', 'http://localhost:8000')}}/settings</a>
  <p style="font-weight: bold;">Happy Gaming</p>
      <hr>
    </div>
  </div>
</div>
</body>
{{--@endsection--}}