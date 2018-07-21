@extends('layouts.main')

@section('body-section')

  <div class="row mt-5 pt-5 justify-content-center bg-white">
    <h1 class="text-center">Almost Done</h1>

  </div>
  <div class="row bg-white justify-content-center">
    <h4 class="text-center">Set up your Discord ID with DGL. You must provide this if you are registering in a tournament.</h4>
  </div>
  <div class="row bg-white py-5">
      <a href="/discord-oauth" class="d-block mx-auto btn btn-lg py-2 pl-3 pr-4" style="background-color: #7289DA; color: #FFF;">
        <img src="{{URL::asset('storage/Discord-Logo-White.svg')}}" width="50">
        Setup Discord</a>
  </div>

@endsection