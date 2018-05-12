<div class="row tournament-row  tournament-row-overview mb-5" id="overviewRow"></div>
<div class="row tournament-row tournament-row-overview">
  <div class="col-12">
    <h1 class="font-primary-color py-3">Overview</h1>
  </div>
  <div class="col-12 tournament-overview-container">

    <div class="row">
      <h2>UPCOMING MATCHES</h2>
    </div>
    <ul class="list-group">
    @foreach($checkingin as $match)
    <li class="list-group-item">
      <div class="d-flex"><!-- a checking in match-->
        <div class="col-5">
          <div class="row justify-content-center">
            <span>
              <img class="align-center" src="{{$match->contestants[0]->contending_team->logo_size2}}">
              <span class="d-none d-md-inline">{{$match->contestants[0]->contending_team->name}}</span>
              <span class="d-inline d-md-none">{{$match->contestants[0]->contending_team->tag}}</span>
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
                    <a href="/checkin/{{$roster->id}}/{{$match->id}}" class=" my-3 btn btn-success">
                      <i class="fas fa-check"></i>
                      CHECKIN
                    </a>
                  </div>
                @endif
              @endif
            @endforeach
          @endif
        </div>
        <div class="col-2 d-flex justify-content-center">
          <span class="mt-2">vs</span>
        </div>
        <div class="col-5">
          <div class="row justify-content-center">
            <span>
              <span class="d-inline d-md-none">{{$match->contestants[1]->contending_team->tag}}</span>
              <span class="d-none d-md-inline">{{$match->contestants[1]->contending_team->name}}</span>
            <img class="align-center" src="{{$match->contestants[1]->contending_team->logo_size2}}">
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
                    <a href="/checkin/{{$roster->id}}/{{$match->id}}" class="my-3 btn btn-success">
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
    </ul>


    @foreach($waiting as $match)
      <div class="row"><!-- a waiting match-->
        <div class="col-4">
          <div class="row">
            {{$match->contestants[0]->contending_team->name}}
          </div>
          <div class="row">
            @foreach($match->checkins as $checkin)
              @foreach($match->contestants[0]->contending_team->roster as $roster)
                @if($roster->id==$checkin->roster_id)
                  <div class="back-color-primary mx-1"  style="height: 50px; width: 50px">
                    {{$roster->gamer->alias}}
                  </div>
                @endif
              @endforeach
            @endforeach
          </div>
        </div>
        <div class="col-1">
          vs
        </div>
        <div class="col-4">
          <div class="row">
            {{$match->contestants[1]->contending_team->name}}
          </div>
          <div class="row">
            @foreach($match->checkins as $checkin)
              @foreach($match->contestants[1]->contending_team->roster as $roster)
                @if($roster->id==$checkin->roster_id)
                  <div class="back-color-primary mx-1" style="height: 50px; width: 50px">
                    {{$roster->gamer->alias}}
                  </div>
                @endif
              @endforeach
            @endforeach
          </div>
        </div>
      </div><!-- a waiting match end-->
    @endforeach

    @foreach($future as $match)
      <div class="row"><!-- a future match-->
        <div class="col-4">
          <div class="row">
            {{$match->contestants[0]->contending_team->name}}
          </div>
          <div class="row">
            @foreach($match->checkins as $checkin)
              @foreach($match->contestants[0]->contending_team->roster as $roster)
                @if($roster->id==$checkin->roster_id)
                  <div class="back-color-primary mx-1"  style="height: 50px; width: 50px">
                    {{$roster->gamer->alias}}
                  </div>
                @endif
              @endforeach
            @endforeach
          </div>
        </div>
        <div class="col-1">
          vs
        </div>
        <div class="col-4">
          <div class="row">
            {{$match->contestants[1]->contending_team->name}}
          </div>
          <div class="row">
            @foreach($match->checkins as $checkin)
              @foreach($match->contestants[1]->contending_team->roster as $roster)
                @if($roster->id==$checkin->roster_id)
                  <div class="back-color-primary mx-1" style="height: 50px; width: 50px">
                    {{$roster->gamer->alias}}
                  </div>
                @endif
              @endforeach
            @endforeach
          </div>
        </div>
      </div><!-- a future match end-->
    @endforeach

    <div class="row">
      <h2>RESULTS</h2>
    </div>
    <ul class="list-group">
    @foreach($past as $match)
    <li class="list-group-item">
      <div class="d-flex"><!-- a past match-->
        <div class="col-5">
          <div class="row justify-content-center">
            <span>
              <img class="align-center" src="{{$match->contestants[0]->contending_team->logo_size2}}">
              <span class="d-none d-md-inline">{{$match->contestants[0]->contending_team->name}}</span>
              <span class="d-inline d-md-none">{{$match->contestants[0]->contending_team->tag}}</span>
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
            <div class="mt-2">vs</div>
        </div>
        <div class="col-5">
          <div class="row justify-content-center">
            <span>
              <span class="d-inline d-md-none">{{$match->contestants[1]->contending_team->tag}}</span>
              <span class="d-none d-md-inline">{{$match->contestants[1]->contending_team->name}}</span>
            <img class="align-center" src="{{$match->contestants[1]->contending_team->logo_size2}}">
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