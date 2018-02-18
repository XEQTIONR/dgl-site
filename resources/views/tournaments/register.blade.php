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
  <style>
    .visible{
      /**visibility : visible;*/
      display: inherit;
    }
    .hidden{
      /**visibility: hidden;*/
      display: none;
    }
  </style>

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
            <div v-bind:class="[{'visible' : !isActive(gamer)}, {'hidden' : isActive(gamer)}, 'col-md-10']" >

              Email Address OR DGLusername <input type="text" v-bind:name="'gamer['+ gamer.sl +']'" v-on:change="getGamer(gamer)" v-model="gamer.alias" v-bind:id="gamer.sl">

            </div>
            <div v-bind:class="[{'visible' : isActive(gamer)}, {'hidden' : !isActive(gamer)}, 'col-md-10']" style="background-color: #AAA;">
              <span id="span">@{{gamer.fname+" "+gamer.lname}}</span><br>
              <button type="button" v-on:click="unsetGamer(gamer)">Kick</button>
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
          {sl: "{{$i}}", fname : "", lname : "", email: "", alias:null, status : "init"},
          @endfor
          ]

    };

    var app = new Vue({
        el: '#app',
        data: data,
        methods: {
            isActive: function(gamer){

                if((gamer.status=='init')||(gamer.status=='undefined'))
                    return false;
                if(gamer.status=='ok')
                    return true;
            },
            unsetGamer: function(gamer){
                let sl = gamer.sl;
                app.gamers[sl].fname= "";
                app.gamers[sl].lname = "";
                app.gamers[sl].email = "";
                app.gamers[sl].alias = null;
                app.gamers[sl].status = "init";
            },
            getGamer: function(input){

                let sl = input.sl;
                //Update the gamer based on the alias change that just occurred.
                axios.get('/gamers/'+input.alias).then( function(response) {

                    var gamer = response.data;

                    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    let is_email = re.test(gamer);
                    // NOTE : app.gamers[sl] =  gamer -- causes view updates to fail (model still updates).. WTF?
                    //these return undefined if not found.
                    if(is_email)  // NEW UNREGISTERED gamer
                    {
                        //console.log("NEW UNREGISTERED GAMER: " + gamer);
                        app.gamers[sl].status = "new";
                        app.gamers[sl].fname = null;
                        app.gamers[sl].lname = null;
                        app.gamers[sl].email = gamer;

                    }
                    else // REGISTERED gamer FOUND
                    {

                        app.gamers[sl].alias = gamer.alias;
                        app.gamers[sl].fname = gamer.fname;
                        app.gamers[sl].lname = gamer.lname;
                        app.gamers[sl].email = gamer.email;

                        if ((gamer.fname != undefined) && (gamer.lname != undefined) && (gamer.email != undefined)) {
                            app.gamers[sl].status = "ok";

                        }
                        else// gamer was not found
                        {
                            app.gamers[sl].status = "undefined";
                            app.gamers[sl].fname = "";
                            app.gamers[sl].lname = "";
                            app.gamers[sl].email = "";
                            app.gamers[sl].alias = null;

                            document.getElementById(sl).focus();
                        }
                    }
                    //this is not the same instance as app.gamers[sl]

                } );

            }
        }

    });
</script>
</body>
</html>
