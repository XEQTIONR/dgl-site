@extends('layouts.main')

@section('body-section')
  <div class="row justify-content-center" style=" margin-top: 60px; height: 500px; background-repeat: no-repeat; background-position: center; background-image:url('{{$post->banner}}')">
    {{--<img class="img-fluid" src="{{$post->banner}}">--}}
  </div>
  <div class="row justify-content-center bg-white mt-4 mw">
  <div class="col-10 my-5">
  <div class="row">
    <h1>{{$post->title}}</h1>
  </div>
  <div class="row">
    <h2>{{$post->subtitle}}</h2>
  </div>
  <div class="row">
    <div class="mt-1 mb-3 pr-4">
      <i class="fas fa-calendar-alt font-gray"></i>
      <span class="ml-1 font-gray">
                  {{--{{ $post->created_at->format('j F Y') }}--}}
                  {{--{{ $post->created_at }}--}}
                  {{\Carbon\Carbon::parse($post->created_at,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('j F Y')}}
                  </span>
    </div>
  </div>
  <div class="row">
    <span class="light">
      {!! $post->body !!}
    </span>
  </div>

  <div class="row">

  </div>
  </div>
  </div>
@endsection