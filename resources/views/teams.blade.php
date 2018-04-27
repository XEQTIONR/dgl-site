@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center back-color-lightergray"> <!-- jumbotron row -->
    <div class="col-12 mt-md-5 no-horizontal-padding">
      <div class="jumbotron-fluid background-teams">
        <div class="row my-5 pt-5 justify-content-start">
          <div class="col-12 col-md-7 offset-md-1 col-xl-6 offset-xl-1 mt-10">
            <h1 class="display-4 text-center text-md-left">Teams</h1>
          </div>
          <div class="col-2 offset-3 offset-sm-4 offset-md-0 mt-10">
            {{--<img src="{{URL::asset('storage/tournament-icon-white-96.png')}}" height="130">--}}
          </div>
          <hr class="my-4">
        </div>
        <div class="row">
          <div class="col offset-1">
            <h2 class="">Competitive Bangladeshi E-sports teams.</h2>
          </div>
        </div>
        <div class="row">
          <div class="col offset-1">
            <p class="lead mr-4">Forces to be reckoned with in e-sports scene in Bangladesh</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->
  <div class="row justify-content-center back-color-light main"> <!-- the content row -->
    <div class="col-10">
      <div class="row mt-5">
        <div class="col">
          <h3 class="font-light-gray"> Select a tournament </h3>
        </div>
        <div class="col">
        <select name="cars"
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
            <option value="/teams">Select a Tournament</option>
            <option value="/teams">ALL</option>
          @foreach($tournaments as $tournament)
            <option value="/teams/tournament/{{$tournament->id}}">{{$tournament->name}}</option>
          @endforeach
        </select>
        </div>
      </div>
      <div class="row">
        @if($this_tournament == "All")
          <h2>All Teams</h2>
        @else
          <h2>Teams In: {{$this_tournament->name}}</h2>
        @endif
      </div>
      <div class="row">

        @if(count($teams)>0)
          @foreach($teams as $team)
          <div class="col-6 col-md-4 col-lg-3  my-3">
            <div class="card p-4 team-logo-300-gray">
              <img class="card-img-top" src="/uploads/images/clan_logos/{{$team->logo_size1}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title text-center font-purple">{{$team->name}}</h5>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col-12 mt-10 mb-5">
            <h5 class="text-center">No teams yet for this selection.</h5>
          </div>
        @endif

      </div>
      <div class="row my-5 justify-content-center">
        @if($this_tournament == "All")
          {{$teams->links()}}
        @endif
      </div>
    </div>
  </div> <!-- content row-->
@endsection