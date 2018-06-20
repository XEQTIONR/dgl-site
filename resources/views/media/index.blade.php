@extends('layouts.main')
@section('body-section')

  <div class="row justify-content-center banner-row">
    <div class="col-12 mx-0 px-0">
      <img src="{{URL::asset('storage/head-banner.png')}}"
           class="banner-row-background">
      <h1>Media</h1>
      <img src="{{URL::asset('storage/icons8-tv-show-64.png')}}" class="banner-icon">
    </div>
  </div>

  <div class="row justify-content-center" id="photos">
    <div class="col-10 mt-5">
      <h1 class="font-light-gray">PHOTOS</h1>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <h2 class="font-purple">ALBUMS</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="row">

        @foreach($albums as $album)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <a href="/album/{{$album->id}}">
            <div class="card team-logo-300-gray">
              <img class="card-img-top" src="/uploads/images/albums/cover_images/{{$album->cover_image}}" alt="{{$album->name}} Album">
              <div class="card-body bg-lightestgray">
                <h5 class="card-title text-center font-purple">{{$album->name}}</h5>
              </div>
            </div>
          </a>
        </div>
        @endforeach

      </div>
    </div>
  </div>
  <div class="row justify-content-center" id="videos">
    <div class="col-10 mt-5">
      <h1 class="font-light-gray">VIDEOS</h1>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10">

      <div class="row justify-content-center">
        {{--//TODO: populate videos--}}
        @if(0)
        @foreach($videos as $video)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <a href="/google" class="video-thumbnail-link">
          <div class="row">
            <div class="video-thumbnail">

                <img src="{{URL::asset('storage/overwatch-2.jpg')}}" alt="Avatar" >
                <div class="middle">
                  <div class="icon-container">
                    <i class="fas fa-play-circle"></i>
                  </div>
                </div>

            </div>
          </div>
          <div class="row mt-2">
            <h5 class="pl-5">Title of the video</h5>
          </div>
          </a>
        </div>
        @endforeach
        @else
          <h4 class="text-center my-5"> No videos yet. They appear here as they are posted.</h4>
        @endif
      </div>
    </div>
  </div>

@endsection