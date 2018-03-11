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
<div class="row justify-content-center top-banner d-none d-lg-block">
 <h6 class="text-center font-primary-700b">Professional Esports Leagues and Tournaments</h6>
</div>

<div class="row justify-content-center align-items-end no-gutters">
  <div class="col offset-sm-1 offset-md-1 d-none d-lg-block" style="">
    <div class="title-banner-img-container">
      <img class="title-banner-img" style="vertical-align: baseline " src="{{URL::asset('storage/DGLCrownPrimary.svg')}}" />
    </div>
  </div>
  <div class="col-10 mb-4 d-none d-xl-block">
      <h2 class="font-primary-700bi">ĐAGAMELEAGUE</h2>
  </div>
  <div class="col-10 mb-3 d-none d-lg-block d-xl-none">
    <h2 class="font-primary-700bi">ĐAGAMELEAGUE</h2>
  </div>
  <div class="col-12 d-lg-none">
    <div class="row justify-content-center" id="alertBannerTop">
      <div class="col-3 col-sm-2 my-3">
        <img class="title-banner-img" style="vertical-align: baseline " src="{{URL::asset('storage/DGLCrownGray.svg')}}" />
      </div>
    </div>
  </div>
</div>
<div class="row justify-content-center navbar-dgl-background">
  <div class="col-lg-10">
    <nav class="navbar navbar-expand-md navbar-dgl">
      <button class="navbar-toggler lightgray-border" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
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
          <li class="nav-item">
            <a href="/about" class="nav-link" href="#">about us</a>
          </li>
        </ul>
        @if(Auth::guest())
          <span class="">
            <a href="{{  route('login')  }}" class="nav-link">
              <i class="fas fa-sign-in-alt"></i>
              sign in
            </a>
          </span>
          <span class="">
            <a href="{{  route('register')  }}" class="nav-link">
              <i class="fas fa-user-plus"></i>
              register
            </a>
          </span>
        @else
          <span>
          <a href="{{ route('logout') }}" class="nav-link"
             onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            logout
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </span>
        @endif
      </div>
    </nav>
  </div>
</div>