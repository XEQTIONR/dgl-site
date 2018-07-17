@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center banner-row">
    <div class="col-12 mx-0 px-0">
      <img src="{{URL::asset('storage/head-banner.png')}}"
           class="banner-row-background">
      <h1>Matches</h1>
      {{--<img src="{{URL::asset('storage/icons8-whistle-64.png')}}" class="banner-icon">--}}
    </div>
  </div>

  <div class="row justify-content-center bg-purple5 "> <!-- the content row -->
    <div class="col-10 col-xl-12 mw">
      <h3 class="font-gray my-5">FIXTURES</h3>
      <?php $i = 0 ?>
      @foreach($fixtures as $match)
      <!--A FIXTURE TABLE-->
        <?php $i++ ?>
        @if($match->newtable)
          @if($i>1)
            </div>
          @endif


          @if($match->hrdate == $today)
          <div class="fixture-table-primary row justify-content-center mb-5">
            <div class="col-12 pt-2 back-color-primary section-title">
              <span class="d-block mx-auto my-3 text-uppercase text-center font-white">
                TODAY
          @else
          <div class="fixture-table-purple row justify-content-center mb-5">
            <div class="col-12 pt-2 back-color-purple section-title">
              <span class="d-block mx-auto my-3 text-uppercase text-center font-white">
                <span class="font-lighter-gray mr-2">{{$match->hrdow}}</span> {{$match->hrdate}}
          @endif
              </span>
            </div>
        @endif
          <!-- A match -->
          <div class="match col-12 py-3 bg-purple4" style="">
            <div class="row justify-content-center d-flex d-sm-none">
              <a class="match-tournament-link" href="/tournaments/{{$match->tournament->id}}">
                {{$match->tournament->name}}
              </a>
            </div>
            <div class="row justify-content-center">
              <div class="col-3 justify-content-center align-items-center d-none d-sm-flex">
                <a class="match-tournament-link" href="/tournaments/{{$match->tournament->id}}">
                  {{$match->tournament->name}}
                </a>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <div class="col">


                    <img class="card-img-top sm-md-logo" src="{{$match->contestants[0]->contending_team->logo_size1}}" alt="Card image cap">
                    <h6 class="font-white text-center">{{$match->contestants[0]->contending_team->name}}</h6>
                  </div>
                  <div class="col">
                    <div class="d-flex justify-content-center align-items-center w-100 h-100 m-0">
                      <span class="font-red"><strong>vs</strong></span>
                    </div>
                  </div>
                  <div class="col">
                     <img class="card-img-top sm-md-logo" src="{{$match->contestants[1]->contending_team->logo_size1}}" alt="Card image cap">
                    <h6 class="font-white text-center">{{$match->contestants[1]->contending_team->name}}</h6>
                  </div>
                </div>
              </div>
              <div class="col-3 d-flex justify-content-center align-items-center">
                <span class="match-time">{{$match->hrstarttime}}</span>
              </div>
            </div>
          </div><!-- match end-->
        @endforeach
            </div> <!-- trailing last iteration div -->
      </div> <!-- content col-10 -->
    </div> <!-- content row-->


  <div class="row fixture-table-purple justify-content-center bg-purple5"> <!-- the content row -->
    <div class="col-10 col-xl-12 mw">
      <h3 class="font-gray my-5">RESULTS</h3>
  <?php $i = 0 ?>
  @foreach($results as $match)

    <?php $i++ ?>
    <!--A RESULT TABLE-->
    @if($match->newtable)
      @if($i>1)
        </div>
      @endif

    <div class="row fixture-table-purple justify-content-center mb-5">
      <div class="col-12 pt-2 back-color-purple section-title">
        <span class="d-block mx-auto my-3 text-uppercase text-center font-white">
          <span class="font-lighter-gray mr-2">{{$match->hrdow}}</span>
          {{$match->hrdate}}
        </span>
      </div>
    @endif
    <!-- A match -->



      <div class="match col-12 py-3 bg-purple4" style="">
        <div class="row justify-content-center d-flex d-sm-none">
          <a class="match-tournament-link" href="/tournaments/{{$match->tournament->id}}">
            {{$match->tournament->name}}
          </a>
        </div>
        <div class="row">

          <div class="col-3 justify-content-center align-items-center d-none d-sm-flex">
            <a class="match-tournament-link" href="/tournaments/{{$match->tournament->id}}">
              {{$match->tournament->name}}
            </a>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col">


                <img class="card-img-top sm-md-logo" src="{{$match->contestants[0]->contending_team->logo_size1}}" alt="Card image cap">
                <h6 class="font-white text-center">{{$match->contestants[0]->contending_team->name}}</h6>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center align-items-center w-100 h-100 m-0">
                  <span class="scoretag">{{$match->contestants[0]->score}}</span> <span class="scoretag-divider">-</span> <span class="scoretag">{{$match->contestants[1]->score}}</span>
                </div>
              </div>
              <div class="col">
                <img class="card-img-top sm-md-logo" src="{{$match->contestants[1]->contending_team->logo_size1}}" alt="Card image cap">
                <h6 class="font-white text-center">{{$match->contestants[1]->contending_team->name}}</h6>
              </div>
            </div>
          </div>
          <div class="col-3 justify-content-center align-items-center d-none d-sm-flex">
            <span class="match-time">{{$match->hrstarttime}}</span>
          </div>
        </div>
        <div class="row justify-content-center d-flex d-sm-none">
          <span class="match-time">{{$match->hrstarttime}}</span>
        </div>
      </div>
      {{--<div class="col-12 py-3 bg-purple3">--}}
      {{--<div class="row justify-content-center">--}}
        {{--<a style="text-decoration: none" href="/tournaments/{{$match->tournament->id}}"><h6 class="text-center small text-uppercase"><strong>{{$match->tournament->name}}</strong></h6></a>--}}
      {{--</div>--}}
      {{--<div class="row justify-content-center">--}}
        {{--<div class="col-sm-3 d-none d-sm-inline">--}}
          {{--<h5 class=" mt-4 text-right font-white">{{$match->contestants[0]->contending_team->name}}</h5>--}}
        {{--</div>--}}
        {{--<div class="col-4 col-sm-2 col-lg-1">--}}
          {{--<div class="row">--}}
            {{--<div class="card team-logo-300-trans">--}}
              {{--<img class="card-img-top sm-md-logo" src="{{$match->contestants[0]->contending_team->logo_size1}}" alt="Card image cap">--}}
            {{--</div>--}}
          {{--</div>--}}
          {{--<div class="row">--}}
            {{--<div class="card-body d-sm-none">--}}
              {{--<h5 class="card-title text-center font-white">{{$match->contestants[0]->contending_team->tag}}</h5>--}}
            {{--</div>--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-4 col-sm-2 pt-4 px-md-3 px-lg-4 px-xl-5">--}}
          {{--<span class="scoretag passive font-primary-color text-center py-2 px-0 d-block">{{$match->contestants[0]->score}} : {{$match->contestants[1]->score}}</span>--}}
        {{--</div>--}}
        {{--<div class="col-4 col-sm-2 col-lg-1">--}}
          {{--<div class="row">--}}
            {{--<div class="card team-logo-300-trans">--}}
              {{--<img class="card-img-top sm-md-logo" src="{{$match->contestants[1]->contending_team->logo_size1}}" alt="Card image cap">--}}
            {{--</div>--}}
          {{--</div>--}}
          {{--<div class="row">--}}
            {{--<div class="card-body d-sm-none">--}}
              {{--<h5 class="card-title text-center font-white">{{$match->contestants[1]->contending_team->tag}}</h5>--}}
            {{--</div>--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3 d-none d-sm-inline">--}}
          {{--<h5 class=" mt-4 text-left font-white">{{$match->contestants[1]->contending_team->name}}</h5>--}}
        {{--</div>--}}
      {{--</div>--}}
      {{--<div class="row justify-content-center">--}}
        {{--<h6 class="text-center text-uppercase">{{$match->hrstarttime}}</h6>--}}
      {{--</div>--}}
    {{--</div><!-- match end -->--}}
  @endforeach
  </div>

    </div></div>

  </div>
@endsection