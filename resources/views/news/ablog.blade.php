@extends('layouts.main')

@section('body-section')
  <div class="row justify-content-center mt-10">
    <img style="height: 500px; width: auto" src="{{$post->banner}}">
  </div>
  <div class="row justify-content-center mt-4">
  <div class="col-10">
  <div class="row">
    <h1>{{$post->title}}</h1>
  </div>
  <div class="row">
    <h2>{{$post->subtitle}}</h2>
  </div>
  <div class="row">
    {{$post->created_at}}
  </div>
  <div class="row">
    {!! $post->body !!}
  </div>

  <div class="row">

  </div>
  </div>
  </div>
@endsection