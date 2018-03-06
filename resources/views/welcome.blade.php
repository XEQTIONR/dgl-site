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
            <div class="row justify-content-center">
                Professional Esports Leagues and Tournaments
            </div>
            <div class="row justify-content-center">
                <div class="col-10" style="border: 1px solid black;">
                    DAGAMELEAGUE
                </div>
            </div>
            <div class="row main-menu">
                <div class="col-1"></div>
                <div class="col-8">
                    <ul class="nav justify-content-start">
                        <li class="nav-item"><a class="nav-link" href="/blog">news</a></li>
                        <li class="nav-item"><a class="nav-link" href="/tournaments">tournaments</a></li>
                        <li class="nav-item"><a class="nav-link" href="/matches">matches</a></li>
                        <li class="nav-item"><a class="nav-link" href="/teams">teams</a></li>
                        <li class="nav-item"><a class="nav-link" href="/players">players</a></li>
                        <li class="nav-item"><a class="nav-link" href="/media">media</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">about us</a></li>
                    </ul>
                </div>
                <div class="col">
                    <ul class="nav justify-content-end">
                        @if(Auth::guest())
                            <li class="nav-item">
                                <a href="{{  route('login')  }}" class="nav-link">
                                    <i class="fas fa-sign-in-alt"></i>
                                    sign in
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{  route('register')  }}" class="nav-link">
                                    <i class="fas fa-user-plus"></i>
                                    register
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                              <a href="{{ route('logout') }}" class="nav-link"
                              onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                  <i class="fas fa-sign-out-alt"></i>
                                  logout
                              </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                            </form>
                        @endif
                    </ul>
                </div>
                <div class="col-1"></div>
            </div> <!-- row main-menu -->
            <div class="row banner-background">
                <div class="col-lg-10 offset-lg-1">
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
                <div class="col-md-8">
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
                <div class="col-md-2">
                    <div class="row  justify-content-center main-sidebar">
                        <div class="col-12" style="background-color: #00b3ee">
                            <h5>Some widget stuff</h5>
                        </div>
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
