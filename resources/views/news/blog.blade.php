@extends('layouts.main')
@section('body-section')
  <div class="row justify-content-center banner-row">
    <div class="col-12 mx-0 px-0">
      <img src="{{URL::asset('storage/head-banner.png')}}"
           class="banner-row-background">
      <h1>News</h1>
      {{--<img src="{{URL::asset('storage/icons8-news-64.png')}}" class="banner-icon">--}}
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
  <div class="row bg-purple5 py-5">
    <div class="col-12">
      <div id="postContainer" class="row mw">
      <!-- blog rows -->
        @foreach($posts as $post)
          <div class="col-12">
            <!-- div for small screens -->
            <div class="row post-body mb-5 d-block d-md-none"  onclick="window.location.href='/news/{{$post->link}}'">
              <div class="col-12">
                <div class="thumbnail thumbnail-rect-smscreen">
                  <img class="mt-3" src="{{$post->banner}}">
                </div>
              </div>
              <div class="col-12 mt-3 px-4 px-sm-5">
                <a class="post-link" href="/news/{{$post->link}}">
                  <h3 class="post-title mt-3">{{$post->title}}</h3>
                </a>
                <p class="time">{{$post->created_at->diffForHumans(Carbon\Carbon::now(), true)}} ago</p>
                <span>{!! $post->excerpt !!}</span>
              </div>
              <div class="col-12 mt-3 px-4 px-sm-5">
                <div class="btn-dgl-contaianer btn-dgl-container-gray">
                  <a href="/news/{{$post->link}}" class="btn btn-lg btn-dgl">Read More</a>
                </div>
              </div>
            </div>
            {{--<!-- div for large screens -->--}}
            <div class="row post-body post-body-hover d-none d-md-flex" onclick="window.location.href='/news/{{$post->link}}'">
              <div class="thumbnail thumbnail-new my-3 ml-2">
                <img class="" src="{{$post->banner}}">
              </div>
              <div class="post-text">
                <a class="post-link" href="/news/{{$post->link}}">
                  <h3 class="post-title">{{$post->title}}</h3>
                </a>
                <p class="time">{{$post->created_at->diffForHumans(Carbon\Carbon::now(), true)}} ago</p>
                <span>{!! $post->excerpt !!}</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      @if($lastpage>1)
      <div class="row justify-content-center" >
        <div class="col-2 mt-4">
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