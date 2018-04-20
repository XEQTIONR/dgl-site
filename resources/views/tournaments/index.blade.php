@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center back-color-darkgray"> <!-- jumbotron row -->
    <div class="col-12 mt-md-5 no-horizontal-padding">
      <div class="jumbotron-fluid background-tournament">
        <div class="row my-5 pt-5 justify-content-start">
          <div class="col-12 col-md-7 offset-md-1 col-xl-6 offset-xl-1 mt-10">
            <h1 class="display-4 text-center text-md-left">Tournaments</h1>
          </div>
          <div class="col-2 offset-3 offset-sm-4 offset-md-0 mt-10">
            {{--<img src="{{URL::asset('storage/tournament-icon-white-96.png')}}" height="130">--}}
          </div>
          <hr class="my-4">
        </div>
        <div class="row">
          <div class="col offset-1">
            <h2 class="">Guts, Glory, Game</h2>
          </div>
        </div>
        <div class="row">
          <div class="col offset-1">
            <p class="lead mr-4">Information hub for DGL Tournaments past and present.</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->

  <!-- if an active tournament currently -->
  <div class="row pb-5 border-bottom back-color-purple" style="z-index: 2;">
    <div class="col-12">
      <div class="row my-5  justify-content-center">
        <div class="col-10 pl-0">
          <h1 class="font-primary-color">ACTIVE TOURNAMENTS</h1>
        </div>
      </div>
      <!-- active tournaments rows -->
      @foreach($active_tournaments as $tournament)
      <div class="row mb-5">
        <div class="col-12 col-md-3 offset-md-1">
          <div class="thumbnail thumbnail-rect d-none d-lg-inline-block">
            <img class="mt-3" src="{{URL::asset('storage/dota-1.png')}}">
          </div>
          <div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">
            <img class="mt-3" src="{{URL::asset('storage/dota-1.png')}}">
          </div>
          <div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">
            <img class="mt-3" src="{{URL::asset('dota-1.png')}}">
          </div>
        </div>
        <div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">
          <div class="row">
            <h1 class="font-white">{{$tournament->name}}</h1>
            <p class="">{{$tournament->excerpt}}</p>
          </div>
            <img class="d-inline-block mr-4" width="48" src="{{URL::asset('storage/icons8-dota-2-96.png')}}">
            <div class="btn-dgl-contaianer btn-dgl-container-primary">
              <a href="/tournaments/{{$tournament->id}}" class="btn btn-lg btn-dgl">Go to Tournament Page</a>
            </div>
          </div>
      </div><!-- active tournament rows -->
      @endforeach
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->


  <div class="row pb-5 border-bottom  back-color-lightergray">
    <div class="col-12">
      <div class="row my-5  justify-content-center">
        <div class="col-10 pl-0">
          <h1 class="font-purple">UPCOMING TOURNAMENTS</h1>
        </div>
      </div>
      @foreach($tournaments as $tournament)
      @if( $tournament->upcoming )
      <!-- upcoming tournaments rows -->
      <div class="row mb-5">
        <div class="col-12 col-md-3 offset-md-1">
          <div class="thumbnail thumbnail-rect d-none d-lg-inline-block">
            <img class="mt-3" src="{{URL::asset('storage/overwatch-2.jpg')}}">
          </div>
          <div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">
            <img class="mt-3" src="{{URL::asset('storage/overwatch-2.jpg')}}">
          </div>
          <div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">
            <img class="mt-3" src="{{URL::asset('storage/overwatch-2.jpg')}}">
          </div>
        </div>
        <div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">
          <div class="row">
            <h1 class="font-gray">{{$tournament->name}}</h1>
            <p class="font-gray">{{$tournament->excerpt}}</p>
          </div>
          <img class="d-inline-block mr-4" width="48" src="{{URL::asset('storage/icons8-overwatch-96.png')}}">
            <div class="btn-dgl-contaianer-purple">
              <a href="/tournaments/{{$tournament->id}}" class="btn btn-lg btn-dgl">Go to Tournament Page</a>
            </div>
        </div>
      </div><!-- upcoming tournament rows -->
      @endif
      @endforeach
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->

  <div class="row pb-5 border-bottom back-color-lightgray">
    <div class="col-12">
      <div class="row my-5  justify-content-center">
        <div class="col-10 pl-0">
          <h1 class="font-lighter-gray">PAST TOURNAMENTS</h1>
        </div>
      </div>
      @foreach($tournaments as $tournament)
      @if( !$tournament->upcoming )
      <!-- past tournaments rows -->
      <div class="row mb-5">
        <div class="col-12 col-md-3 offset-md-1">
          <div class="thumbnail thumbnail-rect d-none d-lg-inline-block">
            <img class="mt-3" src="{{URL::asset('storage/overwatch-3.jpg')}}">
          </div>
          <div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">
            <img class="mt-3" src="{{URL::asset('storage/overwatch-3.jpg')}}">
          </div>
          <div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">
            <img class="mt-3" src="{{URL::asset('storage/overwatch-3.jpg')}}">
          </div>
        </div>
        <div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">
          <div class="row">
            <h1 class="font-gray">{{$tournament->name}}</h1>
            <p class="font-gray">{{$tournament->excerpt}}</p>
          </div>
          <img class="d-inline-block mr-4" width="48" src="{{URL::asset('storage/icons8-dota-2-96.png')}}">
            <div class="btn-dgl-contaianer-purple">
              <a href="/tournaments/{{$tournament->id}}" class="btn btn-lg btn-dgl">Go to Tournament Page</a>
            </div>
        </div>
      </div><!-- past tournament rows -->
      @endif
      @endforeach
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->
@endsection