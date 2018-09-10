<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DaGameLeague | DGLcore.com | Pro Bangladeshi Esports Tournaments and Leagues</title>

  <meta name="description" content="Bangladesh's first ever multiplayer gaming / esports community. Professional online esports tournaments and leagues. Go Pro Now. DOTA 2 | Overwatch">
  <!--Fonts-->
  {{--<link href="https://fonts.googleapis.com/css?family=Titillium+Web:400|Barlow+Condensed:700|Lato:400,400i,700,700i" rel="stylesheet">--}}
  <link href="https://fonts.googleapis.com/css?family=Muli:600,800|Montserrat:700" rel="stylesheet">
  {{--<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">--}}
  <!--Stylesheet-->
  <link rel="stylesheet" href="/css/app.css">
  <!--JQuery-->
  {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
  <!--Font Awesome-->
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


  <!--Facebook Pixel code -->
  <!-- Facebook Pixel Code -->
  @if(config('app.env') == 'production')
  <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '959901537498595');
      fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id=959901537498595&ev=PageView&noscript=1"
    /></noscript>
  <!-- End Facebook Pixel Code -->
  @endif

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
