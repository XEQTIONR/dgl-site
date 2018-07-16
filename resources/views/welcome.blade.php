@extends('layouts.main')
@section('body-section')

    <div class="row justify-content-center d-block mt-0">
        <div class="col-12 no-horizontal-padding">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators" id="buggyElement">
                    <?php $i = 0 ?>
                    @foreach($banners as $banner)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="<?php if($i==0) echo 'active'?>"></li>
                    <?php $i++ ?>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <?php $i = 0 ?>
                    @foreach($banners as $banner)
                    <?php $i++ ?>
                    <a href="{{$banner->link}}" class="carousel-item carousel-item-main <?php if($i==1) echo 'active'?>">
                        <div class="w-100 banner-div" style="background-image: url('{{$banner->image}}')">

                        </div>
                        {{--<img class="d-block w-100" src="{{$banner->image}}" alt="First slide">--}}

                        <div class="w-100 h-100 bg-darkgray banner-layer"></div>

                        <div class="d-block carousel-caption mx-0 px-0">
                            <h1 class="d-block text-center carousel-text-header">{{$banner->title}}</h1>
                            <h5 class="d-block slide-text carousel-text-subheader">{{$banner->subtitle}}</h5>
                        </div>
                    </a>
                    @endforeach
                    <script>
                        $(document).ready(function(){
                            $(".banner-layer").css('opacity', '1');
                            $(".carousel-caption").css('opacity','1');
                            $(".carousel-indicators").hover(function(){
                                $(".banner-layer").css('opacity', '0');
                                $(".carousel-caption").css('opacity','0');
                            });
                            $(".carousel-item-main").hover(function(){
                                $(".carousel-caption").fadeTo(300, 0);
                                $(".banner-layer").fadeTo(300, 0);
                            },function(){
                               if(!$("#buggyElement").is(":hover"))
                                {$(".banner-layer").fadeTo(300, 1);
                                $(".carousel-caption").fadeTo(300, 1)};
                            });
                        });
                    </script>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div> <!-- row banner-background -->
    <div class="row bg-purple5">
    <div class="row justify-content-center mt-5 mt-md-0 mw">
        <div class="col-11 col-md-10 col-lg-8">
            <div class="row main-content mb-4">
                <div class="col-12">
                    <div class="row bg-purple3 my-3 section-title">
                      <span class="font-white font-primary m-3">LATEST</span>
                    </div>
                    <script>
                        $(document).ready(function(){
                            var x=1;
                            var max ={{$lastpage}};
                            //alert("max= "+max);
                            $("#moreButton").click(function(){
                                event.preventDefault();
                                x++;
                                if(x<=max)
                                {
                                    $.ajax({
                                        url: "{{url('/')}}"+"?page="+x,
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
                    <div class="row main-content-posts" id="postContainer">

                        @foreach($posts as $post)
                        <div class="col-12">
                            <!-- div for small screens -->
                            <div class="row post-body mb-5 d-block d-md-none"  onclick="window.location.href='/news/{{$post->id}}'">
                                <div class="col-12">
                                    <div class="thumbnail thumbnail-rect-smscreen">
                                    <img class="mt-3" src="{{$post->banner}}">
                                    </div>
                                </div>
                                <div class="col-12 mt-3 px-4 px-sm-5">
                                    <a class="post-link" href="/news/{{$post->id}}">
                                        <h3 class="post-title mt-3">{{$post->title}}</h3>
                                    </a>
                                    <p class="time">{{$post->created_at->diffForHumans(Carbon\Carbon::now(), true)}} ago</p>
                                    <span>{!! $post->excerpt !!}</span>
                                </div>
                                <div class="col-12 mt-3 px-4 px-sm-5">
                                    <div class="btn-dgl-contaianer btn-dgl-container-gray">
                                        <a href="/news/{{$post->id}}" class="btn btn-lg btn-dgl">Read More</a>
                                    </div>
                                </div>
                            </div>
                            {{--<!-- div for large screens -->--}}
                            <div class="row post-body post-body-hover d-none d-md-flex" onclick="window.location.href='/news/{{$post->id}}'">
                              <div class="thumbnail thumbnail-new my-3 mx-2">
                                  <img class="" src="{{$post->banner}}">
                              </div>
                              <div class="post-text">
                                <a class="post-link" href="/news/{{$post->id}}">
                                    <h3 class="post-title">{{$post->title}}</h3>
                                </a>
                                <p class="time">{{$post->created_at->diffForHumans(Carbon\Carbon::now(), true)}} ago</p>
                                <span>{!! $post->excerpt !!}</span>
                              </div>
                            </div>
                        </div>
                        @endforeach

                    </div> <!-- row main-content-posts-->
                    @if($lastpage>1)
                    <div class="row justify-content-center mb-4 pb-4 ">
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
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="row main-sidebar justify-content-center my-3">


                <div class="col-12 col-sm-6 col-md-4 col-lg-12 mx-auto">
                  <div class="card bg-purple3 mx-auto ">
                      <div id="carouselExampleIndicatorX" data-interval="false" class="carousel slide" data-ride="carousel">
                        @if(count($tournaments)>1)
                        <ol class="carousel-indicators">
                          @php $i=0; @endphp
                          @foreach($tournaments as $tournament)
                          <li data-target="#carouselExampleIndicatorX" data-slide-to="{{$i}}"
                              @php
                                if($i==0)
                                  echo 'class="active"';
                              @endphp
                          ></li>

                          @php $i++; @endphp
                          @endforeach
                        </ol>
                        @endif
                        @php
                          $i=0;
                          $current = false;
                        @endphp

                        <div class="carousel-inner mt-0 mb-1">
                          @foreach($tournaments as $tournament)
                          <div class="carousel-item @php if($i==0) echo ' active' @endphp">

                            <div class="card-body card-title px-1 py-3">
                              <span class="font-white font-primary mx-3">
                                @if($tournament->status=='current')
                                  @php $current = true; @endphp
                                  CURRENT TOURNAMENT
                                @elseif(($i==0 && !$current)||($i==1 && $current))
                                  NEXT TOURNAMENT
                                @else
                                  UPCOMING TOURNAMENT
                                @endif
                              </span>
                            </div>
                            <div class="card-body">
                          @if($tournament->logo)
                              <img class="dgl-card-img my-auto" src="{{$tournament->logo}}" alt="{{$tournament->name}} tournament logo">
                            @elseif($tournament->banner)
                              <img class="card-img" src="{{$tournament->banner}}" alt="{{$tournament->name}} tournament logo">
                            @else
                              <img class="dgl-card-img my-auto" src="{{URL::asset('storage/DGLCrownWhite.svg')}}" alt="{{$tournament->name}} tournament logo">
                            @endif
                            </div>
                            <div class="card-body">
                              <h6 class="card-title text-center font-white">{{$tournament->name}}</h6>
                              <p class="card-text text-center font-gray">{{$tournament->caption}}</p>
                            </div>
                            <div class="card-body justify-content-center">
                              <a href="" class="btn btn-success py-2 mb-5 btn-block text-uppercase">Go to tournament</a>
                            </div>
                          </div>
                            @php $i++ @endphp
                          @endforeach
                        </div>
                      </div>
                    </div>
                </div>

                @foreach($tournaments as $tournament)
                  @if($tournament->status == 'current')
                  <div class="col-12 col-sm-6 col-md-4 col-lg-12 my-4 mx-auto">

                    <div class="card bg-purple3 mx-auto">
                        <div class="card-body card-title px-1 py-3">
                        <span class="font-primary font-white mx-3">STANDINGS</span>
                        </div>
                      <div class="card-body">
                        @if($tournament->logo)
                          <img class="dgl-card-img my-auto" src="{{$tournament->logo}}" alt="{{$tournament->name}} tournament logo">
                        @elseif($tournament->banner)
                          <img class="card-img" src="{{$tournament->banner}}" alt="{{$tournament->name}} tournament logo">
                        @else
                          <img class="dgl-card-img-small my-auto" src="{{URL::asset('storage/DGLCrownWhite.svg')}}" alt="{{$tournament->name}} tournament logo">
                        @endif
                      </div>
                      <div class="card-body">
                        <h6 class="card-title text-center font-white">{{$tournament->name}}</h6>
                        <table class="table table-small table-condensed table-dark">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Team</th>
                            <th scope="col">PLD</th>
                            <th scope="col">Pts</th>
                          </tr>
                          </thead>
                          <tbody>
                            @php $i=0; @endphp
                            @if($tournament->standings)
                            @foreach($tournament->standings as $record)
                              @php $i++; @endphp
                              <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$record->team_name}}</td>
                                <td>{{$record->mp}}</td>
                                <td>{{$record->points}}</td>
                              </tr>
                            @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  @endif
                @endforeach
            </div>
        </div>
    </div><!-- row main -->
    </div>
@endsection