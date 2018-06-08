<html>
  <head>
    <title>DAGAMELEAGUE -  Error 404</title>

    <style>
      @font-face {
        font-family: 'FuturaMedium';
        src: url('/fonts/FuturaLT-Bold.ttf');
        font-weight: normal;
        font-style: normal;
      }
      body{
      font-size: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      }

      h1{
        font-size: 2.6em;
      }
      p{
        font-size: 1em;
      }
      h1, p{

        font-family: FuturaMedium, Helvetica, Arial;
        text-align: center;
      }
      img{
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

    </style>

  </head>
  <body>
  <div>
    <img id="image" style="height: 50%">
    <h1>404</h1>
    <p>Oops : Nothing to see here.</p>
  </div>
  <script type="text/javascript">
      var imageURLs = [
          "{{URL::asset('storage/wd5.gif')}}",
          "{{URL::asset('storage/wd2.gif')}}"

      ];


      var randomIndex = Math.floor(Math.random() * imageURLs.length);
      document.querySelector('#image').src = imageURLs[randomIndex];
  </script>
  </body>
</html>
