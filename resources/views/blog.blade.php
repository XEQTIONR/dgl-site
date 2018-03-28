@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center back-color-darkgray"> <!-- jumbotron row -->
    <div class="col-12 mt-md-5 no-horizontal-padding">
      <div class="jumbotron-fluid background-news">
        <div class="row my-5 pt-5 justify-content-start">
          <div class="col-12 col-md-7 offset-md-1 col-xl-6 offset-xl-1 mt-10">
            <h1 class="display-4 text-center text-md-left">News</h1>
          </div>
          <div class="col-2 offset-3 offset-sm-4 offset-md-0 mt-10">
            {{--<img src="{{URL::asset('storage/bd.png')}}" height="100">--}}
          </div>
          <hr class="my-4">
        </div>
        <div class="row">
          <div class="col offset-1">
            <h2 class="">The Low Down</h2>
          </div>
        </div>
        <div class="row">
          <div class="col offset-1">
            <p class="lead mr-4">All information about DGL and the Esports scene in Bangladesh</p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->

  <!-- if an active tournament currently -->
  <div class="row py-5 border-bottom  back-color-lightgray">
    <div class="col-12">
      <!-- active tournaments rows -->
      <div class="row mb-5">
        <div class="col-12 col-md-3 offset-md-1">
          <div class="thumbnail thumbnail-rect d-none d-lg-inline-block">
            <img class="mt-3" src="{{URL::asset('storage/overwatch-2.jpg')}}">
          </div>
          <div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">
            <img class="mt-3" src="{{URL::asset('storage/overwatch-2.jpg')}}">
          </div>
          <div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">
            <img class="mt-3" src="{{URL::asset('storage/overwatch-2.jpg')}}">
          </div>
        </div>
        <div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">
          <div class="row">
            <h1 class="font-purple">OVERPOWERED - Overwatch Tournament</h1>
          </div>
          <div class="row">
            <div class="mt-1 mb-3 mr-3">
              <i class="fas fa-tags font-primary-color"></i>
              <span class="tag">Tournament</span>,
              <span class="tag">Overwatch</span>,
              <span class="tag">1st Division</span>
              <span class="tag">Overwatch</span>,
              <span class="tag">1st Division</span>

            </div>
            <div class="mt-1 mb-3 pr-5">
              <i class="fas fa-calendar-alt font-gray"></i>
              <span class="">12 DECEMBER 2018</span>
            </div>
            <p class="font-gray">This is the DOTA 2 All-Stars League. Lorem Ipsum dolor sit amet. Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet.</p>
          </div>
          <div class="btn-dgl-contaianer-purple">
            <a href="/atournament" class="btn btn-lg btn-dgl">Read On</a>
          </div>
        </div>
      </div><!-- active tournament rows -->
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->

  {{--<div class="row pb-5 border-bottom back-color-lightergray">--}}
    {{--<div class="col-12">--}}
      {{--<div class="row my-5  justify-content-center">--}}
        {{--<div class="col-10 pl-0">--}}
          {{--<h1 class="font-gray">PAST TOURNAMENTS</h1>--}}
        {{--</div>--}}
      {{--</div>--}}
      {{--<!-- active tournaments rows -->--}}
      {{--<div class="row mb-5">--}}
        {{--<div class="col-12 col-md-3 offset-md-1">--}}
          {{--<div class="thumbnail thumbnail-rect d-none d-lg-inline-block">--}}
            {{--<img class="mt-3" src="{{URL::asset('storage/overwatch-3.jpg')}}">--}}
          {{--</div>--}}
          {{--<div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">--}}
            {{--<img class="mt-3" src="{{URL::asset('storage/overwatch-3.jpg')}}">--}}
          {{--</div>--}}
          {{--<div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">--}}
            {{--<img class="mt-3" src="{{URL::asset('storage/overwatch-3.jpg')}}">--}}
          {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">--}}
          {{--<div class="row">--}}
            {{--<h1 class="font-blue">DOTA 2 All-Stars League</h1>--}}
            {{--<p class="font-gray">This is the DOTA 2 All-Stars League. Lorem Ipsum dolor sit amet. Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet.</p>--}}
          {{--</div>--}}
          {{--<img class="d-inline-block mr-4" width="48" src="{{URL::asset('storage/icons8-dota-2-96.png')}}">--}}
          {{--<div class="btn-dgl-contaianer">--}}
            {{--<a href="/atournament" class="btn btn-lg btn-dgl">Go to Tournament Page</a>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div><!-- active tournament rows -->--}}
    {{--</div><!-- active tournament container column -->--}}
  {{--</div> <!-- active tournament container row-->--}}
@endsection