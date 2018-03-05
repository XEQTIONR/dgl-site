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
                <div class="col">
                    <ul class="nav justify-content-start">
                        <li class="nav-item"><a class="nav-link">news</a></li>
                        <li class="nav-item"><a class="nav-link">tournaments</a></li>
                        <li class="nav-item"><a class="nav-link">matches</a></li>
                        <li class="nav-item"><a class="nav-link">teams</a></li>
                        <li class="nav-item"><a class="nav-link">players</a></li>
                        <li class="nav-item"><a class="nav-link">media</a></li>
                        <li class="nav-item"><a class="nav-link">about us</a></li>
                    </ul>
                </div>
                <div class="col">
                    <ul class="nav justify-content-end">
                        @if(Auth::guest())
                            <li class="nav-item"><a href="{{  route('login')  }}" class="nav-link">sign in</a></li>
                            <li class="nav-item"><a href="{{  route('register')  }}" class="nav-link">register</a></li>
                        @else
                            <li class="nav-item">
                              <a href="{{ route('logout') }}" class="nav-link"
                              onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
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
            </div>
            
        {{--<script src="/js/popper.min.js"></script>--}}
        {{--<script src="/js/bootstrap.min.js"></script>--}}
        <script src="/js/app.js"></script>
    </body>
</html>
