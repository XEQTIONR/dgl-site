{{--
 * Copyright 2018 DAGAMELEAGUE
 ____    ___  __
(  _ \  / __)(  )
 )(_) )( (_-. )(__  / _/ _ \ '_/ -_)_/ _/ _ \ '  \
(____/  \___/(____) \__\___/_| \___(_)__\___/_|_|_|

  @author XEQTIONR

--}}
    <div id="preHeader" class="row dgl-nav-title bg-purple3 justify-content-center">
      <div class="title-right py-1 mw w-100">
        {{--<h1 class="d-inline-block font-white text-center">DGL</h1>--}}
        @if(Auth::guest())
          <span class="my-auto d-none d-lg-inline">
        <a href="{{  route('login')  }}" class="">
          {{--<i class="fas fa-sign-in-alt"></i>--}}
          sign in
        </a>/
      </span>
          <span class="my-auto d-none d-lg-inline">
        <a href="{{  route('register')  }}" class="">
          {{--<i class="fas fa-user-plus"></i>--}}
          register
        </a>
      </span>
        @else
          <span class="my-auto d-none d-lg-inline">
        <a href="{{  route('settings')  }}" class="">
          {{--<i class="fas fa-cog"></i>--}}
          settings
        </a>/
      </span>
      <span class="my-auto d-none d-lg-inline">
      <a href="{{ route('logout') }}" class=""
         onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
        {{--<i class="fas fa-sign-out-alt"></i>--}}
        sign out
      </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </span>
        @endif
      </div>
    </div>
    <div id="Header" class="row dgl-nav-title mw">
      <div class="logo ml-5 my-0 d-block">
        <img src="{{URL::asset('storage/DGLCrownWhite.svg')}}" height="60px">
      </div>
      <div class="d-flex justify-content-start ml-0 ml-lg-5">


        {{--<div class="h-100 d-inline-block">--}}
          <div class="h-100 my-auto mr-0 d-flex align-center">
            <img class="my-auto mr-2" src="{{URL::asset('storage/icons8-trophy-cup-100.png')}}" height="40px">
          </div>
          <div class="my-auto mr-5">
            <h6 class="font-white my-0">TOURNAMENTS</h6>
            <span class="font-gray">tournaments by dgl</span>
          </div>
        <div class="h-100 my-auto mr-0 d-flex align-center">
          <img class="my-auto mr-3" src="{{URL::asset('storage/icons8-whistle-100.png')}}" height="40px">
        </div>
        <div class="my-auto mr-5">
          <h6 class="font-white my-0">MATCHES</h6>
          <span class="font-gray">matches by dgl</span>
        </div>
        <div class="h-100 my-auto mr-0 d-flex align-center">
          <img class="my-auto mr-2" src="{{URL::asset('storage/icons8-microphone-100.png')}}" height="40px">
        </div>
        <div class="my-auto mr-5">
          <h6 class="font-white my-0">BROADCASTS</h6>
          <span class="font-gray">Match Broadcasts</span>
        </div>
        {{--</div>--}}
        {{--<img src="{{URL::asset('storage/icons8-microphone-100.png')}}" height="40px">--}}

        {{--<img src="{{URL::asset('storage/icons8-whistle-100.png')}}" height="40px">--}}
      </div>

    </div>

    <nav class="navbar navbar-dgl navbar-expand-lg">
      <button class="navbar-toggler lightgray-border my-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="justify-content-center d-none d-lg-inline-block py-2">
      <a class="ml-5 pl-md-5 pr-5" href="/">
        <img class="pl-5 ml-5 small-logo mb-1 pb-0 py-xl-0 ml-auto mr-0" src="{{URL::asset('storage/DGLCrownWhite.svg')}}" height="35" class="d-block" alt="">
        {{--<span class="d-none d-xl-inline-block navbar-text vertical-align-center dagameleague-small">ĐAGAMELEAGUE</span>--}}
      </a>
      </div>
      <a class="small-logo d-lg-none mx-auto  pr-6" href="/">
        <img src="{{URL::asset('storage/DGLCrownWhite.svg')}}" height="35" class="d-block d-md-inline-block align-text-bottom" alt="">

      </a>
      <div class="collapse navbar-collapse mw" id="navbarSupportedContent">
        <ul class="navbar-nav mx-0">
          <li class="nav-item active">
            <a href="/news" class="nav-link" href="#">news<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="/tournaments" class="nav-link" href="#">tournaments</a>
          </li>
          <li class="nav-item">
            <a href="/matches" class="nav-link" href="#">matches</a>
          </li>
          <li class="nav-item">
            <a href="/teams" class="nav-link" href="#">teams</a>
          </li>
          <li class="nav-item">
            <a href="/players" class="nav-link" href="#">players</a>
          </li>
          <li class="nav-item">
            <a href="/media" class="nav-link" href="#">media</a>
          </li>
          <li class="nav-item dropdown">
            <a href="/about" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">about us</a>
            <div class="dropdown-menu back-color-purple mx-md-1" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('about')}}">About DGL</a>
              {{--<div class="dropdown-divider"></div>--}}
              <a class="dropdown-item" href="{{route('about-dateam')}}">About DaTeaM</a>
            </div>
          </li>

          {{--@if(Auth::guest())--}}
            {{--<li class="nav-item d-lg-block">--}}
            {{--<a href="{{  route('login')  }}" class="">--}}
              {{--<i class="fas fa-sign-in-alt"></i>--}}
              {{--sign in--}}
            {{--</a>/--}}
          {{--</li>--}}
            {{--<li class="nav-item  d-lg-block">--}}
            {{--<a href="{{  route('register')  }}" class="">--}}
              {{--<i class="fas fa-user-plus"></i>--}}
              {{--register--}}
            {{--</a>--}}
          {{--</li>--}}
          {{--@else--}}
            {{--<li class="nav-item d-lg-block">--}}
            {{--<a href="{{  route('settings')  }}" class="">--}}
              {{--<i class="fas fa-cog"></i>--}}
              {{--settings--}}
            {{--</a>--}}
          {{--</li>--}}
            {{--<li class="nav-item d-lg-block">--}}
          {{--<a href="{{ route('logout') }}" class=""--}}
             {{--onclick="event.preventDefault();--}}
                                {{--document.getElementById('logout-form').submit();">--}}
            {{--<i class="fas fa-sign-out-alt"></i>--}}
            {{--sign out--}}
          {{--</a>--}}
            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
              {{--{{ csrf_field() }}--}}
            {{--</form>--}}
          {{--</li>--}}
          {{--@endif--}}
          @if(Auth::guest())
            <span class="user-control mb-1">
            <a href="{{  route('login')  }}" class="">
              {{--<i class="fas fa-sign-in-alt"></i>--}}
              sign in
            </a>/
          </span>
            <span class="user-control mb-1">
            <a href="{{  route('register')  }}" class="">
              {{--<i class="fas fa-user-plus"></i>--}}
              register
            </a>
          </span>
          @else
            <span class="user-control mb-1">
            <a href="{{  route('settings')  }}" class="">
              {{--<i class="fas fa-cog"></i>--}}
              settings
            </a>/
          </span>
            <span class="user-control mb-1">
          <a href="{{ route('logout') }}" class=""
             onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
            {{--<i class="fas fa-sign-out-alt"></i>--}}
            sign out
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </span>
          @endif
        </ul>

      </div>
      <script>
        $(document).ready(function(){
            var margin = parseFloat($("#Header").height()) + parseFloat($("#preHeader").height());
            $(".navbar-dgl").css("margin-top", margin - $(window).scrollTop());

            if($(window).scrollTop()<margin)
            {
                $(".small-logo").css("display", "none");
                $(".user-control").hide();
            }
            $(window).scroll(function(){
              var scroll = $(window).scrollTop();

              if(scroll>=0 && scroll<200)
              {
                  $(".user-control").hide();
                  $(".navbar-dgl").css("margin-top", margin - scroll);

                  if($(".small-logo").css("display") != "none")
                    $(".small-logo").slideUp();
              }
              else {
                  $(".user-control").show();
                  $(".navbar-dgl").css("margin-top", "0");
                  if($(".small-logo").css("display") == "none")
                    $(".small-logo").slideDown();
              }
            });
        });

      </script>
    </nav>