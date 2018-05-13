@extends('layouts.main')
@section('body-section')
    <div class="row justify-content-center d-none d-md-block">
        <div class="col-12 no-horizontal-padding">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $i = 0 ?>
                    @foreach($banners as $banner)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="<?php if($i==0) echo 'active'?>"></li>
                    <?php $i++ ?>
                    @endforeach
                </ol>
                <div class="carousel-inner mt-5">
                    <?php $i = 0 ?>
                    @foreach($banners as $banner)
                    <?php $i++ ?>
                    <a href="{{$banner->link}}" class="carousel-item <?php if($i==1) echo 'active'?>">
                        <img class="d-block w-100" src="{{$banner->image}}" alt="First slide">

                        <div class="w-100 h-100 back-color-dark banner-layer"></div>

                        <div class="carousel-caption" style="height: 60%">
                            <h1 class="d-none d-md-block text-center carousel-text-header">{{$banner->title}}</h1>
                            <p class="d-none d-sm-block text-center slide-text carousel-text-subheader">{{$banner->subtitle}}</p>
                        </div>
                    </a>
                    @endforeach
                    <script>
                        $(document).ready(function(){
                            $(".banner-layer").css('opacity', '0');
                            $(".carousel-caption").css('opacity','0');
                            $(".carousel-indicators").hover(function(){
                                $(".banner-layer").css('opacity', '.8');
                                $(".carousel-caption").css('opacity','1');
                            })
                            $(".carousel-item").hover(function(){
                                //".carousel-control-next, " +
                                //".carousel-control-prev, " +

                                $(".carousel-caption").fadeTo(300, 1);
                                $(".banner-layer").fadeTo(300, .8);
                            },function(){
                                if(!$(".carousel-indicators").is(":hover"))
                                {$(".banner-layer").fadeTo(300, 0);
                                $(".carousel-caption").fadeTo(300, 0)};
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
    <div class="row justify-content-center mt-5 mt-md-0">
        <div class="col-11 col-md-10 col-lg-8">
            <div class="row main-content">
                <div class="col-12">
                    <div class="row mt-4 mb-0">
                        <div class="col-12">
                            <h1 class="font-light-gray">LATEST</h1>
                        </div>
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
                    <div class="row main-content-posts justify-content-center" id="postContainer">

                        @foreach($posts as $post)
                        <div class="col-12">
                            <!-- div for small screens -->
                            <div class="row post-body my-5 d-block d-sm-block d-md-none"  onclick="window.location.href='/news/{{$post->id}}'">
                                <div class="col-12">
                                    <div class="thumbnail thumbnail-rect-smscreen">
                                    <img class="mt-3" src="{{$post->banner}}">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <a class="post-link" href="/news/{{$post->id}}">
                                        <h3 class="post-title mt-3">{{$post->title}}</h3>
                                    </a>
                                    <p>{{$post->created_at}}</p>
                                    <p>{!! $post->excerpt !!}</p>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="btn-dgl-contaianer btn-dgl-container-gray">
                                        <a href="/news/{{$post->id}}" class="btn btn-lg btn-dgl">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- div for medium screens -->
                            <div class="row post-body mb-5 d-none d-md-flex d-lg-none" onclick="window.location.href='/news/{{$post->id}}'">
                                <div class="col-4">
                                    <div class="thumbnail thumbnail-sq-lg">
                                        <img class="mt-3" src="{{$post->banner}}">
                                    </div>
                                </div>
                                <div class="col-8 col-lg-7">
                                    <a class="post-link" href="/news/{{$post->id}}">
                                        <h2 class="post-title mt-3">{{$post->title}}</h2>
                                    </a>
                                    <p>{{$post->created_at}}</p>
                                    <p>{!! $post->excerpt !!}</p>
                                    <div class="col-12 mt-3">
                                        <div class="btn-dgl-contaianer btn-dgl-container-gray">
                                            <a href=/news/{{$post->id}}"" class="btn btn-lg btn-dgl">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- div for large screens -->
                            <div class="row post-body post-body-hover mb-5 d-none d-lg-flex ml-xl-1" onclick="window.location.href='/news/{{$post->id}}'">
                                <div class="col-4">
                                    <div class="thumbnail thumbnail-rect">
                                        <img class="mt-3" src="{{$post->banner}}">
                                    </div>
                                </div>
                                <div class="col-8 col-lg-7">
                                    <a class="post-link" href="/news/{{$post->id}}">
                                        <h2 class="post-title mt-3">{{$post->title}}</h2>
                                    </a>
                                    <p>{{$post->created_at->diffForHumans(Carbon\Carbon::now(), true)}} ago</p>
                                    {!! $post->excerpt !!}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div> <!-- row main-content-posts-->
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
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-xl-2">
            <div class="row main-sidebar justify-content-center my-1">
                {{--<div class="col-12" style="background-color: #00b3ee">--}}
                {{--<div class="row">--}}


                <div class="col-11 col-lg-12 my-4">
                    <div class="card back-color-purple">
                        <div class="card-body">
                            <h6 class="font-primary-700b text-center">NEXT TOURNAMENT</h6>
                        </div>
                        <img class="card-img" src="{{URL::asset('storage/overwatch-3.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-body text-center back-color-purple-grad">
                            <a href="#" class="card-link">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-11 col-lg-12 my-4">
                    <div class="card back-color-red">
                        <div class="card-body">
                            <h6 class="font-primary-700b text-center">NEXT TOURNAMENT</h6>
                            <img class="dgl-card-img" src="{{URL::asset('storage/DGLCrownWhite.svg')}}" alt="Card image cap">
                        </div>

                        <div class="card-body text-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        </div>
                        <div class="card-body text-center back-color-red-grad">
                            <a href="#" class="card-link">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row main -->
@endsection