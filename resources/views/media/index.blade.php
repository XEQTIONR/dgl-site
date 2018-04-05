@extends('layouts.main')
@section('body-section')

  <div class="row justify-content-center back-color-darkgray"> <!-- jumbotron row -->
    <div class="col-12 mt-md-5 no-horizontal-padding">
      <div class="jumbotron-fluid background-matches">
        <div class="row my-5 pt-5 justify-content-start">
          <div class="col-12 col-md-7 offset-md-1 col-xl-6 offset-xl-1 mt-10">
            <h1 class="display-4 text-center text-md-left">Media</h1>
          </div>
          <div class="col-2 offset-3 offset-sm-4 offset-md-0 mt-10">
            {{--<img src="{{URL::asset('storage/tournament-icon-white-96.png')}}" height="130">--}}
          </div>
          <hr class="my-4">
        </div>
        <div class="row">
          <div class="col offset-1">
            <h2 class="">Photos & Videos</h2>
          </div>
        </div>
        <div class="row">
          <div class="col offset-1">
            <p class="lead mr-4">Photos and Videos from DGL</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->

  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <h1 class="">PHOTOS</h1>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <h2 class="">ALBUMS</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="row">

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <div class="card team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/overwatch-2.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">Overtime Esports</h5>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <div class="card team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/dota-1.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">Rise Clan</h5>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <div class="card team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/bh.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">Vaevictis Esports</h5>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3  my-3">
          <div class="card team-logo-300-gray">
            <img class="card-img-top" src="{{URL::asset('storage/dd.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title text-center font-purple">Lyon Gaming</h5>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <h1 class="">VIDEOS</h1>
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