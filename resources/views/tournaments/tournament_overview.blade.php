<div class="row tournament-row tournament-row-overview mb-5">
  <div class="col-12">
    <h1 class="font-purple py-3">Overview</h1>
  </div>
  <div class="col-12 tournament-overview-container">

    <h2 class="text-uppercase font-white">Upcoming matches</h2>

    <ul class="list-group">
    @foreach($checkingin as $match)
    <li class="list-group-item">
      <div class="d-flex"><!-- a checking in match-->
        <div class="col-5">
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
                    <img src="{{URL::asset('storage/icons8-ok-16.png')}}"
                         data-toggle="tooltip" title="{{$roster->gamer->alias}}">
                  </div>
                @endif
              @endforeach
            @endforeach
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
                    <a href="/checkin/{{$roster->id}}/{{$match->id}}" class=" my-3 mr-2 btn btn-success">
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
            {{\Carbon\Carbon::parse($match->matchstart)->format('g:i A')}}
          </div>
          <div class="row justify-content-center">
            <span class="text-center text-uppercase mt-1" style="font-size: 12px">teams checking in</span>
          </div>
        </div>
        <div class="col-5">
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
                    <img src="{{URL::asset('storage/icons8-ok-16.png')}}"
                      data-toggle="tooltip" title="{{$roster->gamer->alias}}">
                  </div>
                @endif
              @endforeach
            @endforeach
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
                    <a href="/checkin/{{$roster->id}}/{{$match->id}}" class="my-3 ml-2 btn btn-success">
                      <i class="fas fa-check"></i>
                      CHECKIN
                    </a>
                  </div>
                @endif
              @endif
            @endforeach
          @endif
        </div>
      </div><!-- a checking in match end-->
    </li>
    @endforeach


    @foreach($waiting as $match)
        <li class="list-group-item">
          <div class="d-flex"><!-- a waiting match-->
            <div class="col-5">
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
              <div class="row justify-content-center mt-3">
                vs
              </div>
              <div class="row justify-content-center mt-3">
                {{\Carbon\Carbon::parse($match->matchstart)->format('g:i A')}}
              </div>
              <div class="row justify-content-center">
                <span class="text-center text-uppercase mt-1" style="font-size: 12px">waiting to start</span>
              </div>
            </div>
            <div class="col-5">
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
          </div><!-- a waiting end-->
        </li>
    @endforeach

    @foreach($future as $match)
        <li class="list-group-item">
          <div class="d-flex"><!-- a future match-->
            <div class="col-5">
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
                {{\Carbon\Carbon::parse($match->matchstart)->format('g:i A')}}
              </div>
              <div class="row justify-content-center mt-2">
                <small class="text-center text-uppercase">{{\Carbon\Carbon::parse($match->matchstart)->format('l jS F')}}</small>
              </div>
            </div>
            <div class="col-5">
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

    <ul class="list-group">
    @foreach($past as $match)
    <li class="list-group-item">
      <div class="d-flex"><!-- a past match-->
        <div class="col-5">
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
        <div class="col-2 d-flex justify-content-center">
            <div class="mt-2">
              <div class="row justify-content-center mt-3">
                @if(is_numeric($match->contestants[0]->score))
                  {{$match->contestants[0]->score}}
                @else
                  -
                @endif
                :
                @if(is_numeric($match->contestants[1]->score))
                  {{$match->contestants[1]->score}}
                @else
                  -
                @endif
              </div>
              <div class="row justify-content-center">
                <span class="text-center text-uppercase mt-1" style="font-size: 12px">Roster</span>
              </div>
              <div class="row justify-content-center mt-3">
                {{\Carbon\Carbon::parse($match->matchstart)->format('g:i A')}}
              </div>
              <div class="row justify-content-center mt-2">
                <small class="text-center text-uppercase">{{\Carbon\Carbon::parse($match->matchstart)->format('l jS F')}}</small>
              </div>
            </div>
        </div>
        <div class="col-5">
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
      </div><!-- a past match end-->
    </li>
    @endforeach
    </ul>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
  </div>
</div>