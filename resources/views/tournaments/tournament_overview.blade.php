<div class="row tournament-row tournament-row-overview">
  <div class="col-12">
    <h1 class="font-white py-3">Overview</h1>
  </div>
  <div class="col-12">
    <div class="p-3">
      <h5 class="font-red">Event : <span class="font-white">{{$tournament->name}}</span></h5>
      <h5 class="font-red">Schedule :
        <span class="font-white">{{$tournament->local_start_string}}</span>
        <span class="font-gray">to</span>
        <span class="font-white">{{$tournament->local_end_string}}</span>
      </h5>
    <h5 class="font-red">Registration Start :
      <span class="font-white">{{$tournament->local_reg_start}}</span>
    </h5>
    <h5 class="font-red">Registration End :
      <span class="font-white">{{$tournament->local_reg_end}}</span>
    </h5>
    <h5 class="font-red">Requirements : </h5>
      <div class="w-100">
        <div class="row">
          <div class="col">
            <img class="mx-2" src="{{URL::asset('storage/Crown.png')}}" height="48px"
                 data-toggle="tooltip" title="Must be registered on DGL with email address verified.">
            <img class="mx-2" src="{{$tournament->esport->icon}}" width="48" height="48"
                 data-toggle="tooltip" title="Must own an official copy of {{$tournament->esport->name}}">
            <img class="mx-2" src="{{$tournament->esport->platform->icon}}" width="48" height="48"
                 data-toggle="tooltip" title="Must have a valid {{$tournament->esport->platform->name}} account registered on DGL.">
            <img class="mx-2" src="{{URL::asset('storage/Discord-Logo-Color.svg')}}" width="48" height="48"
                 style="background: url({{URL::asset('storage/white-background.jpg')}}); background-repeat: no-repeat; background-position: center; background-size: 24px 22px"
                 data-toggle="tooltip" title="Must have a valid Discord ID registered on DGL">
            <img class="mx-2" src="{{URL::asset('storage/icons8-checkmark-64.png')}}" width="48" height="48"
                 data-toggle="tooltip" title="Team must be approved by DGL admin.">
            <img class="ml-2" src="{{URL::asset('storage/icons8-conference-64.png')}}" height="48"
                 data-toggle="tooltip"
                 title="
                 @if($tournament->squadsize> $tournament->esport->teamsize)
                   Must have a team of {{$tournament->esport->teamsize}} - {{$tournament->squadsize}} gamers registered on DGL.
                 @else
                   Must have a team of {{$tournament->squadsize}} gamers registered on DGL.
                 @endif
                 "
            >
            <span class="font-white mr-1">x</span>
            <span class="font-red">
              @if($tournament->squadsize> $tournament->esport->teamsize)
                {{$tournament->esport->teamsize}} - {{$tournament->squadsize}}
              @else
                {{$tournament->squadsize}}
              @endif
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 mb-3">
    <div class="p-3">
      <span>{!! $tournament->overview !!}</span>
    </div>
  </div>
  @if($tournament->bracket)
  <div class="col-12 mt-3 mb-5">
    <h2 class="text-uppercase font-white">Brackets</h2>
    <iframe src="{{$tournament->bracket}}" width="100%" height="500" frameborder="0" scrolling="auto" allowtransparency="true"></iframe>
  </div>
  @endif
  @if(count($checkingin) || count($waiting) || count($future) || count($past))
  <div class="col-12 tournament-overview-container">

    <h2 class="text-uppercase font-white">Upcoming matches</h2>

    <ul id="checkingInAccordion" class="list-group list-group-tournament-match my-3">
    @foreach($checkingin as $match)
    <li class="list-group-item upcoming">
      <div class="row"><!-- a checking in match-->
        <div class="col-4">
          <div class="row justify-content-end">
            <span>
              <span class="d-none d-md-inline">{{$match->contestants[0]->contending_team->name}}</span>
              <span class="d-inline d-md-none">{{$match->contestants[0]->contending_team->tag}}</span>
              <img class="align-center" src="{{$match->contestants[0]->contending_team->logo_size2}}">
            </span>
          </div>

          @if(Auth::check())
            @foreach($match->contestants[0]->contending_team->roster as $roster)
              @if($roster->gamer_id==Auth::id())
                <?php $needcheckin = true; ?>
                @foreach($match->checkins as $checkin)
                  @if($checkin->roster_id == $roster->id)
                    <?php $needcheckin = false; ?>
                  @endif
                @endforeach

                @if($needcheckin)
                  <div class="row justify-content-end">
                    <a href="/checkin/{{$roster->id}}/{{$match->id}}" class=" my-3 mr-2 btn btn-success btn-sm">
                      <i class="fas fa-check"></i>
                      CHECKIN
                    </a>
                  </div>
                @endif
              @endif
            @endforeach
          @endif
        </div>
        <div class="col-2">
          <div class="row justify-content-center mt-3">
            vs
          </div>
          <div class="row justify-content-center mt-3">
            {{\Carbon\Carbon::parse($match->matchstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('g:i A')}}
          </div>
          <div class="row justify-content-center">
            <span class="text-center text-uppercase mt-1" style="font-size: 12px">teams checking in</span>
          </div>
        </div>
        <div class="col-4">
          <div class="row justify-content-start">
            <span>
              <img class="align-center" src="{{$match->contestants[1]->contending_team->logo_size2}}">
              <span class="d-inline d-md-none">{{$match->contestants[1]->contending_team->tag}}</span>
              <span class="d-none d-md-inline">{{$match->contestants[1]->contending_team->name}}</span>
            </span>
          </div>

          @if(Auth::check())
            @foreach($match->contestants[1]->contending_team->roster as $roster)
              @if($roster->gamer_id==Auth::id())
                <?php $needcheckin = true; ?>
                @foreach($match->checkins as $checkin)
                  @if($checkin->roster_id == $roster->id)
                    <?php $needcheckin = false; ?>
                  @endif
                @endforeach

                @if($needcheckin)
                  <div class="row justify-content-start">
                    <a href="/checkin/{{$roster->id}}/{{$match->id}}" class="my-3 ml-2 btn btn-success btn-sm">
                      <i class="fas fa-check"></i>
                      CHECKIN
                    </a>
                  </div>
                @endif
              @endif
            @endforeach
          @endif
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
          <button data-state="B" type="button"  data-toggle="collapse" data-target="#{{$match->id}}"
                  class="btn btn-outline-success btn-sm d-block m-auto btn-collapse" >
            <i class="fas fa-chevron-down d-inline"></i>
            <i class="fas fa-chevron-up d-none"></i>

          </button>
        </div>
        <div class="row w-100  mt-3 mx-auto bg-purple4">
        <div class="col-10 mt-3 collapse" id="{{$match->id}}" data-parent="#checkingInAccordion">
          <div class="row justify-content-center">
            <h6 class="text-center">ROSTER</h6>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="row justify-content-start">
                @foreach($match->checkins as $checkin)
                  @foreach($match->contestants[0]->contending_team->roster as $roster)
                    @if($roster->id==$checkin->roster_id)
                      <div class="col-12">
                        <h6 class="text-center">{{$roster->gamer->alias}}</h6>
                        {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                        {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                      </div>
                    @endif
                  @endforeach
                @endforeach
              </div>
            </div>
            <div class="col-6">
              <div class="row justify-content-end">
                @foreach($match->checkins as $checkin)
                  @foreach($match->contestants[1]->contending_team->roster as $roster)
                    @if($roster->id==$checkin->roster_id)
                      <div class="col-12">
                        <h6 class="text-center">{{$roster->gamer->alias}}</h6>
                        {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                        {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                      </div>
                    @endif
                  @endforeach
                @endforeach
              </div>
            </div>
          </div>
        </div>
        </div>
      </div><!-- a checking in match end-->
    </li>
    @endforeach


    @foreach($waiting as $match)
        <li class="list-group-item waiting">
          <div class="row"><!-- a waiting match-->
            <div class="col-4">
              <div class="row justify-content-end">
            <span>

              <span class="d-none d-md-inline">{{$match->contestants[0]->contending_team->name}}</span>
              <span class="d-inline d-md-none">{{$match->contestants[0]->contending_team->tag}}</span>
              <img class="align-center" src="{{$match->contestants[0]->contending_team->logo_size2}}">
            </span>
              </div>
            </div>
            <div class="col-2">
              <div class="row justify-content-center mt-3">
                vs
              </div>
              <div class="row justify-content-center mt-3">
                {{\Carbon\Carbon::parse($match->matchstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('g:i A')}}
              </div>
              <div class="row justify-content-center">
                <span class="text-center text-uppercase mt-1" style="font-size: 12px">waiting to start</span>
              </div>
            </div>
            <div class="col-4">
              <div class="row justify-content-start">
            <span>
              <img class="align-center" src="{{$match->contestants[1]->contending_team->logo_size2}}">
              <span class="d-inline d-md-none">{{$match->contestants[1]->contending_team->tag}}</span>
              <span class="d-none d-md-inline">{{$match->contestants[1]->contending_team->name}}</span>

            </span>
              </div>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
              <button data-state="W" type="button"  data-toggle="collapse" data-target="#{{$match->id}}"
                      class="btn btn-success btn-sm d-block m-auto btn-collapse" >
                <i class="fas fa-chevron-down d-inline"></i>
                <i class="fas fa-chevron-up d-none"></i>

              </button>
            </div>
            <div class="row w-100 mx-auto mt-3 p-3 collapse bg-purple4" id="{{$match->id}}" data-parent="#checkInAccordion">
              <div class="col-10 ">
                <div class="row justify-content-center">
                  <h6 class="text-center">ROSTER</h6>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row justify-content-start">
                      @foreach($match->checkins as $checkin)
                        @foreach($match->contestants[0]->contending_team->roster as $roster)
                          @if($roster->id==$checkin->roster_id)
                            <div class="col-12">
                              <h6 class="text-center">{{$roster->gamer->alias}}</h6>
                              {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                              {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                            </div>
                          @endif
                        @endforeach
                      @endforeach
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row justify-content-end">
                      @foreach($match->checkins as $checkin)
                        @foreach($match->contestants[1]->contending_team->roster as $roster)
                          @if($roster->id==$checkin->roster_id)
                            <div class="col-12">
                              <h6 class="text-center">{{$roster->gamer->alias}}</h6>
                              {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                              {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                            </div>
                          @endif
                        @endforeach
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- a waiting end-->
        </li>
    @endforeach

    @foreach($future as $match)
        <li class="list-group-item">
          <div class="row"><!-- a future match-->
            <div class="col-4">
              <div class="row justify-content-end">
            <span>

              <span class="d-none d-md-inline">{{$match->contestants[0]->contending_team->name}}</span>
              <span class="d-inline d-md-none">{{$match->contestants[0]->contending_team->tag}}</span>
              <img class="align-center" src="{{$match->contestants[0]->contending_team->logo_size2}}">
            </span>
              </div>
              <div class="row justify-content-end">
                @foreach($match->checkins as $checkin)
                  @foreach($match->contestants[0]->contending_team->roster as $roster)
                    @if($roster->id==$checkin->roster_id)
                      <div class="back-color-primary mx-1">
                        {{--{{$roster->gamer->alias}}--}}
                        <img src="{{URL::asset('storage/icons8-ok-16.png')}}"
                             data-toggle="tooltip" title="{{$roster->gamer->alias}}">
                      </div>
                    @endif
                  @endforeach
                @endforeach
              </div>
            </div>
            <div class="col-2">
              <div class="row justify-content-center">
                <span class="text-center text-uppercase mt-1" style="font-size: 12px">vs</span>
              </div>
              <div class="row justify-content-center mt-3">
                {{\Carbon\Carbon::parse($match->matchstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('g:i A')}}
              </div>
              <div class="row justify-content-center mt-2">
                <span class="text-center text-uppercase" style="font-size: 12px;">{{\Carbon\Carbon::parse($match->matchstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('l jS F')}}</span>
              </div>
            </div>
            <div class="col-4">
              <div class="row justify-content-start">
            <span>
              <img class="align-center" src="{{$match->contestants[1]->contending_team->logo_size2}}">
              <span class="d-inline d-md-none">{{$match->contestants[1]->contending_team->tag}}</span>
              <span class="d-none d-md-inline">{{$match->contestants[1]->contending_team->name}}</span>

            </span>
              </div>
              <div class="row">
                @foreach($match->checkins as $checkin)
                  @foreach($match->contestants[1]->contending_team->roster as $roster)
                    @if($roster->id==$checkin->roster_id)
                      <div class="back-color-primary mx-1">
                        {{--{{$roster->gamer->alias}}--}}
                        <img src="{{URL::asset('storage/icons8-ok-16.png')}}"
                             data-toggle="tooltip" title="{{$roster->gamer->alias}}">
                      </div>
                    @endif
                  @endforeach
                @endforeach
              </div>
            </div>
          </div><!-- a future match end-->
        </li>
    @endforeach
    </ul>

    <h2 class="text-uppercase font-light-gray mt-5">Results</h2>

    <ul class="list-group my-3 list-group-tournament-match accordion" id="pastAccordion">
    @foreach($past as $match)
    <li class="list-group-item">
      <div class="row"><!-- a past match-->
        <div class="col-4">
          <div class="row justify-content-end">
            <span>

              <span class="d-none d-md-inline">{{$match->contestants[0]->contending_team->name}}</span>
              <span class="d-inline d-md-none">{{$match->contestants[0]->contending_team->tag}}</span>
              <img class="align-center" src="{{$match->contestants[0]->contending_team->logo_size2}}">
            </span>
          </div>
        </div>
        <div class="col-2 d-flex justify-content-center">
            <div class="">
              <div class="row justify-content-center mt-3">
                @if(is_numeric($match->contestants[0]->score))
                  {{$match->contestants[0]->score}}
                @else
                  ?
                @endif
                -
                @if(is_numeric($match->contestants[1]->score))
                  {{$match->contestants[1]->score}}
                @else
                  ?
                @endif
              </div>
              {{--<div class="row justify-content-center">--}}
                {{--<span class="text-center text-uppercase mt-1" style="font-size: 12px">Roster</span>--}}
              {{--</div>--}}
              {{--<div class="row justify-content-center mt-3">--}}
                {{--{{\Carbon\Carbon::parse($match->matchstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('g:i A')}}--}}
              {{--</div>--}}
              <div class="row justify-content-center mt-2">
                <span class="text-center text-uppercase" style="font-size: 12px">{{\Carbon\Carbon::parse($match->matchstart,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('l jS F')}}</span>
              </div>
            </div>
        </div>
        <div class="col-4">
          <div class="row justify-content-start">
            <span>
              <img class="align-center" src="{{$match->contestants[1]->contending_team->logo_size2}}">
              <span class="d-inline d-md-none">{{$match->contestants[1]->contending_team->tag}}</span>
              <span class="d-none d-md-inline">{{$match->contestants[1]->contending_team->name}}</span>

            </span>
          </div>
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
          <button data-state="C" type="button"  data-toggle="collapse" data-target="#{{$match->id}}"
                  class="btn btn-outline-light btn-sm d-block m-auto btn-collapse" >
            <i class="fas fa-chevron-down d-inline"></i>
            <i class="fas fa-chevron-up d-none"></i>

          </button>
        </div>
        <div class="row w-100 mx-auto mt-3 p-3 collapse bg-darkgray" id="{{$match->id}}" data-parent="#pastAccordion">
          <div class="col-10 ">
            <div class="row justify-content-center">
              <h6 class="text-center">ROSTER</h6>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="row justify-content-start">
                  @foreach($match->checkins as $checkin)
                    @foreach($match->contestants[0]->contending_team->roster as $roster)
                      @if($roster->id==$checkin->roster_id)
                        <div class="col-12">
                          <h6 class="text-center">{{$roster->gamer->alias}}</h6>
                          {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                          {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                        </div>
                      @endif
                    @endforeach
                  @endforeach
                </div>
              </div>
              <div class="col-6">
                <div class="row justify-content-end">
                  @foreach($match->checkins as $checkin)
                    @foreach($match->contestants[1]->contending_team->roster as $roster)
                      @if($roster->id==$checkin->roster_id)
                        <div class="col-12">
                          <h6 class="text-center">{{$roster->gamer->alias}}</h6>
                          {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                          {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                        </div>
                      @endif
                    @endforeach
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

      </div><!-- a past match end-->
    </li>
    @endforeach
    </ul>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
      $('.btn-collapse').click(function(){
          var state = $(this).data('state');

          var allbuttons = $('.btn-collapse');
          $.each(allbuttons, function(){

              if($(this).attr('data-state') == state)
              {
                  $(this).find('.fa-chevron-up').removeClass('d-inline');
                  $(this).find('.fa-chevron-down').removeClass('d-none');
                  $(this).find('.fa-chevron-up').addClass('d-none');
                  $(this).find('.fa-chevron-down').addClass('d-inline');
              }
          });
          if($(this).attr('aria-expanded')!="true")
          {
              $(this).find('.fa-chevron-up').removeClass('d-none');
              $(this).find('.fa-chevron-down').removeClass('d-inline');
              $(this).find('.fa-chevron-up').addClass('d-inline');
              $(this).find('.fa-chevron-down').addClass('d-none');
          }
      })
    </script>
  </div>
  @endif
</div>