@extends('layouts.main')
@section('body-section')
    <div class="row banner-background">
        <div class="col-lg-10 offset-lg-1 no-horizontal-padding">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{URL::asset('storage/1.jpg')}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>DGL Faceoff 5</h5>
                            <p>DOTA 2 tournament</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{URL::asset('storage/2.jpg')}}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>DA* League</h5>
                            <p>1st division DOTA2 League</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{URL::asset('storage/3.jpg')}}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Overpowered</h5>
                            <p>Overwatch tournament</p>
                        </div>
                    </div>
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
    <div class="row justify-content-center main">
        <div class="col-11 col-md-10 col-lg-8">
            <div class="row main-content">
                <div class="col-12">
                    <div class="row main-content-heading mt-4 mb-0">
                        <div class="col-12">
                            <h1 class="font-primary-color">LATEST</h1>
                        </div>
                    </div>
                    <div class="row main-content-posts justify-content-center">
                        <div class="col-12">
                            <!-- div for small screens -->
                            <div class="row post-body my-5 d-block d-sm-block d-md-none">
                                <div class="col-12">
                                    <div class="thumbnail thumbnail-rect-smscreen">
                                    <img class="mt-3" src="{{URL::asset('storage/2.jpg')}}">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <a class="post-link" href="">
                                        <h3 class="post-title mt-3">The title of the post</h3>
                                    </a>
                                    <p>Lorem ipsum dolor amet roof party yuccie everyday carry tumeric artisan semiotics beard hammock kombucha ugh portland craft beer. Man bun mlkshk yuccie meggings cred deep v austin. Drinking vinegar man bun snackwave cliche, fixie meh health goth intelligentsia.</p>
                                </div>
                            </div>
                            <div class="row post-body my-5 d-block d-sm-block d-md-none">
                                <div class="col-12">
                                    <div class="thumbnail thumbnail-rect-smscreen">
                                        <img class="mt-3" src="{{URL::asset('storage/2.jpg')}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a class="post-link" href="">
                                        <h3 class="post-title mt-3">DA* League 2018 IS HERE.</h3>
                                    </a>
                                    <p>Lorem ipsum dolor amet roof party yuccie everyday carry tumeric artisan semiotics beard hammock kombucha ugh portland craft beer. Man bun mlkshk yuccie meggings cred deep v austin. Drinking vinegar man bun snackwave cliche, fixie meh health goth intelligentsia.</p>
                                </div>
                            </div>
                            <!-- div for large screens -->
                            <div class="row post-body mb-5 d-none d-md-flex ml-xl-1">
                                <div class="col-4">
                                    <div class="thumbnail thumbnail-rect">
                                        <img class="mt-3" src="{{URL::asset('storage/1.jpg')}}">
                                    </div>
                                </div>
                                <div class="col-8 col-lg-7">
                                    <a class="post-link" href="">
                                        <h2 class="post-title mt-3">The title of the post</h2>
                                    </a>
                                    <p>Lorem ipsum dolor amet roof party yuccie everyday carry tumeric artisan semiotics beard hammock kombucha ugh portland craft beer. Man bun mlkshk yuccie meggings cred deep v austin. Drinking vinegar man bun snackwave cliche, fixie meh health goth intelligentsia.</p>
                                </div>
                            </div>
                            <div class="row post-body mb-5 d-none d-md-flex ml-xl-1">
                                <div class="col-4">
                                    <div class="thumbnail thumbnail-rect">
                                        <img class="mt-3" src="{{URL::asset('storage/1.jpg')}}">
                                    </div>
                                </div>
                                <div class="col-8 col-lg-7">
                                    <a class="post-link" href="">
                                        <h2 class="post-title mt-3">DA* League 2018 IS HERE.</h2>
                                    </a>
                                    <p>Lorem ipsum dolor amet roof party yuccie everyday carry tumeric artisan semiotics beard hammock kombucha ugh portland craft beer. Man bun mlkshk yuccie meggings cred deep v austin. Drinking vinegar man bun snackwave cliche, fixie meh health goth intelligentsia.</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row main-content-posts-->
                    <div class="row justify-content-center" >
                        <div class="col-2">
                            <a id="moreButton" href="">
                                <div class="row justify-content-center">
                                <span>More</span>
                                </div>
                                <div class="row  justify-content-center">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-xl-2">
            <div class="row main-sidebar justify-content-center my-1">
                {{--<div class="col-12" style="background-color: #00b3ee">--}}
                {{--<div class="row">--}}


                <div class="col-11 col-lg-12 my-4">
                    <div class="card back-color-orange">
                        <div class="card-body">
                            <h6 class="font-primary-700b text-center">NEXT TOURNAMENT</h6>
                        </div>
                        <img class="card-img" src="{{URL::asset('storage/2.jpg')}}" alt="Card image cap">
                        <div class="card-body back-color-orange">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-body text-center back-color-orange-hover">
                            <a href="#" class="card-link">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-11 col-lg-12 my-4">
                    <div class="card back-color-primary">
                        <div class="card-body">
                            <h6 class="font-primary-700b text-center">NEXT TOURNAMENT</h6>
                            <img class="dgl-card-img" src="{{URL::asset('storage/DGLCrownWhite.svg')}}" alt="Card image cap">
                        </div>

                        <div class="card-body text-center">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        </div>
                        <div class="card-body text-center back-color-primary-hover">
                            <a href="#" class="card-link">Go somewhere</a>
                        </div>
                    </div>
                </div>
                {{--</div>--}}



                {{--</div>--}}
            </div>
        </div>
    </div><!-- row main -->
@endsection