@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center banner-row">
    <div class="col-12 mx-0 px-0">
      <img src="{{URL::asset('storage/commonbanner3.png')}}"
           class="banner-row-background">
      <h1>Tournaments</h1>
      {{--<img src="{{URL::asset('storage/icons8-trophy-64.png')}}" class="banner-icon">--}}
    </div>
  </div>
  <!-- if an active tournament currently -->
  @if(count($active_tournaments)>0)
  <div class="row pb-5 bg-purple5" style="z-index: 2;">
    <div class="col-12 mt-5 mw">
      <div class="row mt-5 mb-3 mx-md-5 justify-content-center">
        <div class="col-12 generic-section-title py-4 bg-purple3">
          <span class="font-primary-color font-primary">ACTIVE TOURNAMENTS</span>
        </div>
      </div>
      <!-- active tournaments rows -->
      @foreach($active_tournaments as $tournament)
      <div class="row mx-md-5 post-body py-5 bg-purple3">
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
            <h2 class="font-white">{{$tournament->name}}</h2>
            <div class="col-12 pl-0">
              <span class="font-gray">{!! $tournament->excerpt !!}</span>
            </div>
            </div>
            <img class="d-inline-block mr-4" width="48" src="{{$tournament->esport->icon}}">
            <div class="btn-dgl-contaianer btn-dgl-container-primary mt-2 mb-1 my-md-1">
              <a href="/tournaments/{{$tournament->link}}" class="btn btn-lg btn-dgl">Go to Tournament Page</a>
            </div>
          </div>
      </div><!-- active tournament rows -->
      @endforeach
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->
  @endif

  <div class="row pb-5 bg-purple5">
    <div class="col-12 mt-5 mw">
      <div class="row mb-3  mx-md-5 justify-content-center">
        <div class="col-12 generic-section-title py-4  bg-purple3">
          <span class="font-white font-primary">UPCOMING TOURNAMENTS</span>
        </div>
      </div>
      @foreach($tournaments as $tournament)
      @if( $tournament->upcoming )
      <!-- upcoming tournaments rows -->
      <div class="row mx-md-5 post-body py-5  bg-purple3">
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
            <h2 class="font-gray">{{$tournament->name}}</h2>
            <div class="col-12 pl-0">
            <p class="font-gray">{!! $tournament->excerpt !!}</p>
            </div>
          </div>
          <img class="d-inline-block mr-4" width="48" src="{{$tournament->esport->icon}}">
            <div class="btn-dgl-contaianer-purple mt-2 mb-1">
              <a href="/tournaments/{{$tournament->link}}" class="btn btn-lg btn-dgl">Go to Tournament Page</a>
            </div>
        </div>
      </div><!-- upcoming tournament rows -->
      @endif
      @endforeach
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->

  <div class="row pb-5 bg-purple5">
    <div class="col-12 mt-5 mw">
      <div class="row mb-3  mx-md-5 justify-content-center">
        <div class="col-12 generic-section-title py-4  bg-purple3">
          <span class="font-purple font-primary">PAST TOURNAMENTS</span>
        </div>
      </div>
      @foreach($tournaments as $tournament)
      @if( !$tournament->upcoming )
      <!-- past tournaments rows -->
        <div class="row mx-md-5 py-5 post-body   bg-purple3">
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
              <h2 class="font-gray">{{$tournament->name}}</h2>
              <div class="col-12 pl-0">
                <p class="font-gray">{!! $tournament->excerpt !!}</p>
              </div>
            </div>
            <img class="d-inline-block mr-4" width="48" src="{{$tournament->esport->icon}}">
            <div class="btn-dgl-contaianer-purple mt-2 mb-1">
              <a href="/tournaments/{{$tournament->link}}" class="btn btn-lg btn-dgl">Go to Tournament Page</a>
            </div>
          </div>
        </div><!-- past tournament rows -->
      @endif
      @endforeach
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->
@endsection