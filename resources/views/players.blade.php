@extends('layouts.main')
@section('body-section')

<div class="row justify-content-center banner-row">
  <div class="col-12 mx-0 px-0">
    <img src="{{URL::asset('storage/Banner1.png')}}"
         class="banner-row-background">
    <h1>Players</h1>
    <img src="{{URL::asset('storage/icons8-technical-support-64.png')}}" class="banner-icon">
  </div>
</div>
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