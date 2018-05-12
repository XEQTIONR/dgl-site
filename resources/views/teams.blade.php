@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center banner-row">
    <div class="col-12 mx-0 px-0">
      <img src="{{URL::asset('storage/Banner1.png')}}"
           class="banner-row-background">
      <h1>Teams</h1>
      <img src="{{URL::asset('storage/icons8-conference-64.png')}}" class="banner-icon">
    </div>
  </div>
  <div class="row justify-content-center"> <!-- the content row -->
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
              <img class="card-img-top" src="{{$team->logo_size1}}" alt="Card image cap">
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