<div class="row tournament-row  tournament-row-overview mb-5" id="overviewRow"></div>
<div class="row tournament-row tournament-row-overview">
  <div class="col-12">
    <h1 class="font-primary-color py-3">Overview</h1>
  </div>
  <div class="col-12 tournament-overview-container">

    <div class="row">
      <h2>UPCOMING MATCHES</h2>
    </div>
    @foreach($checkingin as $match)
      <div class="row"><!-- a waiting match-->
        <div class="col-4">
          <div class="row justify-content-center">
            <span class="mt-3 mr-4 font-white">{{$match->contestants[0]->contending_team->name}}</span>
            <img  class="align-text-bottom" src="/uploads/images/clan_logos/{{$match->contestants[0]->contending_team->logo_size2}}" width="50" height="50">

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
                    <a href="/checkin/{{$roster->id}}/{{$match->id}}" class=" my-3 btn btn-primary">CHECKIN BUTTON</a>
                @endif
              @endif
            @endforeach
          @endif
        </div>
        <div class="col-1 mt-3">
          <span class="font-white">vs</span>
        </div>
        <div class="col-4">
          <div class="row justify-content-center">
            <img  class="align-text-bottom" src="/uploads/images/clan_logos/{{$match->contestants[1]->contending_team->logo_size2}}" width="50" height="50">
            <span class="mt-3 ml-4 font-white">{{$match->contestants[1]->contending_team->name}}</span>
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
                  <a href="/checkin/{{$roster->id}}/{{$match->id}}" class="btn btn-primary">CHECKIN BUTTON</a>
                @endif
              @endif
            @endforeach
          @endif
        </div>
      </div><!-- a waiting match end-->
    @endforeach


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

    <div class="row">
      <h2>RESULTS</h2>
    </div>
    @foreach($past as $match)
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
  </div>
</div>