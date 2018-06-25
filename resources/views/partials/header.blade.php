{{--
  header.blade.php
  Header partial file
 * Copyright 2018 DAGAMELEAGUE
 ____    ___  __
(  _ \  / __)(  )
 )(_) )( (_-. )(__  / _/ _ \ '_/ -_)_/ _/ _ \ '  \
(____/  \___/(____) \__\___/_| \___(_)__\___/_|_|_|

  @author XEQTIONR

--}}

    <nav class="navbar navbar-dgl navbar-expand-lg fixed-top">
      <button class="navbar-toggler lightgray-border my-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-brand justify-content-center d-none d-lg-block py-2" >
      <a class=" mx-auto pl-md-5 pr-5" href="/">
        <img class="mb-2 pt-1 pb-0 py-xl-0" src="{{URL::asset('storage/DGLCrownWhite.svg')}}" width="50" class="d-block d-md-inline-block" alt="">
        <span class="d-none d-xl-inline-block navbar-text vertical-align-center dagameleague-small">ĐAGAMELEAGUE</span>
      </a>
      </div>
      <a class="d-block d-lg-none mx-auto  pr-6" href="/">
        <img src="{{URL::asset('storage/DGLCrownWhite.svg')}}" width="50" class="d-block d-md-inline-block align-text-bottom" alt="">

      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-2 mr-auto">
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

        </ul>
        @if(Auth::guest())
          <span class="">
            <a href="{{  route('login')  }}" class="nav-link">
              <i class="fas fa-sign-in-alt"></i>
              sign in
            </a>
          </span>
          <span class="mr-4">
            <a href="{{  route('register')  }}" class="nav-link">
              <i class="fas fa-user-plus"></i>
              register
            </a>
          </span>
        @else
          <span class="">
            <a href="{{  route('settings')  }}" class="nav-link">
              <i class="fas fa-cog"></i>
              settings
            </a>
          </span>
          <span class="mr-4">
          <a href="{{ route('logout') }}" class="nav-link"
             onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            sign out
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </span>
        @endif
      </div>
      <script>
            var scroll = 0;
            $(window).scroll(function(){
                if((0.00001 *$(window).scrollTop())<0.0025)
                {
                    // console.log("scrolled: " + 0.00001 * $(window).scrollTop());
                    $(".navbar").css('background-color', 'rgba(39,44,56,' + 1 / (0.01 * $(window).scrollTop()) + ')');
                }
                // else{
                //     $(".navbar").css('background-color', 'rgba(39,44,56,1)');
                // }
                // scroll = $(window).scrollTop();
            });

            $(".navbar-toggler-icon").click(function(){
                $(".navbar-dgl").css('background-color', 'rgba(39,44,56,1)');
            });

      </script>
    </nav>
  {{--</div>--}}
{{--</div>--}}