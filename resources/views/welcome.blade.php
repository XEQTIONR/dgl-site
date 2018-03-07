<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DaGameLeague - DGLcore.com</title>

        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,400i,700,700i" rel="stylesheet">
        <!--Stylesheet-->
        <link rel="stylesheet" href="/css/app.css">
        <!--JQuery-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!--Font Awesome-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            @include('partials.header')
            <div class="row banner-background" style="background-color: pink">
                <div class="col-lg-10 offset-lg-1" style="background-color: orange">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to=""></li>
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
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{URL::asset('storage/2.jpg')}}" alt="Fouth slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>DA* League</h5>
                                <p>1st division DOTA2 League</p>
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
                <div class="col-md-8" style="border: 1px solid pink">
                    <div class="row main-content">
                        <div class="col-12">
                            <div class="row main-content-heading">
                                <div class="col-12">
                                    <h2>LATEST</h2>
                                </div>
                            </div>
                            <div class="row main-content-posts">
                                <div class="col-12">
                                    <div class="row post-body" style="margin-top : 10px">
                                        <div class="col-4">
                                            <img class="img-fluid" src="{{URL::asset('storage/2.jpg')}}">
                                        </div>
                                        <div class="col-8">
                                            <h3>The title of the post</h3>
                                            <p>The excerpt of the post</p>
                                        </div>
                                    </div>
                                    <div class="row post-body" style="margin-top : 10px">
                                        <div class="col-4">
                                            <img class="img-fluid" src="{{URL::asset('storage/1.jpg')}}">
                                        </div>
                                        <div class="col-8">
                                            <h3>The title2 of the post</h3>
                                            <p>The excerpt2 of the post</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2" style="border: 1px solid black">
                    <div class="row main-sidebar">
                        {{--<div class="col-12" style="background-color: #00b3ee">--}}
                            {{--<div class="row">--}}
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                          <h6 class="text-center">NEXT TOURNAMENT</h6>
                                        </div>
                                        <img class="card-img" src="{{URL::asset('storage/2.jpg')}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            {{--</div>--}}



                        {{--</div>--}}
                    </div>
                </div>
            </div><!-- row main -->
            <div class="row justify-content-center footer">
                <div class="col-md-7">
                    <div class="row footer-text">
                        <div class="col-12">
                            <h2>DAGAMELEAGUE</h2>
                            <h2>DGLcore.com</h2>
                            <p>All rights reserved</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row footer-img">

                    </div>
                </div>
            </div>


            <script src="/js/app.js"></script>
        </div> <!--container-fluid-->
    </body>
</html>
