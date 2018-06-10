<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DaGameLeague - DGLcore.com</title>

  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400|Barlow+Condensed:700" rel="stylesheet">
  {{--<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">--}}
  <!--Stylesheet-->
  <link rel="stylesheet" href="/css/app.css">
  <!--JQuery-->
  {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
  <script src="http://code.jquery.com/jquery-3.2.1.min.js" ></script>
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

  @if(Session::has('notification'))
    <script>
      toastr.options = {
          "closeButton" : true,
          "timeOut": "8000",
      }
      @if(Session::get('notification_type') == 'success')
        toastr.success("{{Session::get('notification')}}");
      @elseif(Session::get('notification_type') == 'info')
        toastr.info("{{Session::get('notification')}}");
      @elseif(Session::get('notification_type') == 'warning')
        toastr.warning("{{Session::get('notification')}}");
      @elseif(Session::get('notification_type') == 'error')
        toastr.error("{{Session::get('notification')}}");
      @endif
      @php
        Session::forget('notification');
        Session::forget('notification_type');
        Session::save();
      @endphp
    </script>
  @endif
</div> <!--container-fluid-->
</body>
</html>
