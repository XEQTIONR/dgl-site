@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center banner-row">
    <div class="col-12 mx-0 px-0">
      <img src="{{URL::asset('storage/Banner1.png')}}"
           class="banner-row-background">
      <h1>Tournaments</h1>
      <img src="{{URL::asset('storage/icons8-trophy-64.png')}}" class="banner-icon">
    </div>
  </div>
  <!-- if an active tournament currently -->
  @if(count($active_tournaments)>0)
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
            <img class="mt-3" src="{{$tournament->banner}}">
          </div>
          <div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">
            <img class="mt-3" src="{{$tournament->banner}}">
          </div>
          <div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">
            <img class="mt-3" src="{{$tournament->banner}}">
          </div>
        </div>
        <div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">
          <div class="row">
            <h1 class="font-white">{{$tournament->name}}</h1>
            <span class="font-white">{!! $tournament->excerpt !!}</span>
          </div>
            <img class="d-inline-block mr-4" width="48" src="{{URL::asset('storage/icons8-dota-2-96.png')}}">
            <div class="btn-dgl-contaianer btn-dgl-container-primary mt-2 mb-1 my-md-1">
              <a href="/tournaments/{{$tournament->id}}" class="btn btn-lg btn-dgl">Go to Tournament Page</a>
            </div>
          </div>
      </div><!-- active tournament rows -->
      @endforeach
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->
  @endif

  <div class="row pb-5 border-bottom">
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
            <img class="mt-3" src="{{$tournament->banner}}">
          </div>
          <div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">
            <img class="mt-3" src="{{$tournament->banner}}">
          </div>
          <div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">
            <img class="mt-3" src="{{$tournament->banner}}">
          </div>
        </div>
        <div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">
          <div class="row">
            <h1 class="font-gray">{{$tournament->name}}</h1>
            <p class="font-gray">{!! $tournament->excerpt !!}</p>
          </div>
          <img class="d-inline-block mr-4" width="48" src="{{URL::asset('storage/icons8-overwatch-96.png')}}">
            <div class="btn-dgl-contaianer-purple mt-2 mb-1">
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
            <img class="mt-3" src="{{$tournament->banner}}">
          </div>
          <div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">
            <img class="mt-3" src="{{$tournament->banner}}">
          </div>
          <div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">
            <img class="mt-3" src="{{$tournament->banner}}">
          </div>
        </div>
        <div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">
          <div class="row">
            <h1 class="font-gray">{{$tournament->name}}</h1>
            <span class="font-gray">{!! $tournament->excerpt !!}</span>
          </div>
          <img class="d-inline-block mr-4" width="48" src="{{URL::asset('storage/icons8-dota-2-96.png')}}">
            <div class="btn-dgl-contaianer-purple mt-2 mb-1">
              <a href="/tournaments/{{$tournament->id}}" class="btn btn-lg btn-dgl">Go to Tournament Page</a>
            </div>
        </div>
      </div><!-- past tournament rows -->
      @endif
      @endforeach
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->
@endsection