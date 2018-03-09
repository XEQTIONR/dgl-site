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
<div class="row justify-content-center top-banner">
  Professional Esports Leagues and Tournaments
</div>
<div class="row justify-content-center align-items-end no-gutters">
  <div class="col-2 col-sm-1 offset-sm-1 col-md-1 offset-md-1" style="">
    <div class="title-banner-img-container">
      <img class="title-banner-img" src="{{URL::asset('storage/DGLCrownPrimary.svg')}}" />
    </div>
  </div>
  <div class="col">
      <h3 class="regular">ĐAGAMELEAGUE</h3>
  </div>
</div>
<div class="row main-menu">
  <div class="col-1">
  </div>
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