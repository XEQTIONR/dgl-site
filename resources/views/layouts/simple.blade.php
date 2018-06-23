<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DaGameLeague - DGLcore.com</title>

  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400|Barlow+Condensed:700|Lato:400,400i,700,700i" rel="stylesheet">
  <!--Stylesheet-->
  <link rel="stylesheet" href="/css/app.css">
  @yield('header-scripts')
</head>
<body style="background-color: #f9f9f9">
<div class="container">
  @yield('content')
  <div class="row justify-content-center mt-5">
  <div class="d-flex flex-column justify-content-center">
    <ul class="nav nav-simple justify-content-center">
      <li class="">
        <a href="/news" class="nav-link font-futura font-light-gray" href="#">news<span class="sr-only">(current)</span></a>
      </li>
      <li class="">
        <a href="/tournaments" class="nav-link font-futura font-light-gray" href="#">tournaments</a>
      </li>
      <li class="">
        <a href="/matches" class="nav-link font-futura font-light-gray" href="#">matches</a>
      </li>
      <li class="">
        <a href="/teams" class="nav-link font-futura font-light-gray" href="#">teams</a>
      </li>
      <li class="">
        <a href="/players" class="nav-link font-futura font-light-gray" href="#">players</a>
      </li>
      <li class="">
        <a href="/media" class="nav-link font-futura font-light-gray" href="#">media</a>
      </li>
      <li class="">
        <a href="/about-us" class="nav-link font-futura font-light-gray">about us</a>
      </li>
    </ul>
    <h3 class="text-center mt-5 font-light-gray dagameleague-med">ĐAGAMELEAGUE</h3>
  </div>
</div>
@yield('footer-scripts')
</body>
{{--</div>--}}
