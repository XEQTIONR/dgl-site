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
      <h2 class="font-purple">ALBUMS</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="row">

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <div class="card team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/overwatch-2.jpg')}}" alt="Card image cap">
            <div class="card-body back-color-lightergray">
              <h5 class="card-title text-center font-purple">Overtime Esports</h5>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <div class="card team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/dota-1.png')}}" alt="Card image cap">
            <div class="card-body back-color-lightergray">
              <h5 class="card-title text-center font-purple">Rise Clan</h5>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <div class="card team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/bh.jpg')}}" alt="Card image cap">
            <div class="card-body back-color-lightergray">
              <h5 class="card-title text-center font-purple">Vaevictis Esports</h5>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <div class="card team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/dd.jpg')}}" alt="Card image cap">
            <div class="card-body back-color-lightergray">
              <h5 class="card-title text-center font-purple">Lyon Gaming</h5>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <h1 class="font-light-gray">VIDEOS</h1>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="row">

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

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <a class="video-thumbnail-link" href="/google">
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

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <a class="video-thumbnail-link" href="/google">
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

      </div>
    </div>
  </div>

@endsection