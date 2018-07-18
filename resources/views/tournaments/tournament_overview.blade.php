<div class="row tournament-row tournament-row-overview">
  <div class="col-12">
    <h1 class="font-white py-3">Overview</h1>
  </div>
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
          {{--<div class="row justify-content-end">--}}
            {{--@foreach($match->checkins as $checkin)--}}
              {{--@foreach($match->contestants[0]->contending_team->roster as $roster)--}}
                {{--@if($roster->id==$checkin->roster_id)--}}
                  {{--<div class="back-color-primary mx-1">--}}
                    {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                         {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                  {{--</div>--}}
                {{--@endif--}}
              {{--@endforeach--}}
            {{--@endforeach--}}
          {{--</div>--}}
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
          {{--<div class="row">--}}
            {{--@foreach($match->checkins as $checkin)--}}
              {{--@foreach($match->contestants[1]->contending_team->roster as $roster)--}}
                {{--@if($roster->id==$checkin->roster_id)--}}
                  {{--<div class="back-color-primary mx-1">--}}
                    {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                      {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                  {{--</div>--}}
                {{--@endif--}}
              {{--@endforeach--}}
            {{--@endforeach--}}
          {{--</div>--}}
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
                  class="btn btn-primary btn-sm d-block m-auto btn-collapse" >
            <i class="fas fa-chevron-down d-inline"></i>
            <i class="fas fa-chevron-up d-none"></i>

          </button>
        </div>
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
              {{--<div class="row justify-content-end">--}}
                {{--@foreach($match->checkins as $checkin)--}}
                  {{--@foreach($match->contestants[0]->contending_team->roster as $roster)--}}
                    {{--@if($roster->id==$checkin->roster_id)--}}
                      {{--<div class="back-color-primary mx-1">--}}
                        {{--{{$roster->gamer->alias}}--}}
                        {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                             {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                      {{--</div>--}}
                    {{--@endif--}}
                  {{--@endforeach--}}
                {{--@endforeach--}}
              {{--</div>--}}
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
              {{--<div class="row">--}}
                {{--@foreach($match->checkins as $checkin)--}}
                  {{--@foreach($match->contestants[1]->contending_team->roster as $roster)--}}
                    {{--@if($roster->id==$checkin->roster_id)--}}
                      {{--<div class="back-color-primary mx-1">--}}
                        {{--{{$roster->gamer->alias}}--}}
                        {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                             {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                      {{--</div>--}}
                    {{--@endif--}}
                  {{--@endforeach--}}
                {{--@endforeach--}}
              {{--</div>--}}
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
              <button data-state="W" type="button"  data-toggle="collapse" data-target="#{{$match->id}}"
                      class="btn btn-primary btn-sm d-block m-auto btn-collapse" >
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
          {{--<div class="row justify-content-end">--}}
            {{--@foreach($match->checkins as $checkin)--}}
              {{--@foreach($match->contestants[0]->contending_team->roster as $roster)--}}
                {{--@if($roster->id==$checkin->roster_id)--}}
                  {{--<div class="back-color-primary mx-1">--}}
                    {{--{{$roster->gamer->alias}}--}}
                    {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                    {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                  {{--</div>--}}
                {{--@endif--}}
              {{--@endforeach--}}
            {{--@endforeach--}}
          {{--</div>--}}
        </div>
        <div class="col-2 d-flex justify-content-center">
            <div class="">
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
          {{--<div class="row">--}}
            {{--@foreach($match->checkins as $checkin)--}}
              {{--@foreach($match->contestants[1]->contending_team->roster as $roster)--}}
                {{--@if($roster->id==$checkin->roster_id)--}}
                  {{--<div class="back-color-primary mx-1">--}}
                    {{--{{$roster->gamer->alias}}--}}
                    {{--<img src="{{URL::asset('storage/icons8-ok-16.png')}}"--}}
                      {{--data-toggle="tooltip" title="{{$roster->gamer->alias}}">--}}
                  {{--</div>--}}
                {{--@endif--}}
              {{--@endforeach--}}
            {{--@endforeach--}}
          {{--</div>--}}
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
          <button data-state="C" type="button"  data-toggle="collapse" data-target="#{{$match->id}}"
                  class="btn btn-primary btn-sm d-block m-auto btn-collapse" >
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
            var flag = false;
            var state = $(this).data('state');

            if($(this).find('.fa-chevron-down').hasClass('d-inline'))
             flag = true;

            var allbuttons = $('.btn-collapse');
            $.each(allbuttons, function(index, value){
                if(allbuttons[index].data('state')==state)
                {
                    value.find('.fa-chevron-down').addClass('d-inline');
                    value.find('.fa-chevron-down').removeClass('d-none');
                    value.find('.fa-chevron-down').addClass('d-none');
                    value.find('.fa-chevron-down').removeClass('d-inline');
                }
            });

            if(flag)
            {
                $(this).find('.fa-chevron-down').addClass('d-none');
                $(this).find('.fa-chevron-down').removeClass('d-inline');
                $(this).find('.fa-chevron-up').addClass('d-inline');
                $(this).find('.fa-chevron-up').removeClass('d-none');
            }
            else{
                $(this).find('.fa-chevron-down').removeClass('d-none');
                $(this).find('.fa-chevron-down').addClass('d-inline');
                $(this).find('.fa-chevron-up').removeClass('d-inline');
                $(this).find('.fa-chevron-up').addClass('d-none');
            }

            // $(this).html('<i class="fas fa-chevron-down"></i>');
        });

    </script>
  </div>
</div>