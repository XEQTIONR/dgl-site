<!--
 * Copyright 2018 DAGAMELEAGUE

 ____    ___  __
(  _ \  / __)(  )
 )(_) )( (_-. )(__  / _/ _ \ '_/ -_)_/ _/ _ \ '  \
(____/  \___/(____) \__\___/_| \___(_)__\___/_|_|_|

@author XEQTIONR
@template register
-->
<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Register for {{$tournament->name}}</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Axios script -- for ajax calls -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>
<body>

<div class="container-fluid">
<div class="row justify-content-md-center">
  <div class="col-md-12 col-sm-12" style="border: 2px solid red;">
    <form method="POST" action="/tournaments/{{$tournament->id}}/register">

      {{csrf_field()}}
      <div id="app">
      Team Name <input type="text" name="name"><br>
      Team Tag <input type="text" name="tag"><br>

      <ol>
        <li v-for="gamer in gamers">
          <div class="row">
            <div class="col-md-8 col-sm-9">

              Email Address <input class="email" type="email" name="email" value="">
              OR DGLusername <input type="text" name="alias" v-on:change="getGamer(gamer)" v-model="gamer.alias">
            </div>
            <div class="col-md-4 col-sm-3">
              <span id="span">@{{gamer.fname+" "+gamer.lname}}</span><br>
            </div>
          </div>
        </li>
      </ol>

      <input type="checkbox">I confirm that I have read and understood the rules and regulations of the tournament. I understand that if I am in violation of these rules, I or my team maybe disqualified from the tournament and/or banned from DGL.
      </div>
      <br>

      <button type="submit" value="submit">Submit</button>
    </form>
  </div>  <!-- col -->
</div>    <!--row-->
</div> <!-- container -->

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>

<script>
    let data = {
          gamers:[
          @for($i=0; $i<$tournament->squadsize; $i++)
          {sl: "{{$i}}", fname : "f{{$i}}", lname : "l{{$i}}", email: "someone@example.com", alias:"a{{$i}}"},
          @endfor
          ]

    };

    var app = new Vue({
        el: '#app',
        data: data,
        methods: {
            getGamer: function(gamer){

                console.log("VALUE: "+gamer);
                let sl = gamer.sl;
                //Update the gamer based on the alias change that just occurred.
                axios.get('/gamers/'+gamer.alias).then( function(response) {

                    gamer = response.data;
                    // NOTE : app.gamers[sl] =  gamer -- causes view updates to fail (model still updates).. WTF?
                    //these return undefined if not found.
                    app.gamers[sl].fname = gamer.fname;
                    app.gamers[sl].lname = gamer.lname;
                    app.gamers[sl].dob = gamer.dob;

                    //this is not the same instance as app.gamers[sl]
                    console.log(gamer);

                } );

            }
        }

    });
</script>
</body>
</html>
