{{--
 * Copyright 2018 DAGAMELEAGUE

 ____    ___  __
(  _ \  / __)(  )
 )(_) )( (_-. )(__  / _/ _ \ '_/ -_)_/ _/ _ \ '  \
(____/  \___/(____) \__\___/_| \___(_)__\___/_|_|_|

@author XEQTIONR
@template register
--}}
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

<div class="row">
  <div class="col-12">
    <h1 class="font-primary-color py-3">Registration</h1>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col-12" >

    <form method="POST" action="/tournaments/{{$tournament->id}}/register" class="team-registration">
      {{csrf_field()}}
      <div id="app">
        <div class="form-group">
          <label for="teamName">Team Name</label>
          <input type="text" name="name" class="form-control" id="teamName">
        </div>
        <div class="form-group">
          <label for="teamTag">Team Tag</label>
          <div class="col-2 pl-0">
          <input type="text" name="tag" class="form-control" id="teamTag">
          </div>
        </div>

        <ol class="list-group">
          <li  v-for="gamer in gamers" v-bind:class="[{'list-group-item-primary' : isOK(gamer), 'list-group-item-gray' : isNew(gamer)}, 'list-group-item']">
            <div class="row">
              <div v-bind:class="[{'visible' : !isRegistered(gamer)&&!isNew(gamer)}, {'hidden' : isRegistered(gamer)||isNew(gamer)}, 'col-12']" >
                <div class="row" style="width :100%"> {{--Need this CSS hack--}}
                  <label class="col-12 col-md-6 col-form-label">Email Address OR DGLusername </label>
                  <div class="col-12 col-md-6">
                    <input type="text" v-bind:name="'gamer['+ gamer.sl +']'" v-on:change="getGamer(gamer)" v-model="gamer.alias" v-bind:id="gamer.sl">
                  </div>
                  {{--<div v-if="gamer.captain === 'true'" class="col-1">--}}
                    {{--<span>captain</span>--}}
                  {{--</div>--}}
                </div>
              </div>

              <!-- hidden divs-->
              <div v-bind:class="[{'visible' : isRegistered(gamer)}, {'hidden' : !isRegistered(gamer)}, 'col-md-10']">
                <div class="col-5">
                  <span>@{{gamer.fname+" "+gamer.lname}}</span>
                </div>
                <div class="col-6 ">
                  <span>@{{gamer.alias}}</span>
                </div>
                <div class="col-1">
                  <button class="btn btn-danger btn-sm" type="button" v-on:click="unsetGamer(gamer)">Kick</button>
                </div>
              </div>
              <div v-bind:class="[{'visible' : isNew(gamer)}, {'hidden' : !isNew(gamer)}, 'col-md-10']">
                <div class="col-5">
                <span id="span">@{{gamer.email}}</span>
                </div>
                <div class="col-6">
                  This person will be emailed an invite
                to DGL and to your team for
                this tournament.
                </div>
                <div class="col-1">
                  <button class="btn btn-danger btn-sm" type="button" v-on:click="unsetGamer(gamer)">Kick</button>
                </div>
              </div>

            </div>
          </li>
        </ol>

        <div class="form-check mt-5">
          <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option2 ">
          <label class="form-check-label" for="exampleRadios1">
            I confirm that I have read and understood the rules and regulations of the tournament. I understand that if I am in violation of these rules, I or my team maybe disqualified from the tournament and/or banned from DGL.
          </label>
        </div>
      </div>
      <br>
      <button  class="btn btn-outline-dgl" type="submit" value="submit">Submit</button>
    </form>


  </div>  <!-- col -->
</div>    <!--row-->

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>

<script>
    let data = {
          gamers:[
          {sl: "0", captain : "true", fname : "", lname : "", email : "", alias : null, status : "init"},
          @for($i=1; $i<$tournament->squadsize; $i++)
          {sl: "{{$i}}", captain : "false", fname : "", lname : "", email : "", alias : null, status : "init"},
          @endfor
          ]

    };

    var app = new Vue({
        el: '#app',
        data: data,
        methods: {
            isRegistered: function(gamer){

                if((gamer.status=='init')||(gamer.status=='undefined')||(gamer.status=='new'))
                    return false;
                if(gamer.status=='ok')
                    return true;
            },
            isNew: function (gamer) {
              if(gamer.status=='new')
                  return true;
              return false;
            },
            isOK: function(gamer){
                 if(gamer.status=='ok')
                     return true;
                return false;
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
                axios.get('/tournaments/'+input.alias+"/{{$tournament->id}}").then( function(response) {

                    var gamer = response.data;

                    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    let is_email = re.test(gamer);
                    // NOTE : app.gamers[sl] =  gamer -- causes view updates to fail (model still updates).. WTF?
                    //these return undefined if not found.
                    if(response.data == "already-registered")
                    {
                        alert("This gamer has already registered for another team in this tournament.");
                        app.gamers[sl].status = "undefined";
                        app.gamers[sl].fname = "";
                        app.gamers[sl].lname = "";
                        app.gamers[sl].email = "";
                        app.gamers[sl].alias = null;
                        document.getElementById(sl).focus();
                    }
                    else if(response.data == "gamer-unverified")
                    {
                        alert("Cannot add a gamer who has not verified their email address.");
                        app.gamers[sl].status = "undefined";
                        app.gamers[sl].fname = "";
                        app.gamers[sl].lname = "";
                        app.gamers[sl].email = "";
                        app.gamers[sl].alias = null;
                        document.getElementById(sl).focus();
                    }
                    else if(is_email)  // NEW UNREGISTERED gamer
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