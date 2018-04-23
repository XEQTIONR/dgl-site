@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center back-color-darkgray"> <!-- jumbotron row -->
    <div class="col-12 mt-md-5 no-horizontal-padding">
      <div class="jumbotron-fluid background-matches">
        <div class="row my-5 pt-5 justify-content-start">
          <div class="col-12 col-md-7 offset-md-1 col-xl-6 offset-xl-1 mt-10">
            <h1 class="display-4 text-center text-md-left">Matches</h1>
          </div>
          <div class="col-2 offset-3 offset-sm-4 offset-md-0 mt-10">
            {{--<img src="{{URL::asset('storage/tournament-icon-white-96.png')}}" height="130">--}}
          </div>
          <hr class="my-4">
        </div>
        <div class="row">
          <div class="col offset-1">
            <h2 class="">Fixtures & Results</h2>
          </div>
        </div>
        <div class="row">
          <div class="col offset-1">
            <p class="lead mr-4">All the games from all the tournaments. And then some more.</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->

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
              <h6 class="text-center small text-uppercase">DA * League 2018</h6>
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
              <h6 class="text-center small text-uppercase">9:00 PM</h6>
            </div>
          </div><!-- match end-->
        @endforeach
            </div> <!-- trailing last iteration div -->
      </div> <!-- content col-10 -->
    </div> <!-- content row-->


  <div class="row justify-content-center"> <!-- the content row -->
    <div class="col-10">
  <h3 class="font-light-gray my-5">RESULTS</h3>

  <!--A FIXTURE TABLE-->
  <div class="fixture-table-purple row justify-content-center mb-5">
    <div class="col-12 pt-2 back-color-purple">
      <h5 class=" text-center font-white"><span class="font-light-gray mr-2">FRIDAY</span> APRIL 15TH </h5>
    </div>
    <!-- A match -->
    <div class="col-12 py-3" style="border-bottom: 1px solid #AAA;">
      <div class="row justify-content-center">
        <h6 class="text-center small text-uppercase">DA * League 2018</h6>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-3 d-none d-sm-inline">
          <h5 class=" mt-4 text-right">GLB Esports</h5>
        </div>
        <div class="col-4 col-sm-2 col-lg-1">
          <div class="row">
            <div class="card team-logo-300-trans">
              <img class="card-img-top sm-md-logo" src="{{URL::asset('storage/team-6.png')}}" alt="Card image cap">

            </div>
          </div>
          <div class="row">
            <div class="card-body d-sm-none">
              <h5 class="card-title font-purple text-center">GLB</h5>
            </div>
          </div>
        </div>
        <div class="col-2 col-lg-1 pt-4">
          <h6 class="font-purple text-center">1 : 3</h6>
        </div>

        <div class="col-4 col-sm-2 col-lg-1">
          <div class="row">
            <div class="card team-logo-300-trans">
              <img class="card-img-top sm-md-logo" src="{{URL::asset('storage/team-2.png')}}" alt="Card image cap">

            </div>
          </div>
          <div class="row">
            <div class="card-body d-sm-none">
              <h5 class="card-title font-purple text-center">RC</h5>
            </div>
          </div>
        </div>
        <div class="col-sm-3 d-none d-sm-inline">
          <h5 class=" mt-4 text-left">Rise Clan</h5>
        </div>
      </div>
    </div><!-- match end -->

    <!-- A match -->
    <div class="col-12 py-3">
      <div class="row justify-content-center">
        <h6 class="text-center small text-uppercase">DA * League 2018</h6>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-3 d-none d-sm-inline">
          <h5 class=" mt-4 text-right">Overtime Esports</h5>
        </div>
        <div class="col-4 col-sm-2 col-lg-1">
          <div class="row">
            <div class="card team-logo-300-trans">
              <img class="card-img-top sm-md-logo" src="{{URL::asset('storage/team-8.png')}}" alt="Card image cap">

            </div>
          </div>
          <div class="row">
            <div class="card-body d-sm-none">
              <h5 class="card-title font-purple text-center">OT</h5>
            </div>
          </div>
        </div>
        <div class="col-2 col-lg-1 pt-4">
          <h6 class="font-purple text-center">2 : 0</h6>
        </div>

        <div class="col-4 col-sm-2 col-lg-1">
          <div class="row">
            <div class="card team-logo-300-trans">
              <img class="card-img-top sm-md-logo" src="{{URL::asset('storage/team-6.png')}}" alt="Card image cap">

            </div>
          </div>
          <div class="row">
            <div class="card-body d-sm-none">
              <h5 class="card-title font-purple text-center">GLB</h5>
            </div>
          </div>
        </div>
        <div class="col-sm-3 d-none d-sm-inline">
          <h5 class=" mt-4 text-left">GLB Esports</h5>
        </div>
      </div>
    </div><!-- match end -->
  </div>

    </div></div>

  </div>
@endsection