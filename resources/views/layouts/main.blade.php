<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DaGameLeague - DGLcore.com</title>

  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Titillium+Web:400,400i,600,700,700i,900" rel="stylesheet">

  <!--Stylesheet-->
  <link rel="stylesheet" href="/css/app.css">
  <!--JQuery-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <!--Font Awesome-->
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  @yield('header-section')

</head>
<body>
<div class="container-fluid">
  @include('partials.header')

  @yield('body-section')

  @include('partials.footer')
  @yield('footer-section')
  <script src="/js/app.js"></script>
</div> <!--container-fluid-->
</body>
</html>
