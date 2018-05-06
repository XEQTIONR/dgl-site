@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center banner-row">
    <div class="col-12 mx-0 px-0">
      <img src="{{URL::asset('storage/Banner1.png')}}"
           class="banner-row-background">
      <h1>Matches</h1>
      <img src="{{URL::asset('storage/icons8-whistle-64.png')}}" class="banner-icon">
    </div>
  </div>

  <div class="row justify-content-center"> <!-- the content row -->
    <div class="col-10">
      <h3 class="font-purple my-5">FIXTURES</h3>
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
            <div class="col-12 pt-2 back-color-primary">
              <h5 class="text-uppercase text-center font-white">
                TODAY
          @else
          <div class="fixture-table-purple row justify-content-center mb-5">
            <div class="col-12 pt-2 back-color-purple">
              <h5 class="text-uppercase text-center font-white">
                <span class="font-light-gray mr-2">{{$match->hrdow}}</span> {{$match->hrdate}}
          @endif
              </h5>
            </div>
        @endif
          <!-- A match -->
          <div class="col-12 py-3" style="border-bottom: 1px solid #AAA;">
            <div class="row justify-content-center">
              <h6 class="text-center small text-uppercase">{{$match->tournament->name}}</h6>
            </div>
            <div class="row justify-content-center">
              <div class="col-sm-3 d-none d-sm-inline">
                <h5 class=" mt-4 text-right">{{$match->contestants[0]->contending_team->name}}</h5>
              </div>
              <div class="col-4 col-sm-2 col-lg-1">
                <div class="row">
                <div class="card team-logo-300-trans">
                  <img class="card-img-top sm-md-logo" src="{{URL::asset('storage/team-8.png')}}" alt="Card image cap">

                </div>
                </div>
                <div class="row">
                  <div class="card-body d-sm-none">
                    <h5 class="card-title font-purple text-center">{{$match->contestants[0]->contending_team->tag}}</h5>
                  </div>
                </div>
              </div>

              <div class="col-2 col-lg-1 pt-4">
                <h6 class="font-primary-color text-center">VS</h6>
              </div>

              <div class="col-4 col-sm-2 col-lg-1">
                <div class="row">
                <div class="card team-logo-300-trans">
                  <img class="card-img-top sm-md-logo" src="{{URL::asset('storage/team-2.png')}}" alt="Card image cap">
                </div>
                </div>
                <div class="row">
                  <div class="card-body d-sm-none">
                    <h5 class="card-title font-purple text-center">{{$match->contestants[1]->contending_team->tag}}</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 d-none d-sm-inline">
                <h5 class=" mt-4 text-left">{{$match->contestants[1]->contending_team->name}}</h5>
              </div>
            </div>
            <div class="row justify-content-center">
              <h6 class="text-center small text-uppercase">{{$match->hrstarttime}}</h6>
            </div>
          </div><!-- match end-->
        @endforeach
            </div> <!-- trailing last iteration div -->
      </div> <!-- content col-10 -->
    </div> <!-- content row-->


  <div class="row justify-content-center"> <!-- the content row -->
    <div class="col-10">
      <h3 class="font-light-gray my-5">RESULTS</h3>
  <?php $i = 0 ?>
  @foreach($results as $match)

    <?php $i++ ?>
    <!--A RESULT TABLE-->
    @if($match->newtable)
      @if($i>1)
        </div>
      @endif

    <div class="fixture-table-purple row justify-content-center mb-5">
      <div class="col-12 pt-2 back-color-purple">
        <h5 class="text-uppercase text-center font-white">
          <span class="font-light-gray mr-2">{{$match->hrdow}}</span>
          {{$match->hrdate}}
        </h5>
      </div>
    @endif
    <!-- A match -->
    <div class="col-12 py-3" style="border-bottom: 1px solid #AAA;">
      <div class="row justify-content-center">
        <h6 class="text-center small text-uppercase">{{$match->tournament->name}}</h6>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-3 d-none d-sm-inline">
          <h5 class=" mt-4 text-right">{{$match->contestants[0]->contending_team->name}}</h5>
        </div>
        <div class="col-4 col-sm-2 col-lg-1">
          <div class="row">
            <div class="card team-logo-300-trans">
              <img class="card-img-top sm-md-logo" src="{{URL::asset('storage/team-6.png')}}" alt="Card image cap">
            </div>
          </div>
          <div class="row">
            <div class="card-body d-sm-none">
              <h5 class="card-title font-purple text-center">{{$match->contestants[0]->contending_team->tag}}</h5>
            </div>
          </div>
        </div>
        <div class="col-2 col-lg-1 pt-4">
          <h6 class="font-purple text-center">{{$match->contestants[0]->score}} : {{$match->contestants[1]->score}}</h6>
        </div>
        <div class="col-4 col-sm-2 col-lg-1">
          <div class="row">
            <div class="card team-logo-300-trans">
              <img class="card-img-top sm-md-logo" src="{{URL::asset('storage/team-2.png')}}" alt="Card image cap">
            </div>
          </div>
          <div class="row">
            <div class="card-body d-sm-none">
              <h5 class="card-title font-purple text-center">{{$match->contestants[1]->contending_team->tag}}</h5>
            </div>
          </div>
        </div>
        <div class="col-sm-3 d-none d-sm-inline">
          <h5 class=" mt-4 text-left">{{$match->contestants[1]->contending_team->name}}</h5>
        </div>
      </div>
      <div class="row justify-content-center">
        <h6 class="text-center small text-uppercase">{{$match->hrstarttime}}</h6>
      </div>
    </div><!-- match end -->
  @endforeach
  </div>

    </div></div>

  </div>
@endsection