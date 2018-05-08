@extends('layouts.main')
@section('body-section')

  <div class="row justify-content-center banner-row">
    <div class="col-12 mx-0 px-0">
      <img src="{{URL::asset('storage/Banner1.png')}}"
           class="banner-row-background">
      <h1>Media</h1>
      <img src="{{URL::asset('storage/icons8-tv-show-64.png')}}" class="banner-icon">
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <h1 class="font-light-gray">PHOTOS</h1>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <h2 class="font-purple">{{$album->name}}</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="row">

        @foreach($files as $file)
          <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
            <a href="/uploads/images/albums/{{$album->folder_slug}}/{{basename($file)}}">
              <div class="card team-logo-300-gray">
                <img class="card-img-top" src="/uploads/images/albums/{{$album->folder_slug}}/{{basename($file)}}" alt="Photo/Video {{$file}}">
              </div>
            </a>
          </div>
        @endforeach

      </div>
    </div>
  </div>
@endsection