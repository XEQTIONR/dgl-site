@extends('layouts.main')
@section('body-section')

<div class="row justify-content-center banner-row">
  <div class="col-12 mx-0 px-0">
    <img src="{{URL::asset('storage/head-banner.png')}}"
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
        <th>Alias</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Current/Last team</th>
        <th>Latest appearance on</th>
      </tr>
      </thead>
      <tbody>
      @if(count($players)>0)
      @foreach($players as $gamer)
        <tr>
          <td>{{$gamer->alias}}</td>
          <td>{{$gamer->fname}}</td>
          <td>{{$gamer->lname}}</td>
          <td>{{$gamer->name}}</td>
          <td>{{date('M j Y', strtotime($gamer->recent_at))}}</td>
        </tr>
      @endforeach
      @else
        <tr>
          <td colspan="5">
          <p class="text-center">No players yet. This list gets populated as teams register for new tournaments.</p>
          </td>
        </tr>

      @endif
      </tbody>
    </table>
  </div>
</div>
<div class="row justify-content-center">
{{$players->links()}}
</div>

@endsection