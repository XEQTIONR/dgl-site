<div class="row tournament-row  tournament-row-overview mb-5" id="overviewRow"></div>
<div class="row tournament-row tournament-row-overview">
  <div class="col-12">
    <h1 class="font-primary-color py-3">Overview</h1>
  </div>
  <div class="col-12 tournament-overview-container">

    <div class="row">
      <h2>UPCOMING MATCHES</h2>
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
                <button>CHECKIN BUTTON</button>
              @endif
            @endif
          @endforeach
        @endif
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
                <button>CHECKIN BUTTON</button>
              @endif
            @endif
          @endforeach
        @endif
      </div>
    </div><!-- a waiting match end-->
    @endforeach

  </div>
</div>