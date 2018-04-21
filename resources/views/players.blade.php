@extends('layouts.main')
@section('body-section')

  <div class="row justify-content-center back-color-darkgray"> <!-- jumbotron row -->
    <div class="col-12 mt-md-5 no-horizontal-padding">
      <div class="jumbotron-fluid background-players">
        <div class="row my-5 pt-5 justify-content-start">
          <div class="col-12 col-md-7 offset-md-1 col-xl-6 offset-xl-1 mt-10">
            <h1 class="display-4 text-center text-md-left">Players</h1>
          </div>
          <div class="col-2 offset-3 offset-sm-4 offset-md-0 mt-10">
            {{--<img src="{{URL::asset('storage/tournament-icon-white-96.png')}}" height="130">--}}
          </div>
          <hr class="my-4">
        </div>
        <div class="row">
          <div class="col offset-1">
            <h2 class="">Gamers who compete</h2>
          </div>
        </div>
        <div class="row">
          <div class="col offset-1">
            <p class="lead mr-4">Information about players competing in official DGL tournaments.</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->
<div class="row justify-content-center">
  <div class="col-10 mt-5">
    <table class="table table-striped">
      <thead class="">
      <tr>
        <th>ALIAS</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>CURRENT/LAST TEAM</th>
        <th>LATEST APPEARANCE ON</th>
      </tr>
      </thead>
      <tbody>
      @foreach($players as $gamer)
        <tr>
          <td>{{$gamer->alias}}</td>
          <td>{{$gamer->fname}}</td>
          <td>{{$gamer->lname}}</td>
          <td>{{$gamer->name}}</td>
          <td>{{date('M j Y', strtotime($gamer->recent_at))}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row justify-content-center">
{{$players->links()}}
</div>

@endsection