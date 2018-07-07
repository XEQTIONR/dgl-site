@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center banner-row">
    <div class="col-12 mx-0 px-0">
      <img src="{{URL::asset('storage/head-banner.png')}}"
           class="banner-row-background">
      <h1>News</h1>
      <img src="{{URL::asset('storage/icons8-news-64.png')}}" class="banner-icon">
    </div>
  </div>
  <!-- if an active tournament currently -->
  <script>
      $(document).ready(function(){
          var x=1;
          var max ={{$lastpage}};

          $("#moreButton").click(function(){
              event.preventDefault();
              x++;

              if(x<=max)
              {
                  $.ajax({
                      url: "{{url('/news')}}"+"?page="+x,
                      method: "GET",
                      success: function(result){
                          $("#postContainer").append(result);
                      }
                  });
              }
              if(x==max)
              {    $("#moreButton").hide(); }
          });
      });
  </script>
  <div class="row py-5 border-bottom">
    <div class="col-12">
      <div id="postContainer" class="row">
      <!-- blog rows -->
      @foreach($posts as $post)
      <!--post row -->
        <div class="row mb-5 post-body">
          <div class="col-12 col-md-3 offset-md-1">
            <div class="thumbnail thumbnail-rect d-none d-lg-inline-block">
              <img class="mt-3" src="{{$post->banner}}">
            </div>
            <div class="thumbnail thumbnail-sq-lg d-none d-md-inline-block d-lg-none">
              <img class="mt-3" src="{{$post->banner}}">
            </div>
            <div class="thumbnail thumbnail-rect-smscreen pl-0 d-block d-md-none">
              <img class="mt-3" src="{{$post->banner}}">
            </div>
          </div>
          <div class="col-10 offset-1 col-md-6 offset-md-1 offset-lg-0 mt-2">
            <div class="row">
              <h3 class="font-white font-futura">{{$post->title}}</h3>
            </div>
            <div class="row">
              <div class="mt-1 mb-3 pr-4">
                <i class="fas fa-calendar-alt font-gray"></i>
                <span class="font-light-gray">
                  {{\Carbon\Carbon::parse($post->created_at,config('app.timezone'))->setTimezone(config('app.user_timezone'))->format('j F Y')}}
                  </span>
              </div>
              <div class="mt-1 mb-3 mr-3">
                <i class="fas fa-tags font-purple"></i>
                <span class="tag font-light-gray">Tournament</span>,
                <span class="tag font-light-gray">Overwatch</span>,
                <span class="tag font-light-gray">1st Division</span>
                <span class="tag font-light-gray">Overwatch</span>,
                <span class="tag font-light-gray">1st Division</span>
              </div>

              <span class="">{!! $post->excerpt !!}</span>
            </div>
            <div class="btn-dgl-contaianer-purple">
              <a href="/news/{{$post->id}}" class="btn btn-lg btn-dgl">Read On</a>
            </div>
          </div>
        </div><!-- post row -->
      @endforeach
      </div>
      @if($lastpage>1)
      <div class="row justify-content-center" >
        <div class="col-2">
          <a id="moreButton" href="">
            <div class="row justify-content-center">
              <span id="">More</span>
            </div>
            <div class="row  justify-content-center">
              <i class="fas fa-chevron-down"></i>
            </div>
          </a>
        </div>
      </div>
      @endif
    </div><!-- active tournament container column -->
  </div> <!-- active tournament container row-->
@endsection