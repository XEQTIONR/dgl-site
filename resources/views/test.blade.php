@extends('layouts.main')

@section('body-section')
  <div class="mt-10">

  @foreach($checkin_meta as $roster)
    <div class="row">
      <div class="col">
        <span>
          <img class="align-center" src="{{$roster->contendingTeam->logo_size2}}">
          <span class="d-inline d-md-none">{{$roster->contendingTeam->tag}}</span>
          <span class="d-none d-md-inline">{{$roster->contendingTeam->name}}</span>
          <span class="ml-3">competing in</span>
          <span class="ml-3">
             @foreach($teams_formed as $someteam)
              @if($someteam->id == $roster->contending_team_id)
                {{$someteam->tournament->name}}
              @endif
            @endforeach
            @foreach($teams_joined as $someteam)
              @if($someteam->id == $roster->contending_team_id)
                {{$someteam->tournament->name}}
              @endif
            @endforeach
          </span>
        </span>
      </div>
    </div>
    <ul class="list-group w-100">
    @foreach($roster->contendingTeam->matchContestants as $matchContestantMe)
      <li class="list-group-item">
      @foreach($matchContestantMe->match->contestants as $opponent) {{-- template fails >1 opponent--}}
        @if($roster->contending_team_id != $opponent->contending_team_id)
        <div class="row">
          <div class="col-1">vs</div>
          <div class="col">
            <span>
            <img class="align-center" src="{{$opponent->contending_team->logo_size2}}">
            <span class="d-inline d-md-none">{{$opponent->contending_team->tag}}</span>
            <span class="d-none d-md-inline">{{$opponent->contending_team->name}}</span>
            </span>
          </div>
          <div class="col">
            <span>{{$matchContestantMe->match->checkinstart}}</span>
          </div>
          <div class="col">
            <span>{{$matchContestantMe->match->checkinend}}</span>
          </div>
          <div class="col">
            <span>{{$matchContestantMe->match->matchstart}}</span>
          </div>
          {{--<div class="col">{{$matchContestantMe->match->checkinend}}</div>--}}
          <?php $checked_in = false ?>
          @foreach($roster->checkin as $acheckin)
            @if($matchContestantMe->match->id == $acheckin->match_id)
              <?php $checked_in = true ?>
            @endif
          @endforeach
          <div class="col">
          @if($checked_in)
            <span class="font-primary-color">
              <i class="fas fa-check mr-2"></i>
              <strong class="d-none d-md-inline">CHECKED IN</strong>
            </span>
          @else
          <?php
            $now = \Carbon\Carbon::now();
            $c_start = \Carbon\Carbon::parse($matchContestantMe->match->checkinstart);
            $c_end = \Carbon\Carbon::parse($matchContestantMe->match->checkinend);
          ?>
            @if($now->gte($c_start) && $now->lte($c_end))
              <a href="/checkin/{{$roster->id}}/{{$matchContestantMe->match->id}}" class="btn btn-success btn-sm text-uppercase">
                <i class="fas fa-map-marker mr-1"></i>
                Checkin
              </a>
            @elseif($now->gt($c_end))
              <span class="font-light-gray text-uppercase"><strong>Checkin Expired</strong></span>
            @endif
          @endif
          </div>
        </div> <!-- row -->
        @endif
      @endforeach
      </li>
    @endforeach
    </ul>
  @endforeach

  </div>

@endsection