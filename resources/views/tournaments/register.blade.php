<div class="row tournament-row register-row" >
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
  <div class="col-12" >
    <h1 class="font-white py-3">Registration</h1>
  </div>
</div>



    <div class="row tournament-row register-row justify-content-md-center mb-5">
      <div class="col-12" >

        @if(Auth::check())
          @if(Auth::user()->status == 'suspended')
            <div class="row justify-content-center">
              <div class="col-10">
                <h3 class="font-gray">SUSPENDED</h3>
                <p class="font-white">Look who it is. Looks like you are suspended. You can't participate in any DGL tournaments until your
                  punishment period is over.</p>
              </div>
            </div>
          @elseif(is_null(Auth::user()->discordid))
            <div class="row justify-content-center">
              <div class="col-10">
                <h3 class="font-gray">DISCORD ID REQUIRED</h3>
                <p class="font-white">You need to verify your discord id with us before you can register.</p>
                <a href="/discord-oauth" class="btn btn-primary mt-3 mb-5" style="background-color: #7289DA; color: #FFF;">
                  <img src="{{URL::asset('storage/Discord-Logo-White.svg')}}" width="50" alt="Discord Logo">
                  Setup Discord
                </a>
              </div>
            </div>
          @elseif($tournament->esport->platform->slug == config('social.steam_slug') && is_null(Auth::user()->steamid))
            <div class="row justify-content-center">
              <div class="col-10">
                <h3 class="font-gray">STEAM ID REQUIRED</h3>
                <p class="font-white">You need to register your steam id with us before you can perform this action.
                You can do it in the settings page.</p>
              </div>
            </div>
          @elseif($tournament->esport->platform->slug == config('social.battlenet_slug') && is_null(Auth::user()->battlenetid))
            <div class="row justify-content-center">
              <div class="col-10">
                <h3 class="font-gray">BATTLE TAG REQUIRED</h3>
                <p class="font-white">You need to register your BattleTag with us before you can perform this action.
                  You can do it in the settings page.</p>
              </div>
            </div>
          @elseif(Auth::user()->status == 'normal' ||  Auth::user()->status == 'other')
            <?php
              $ids = array();

              foreach($tournament->contenders as $team)
              {
                array_push($ids, $team->id);
              }

              $rosters = DB::table('rosters')
                                ->whereIn('contending_team_id', $ids)
                                ->where('gamer_id', Auth::id())
                                ->where('status', 'ok')
                                ->get();
              if(!count($rosters)>0) :
            ?>
              <form  id="app" @submit="validation" method="POST" enctype="multipart/form-data" action="/tournaments/{{$tournament->id}}/register" class="team-registration">
                {{csrf_field()}}
                <div>
                  <div class="form-group">
                    <label for="teamName">Team Name</label>
                    <input v-on:input="checkName" v-model="name" type="text" name="name" class="form-control" id="teamName" placeholder="Max 25 characters">
                  </div>
                  <div class="form-group">
                    <label for="teamTag">Team Tag</label>
                    <div class="col-2 pl-0">
                      <input v-on:input="checkTag" v-model="tag" type="text" name="tag" class="form-control" id="teamTag" placeholder="Max 5 characters.">
                    </div>
                  </div>
                  <div class="form-group mt-4 mb-1">
                    <label for="images">Clan Logos</label> <br>
                    <label for="images"><small>You can use JPEG/JPG or PNG images. PNG is recommended becuase it can use transparent backgrounds.</small></label>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <div v-if="!image300">
                          <h5 class="font-primary-color">Select a 300 x 300 image</h5>
                        </div>
                        <div v-else>
                          <div class="row my-0 justify-content-center">
                            <span class="font-primary-color">300 x 300</span>
                          </div>
                          <div class="row mt-1 justify-content-center">
                            <img :src="image300" width="300" height="300" style="border: 1px solid #6ACC5C" alt="300 pixel esports team logo image"/>
                          </div>
                          <div class="row mt-2 justify-content-center">
                            <button class="btn btn-danger" @click="removeImage300">Remove image</button>
                          </div>
                        </div>
                        <input type="file" name="img300" @change="onFileChange" id="img300Input" v-bind:class="[{'visible' : !image300}, {'hidden' : image300}]">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <div v-if="!image100">
                          <h5 class="font-primary-color">Select a 50 x 50 image</h5>
                        </div>
                        <div v-else>
                          <div class="row my-0 justify-content-center">
                            <span class="font-primary-color" style="margin-top: 125px;">50 x 50</span>
                          </div>
                          <div class="row mt-1 justify-content-center">
                            <img :src="image100" width="50" height="50" style="margin-top: 0px; margin-bottom: 125px;border: 1px solid #6ACC5C;" alt="50 pixel esports team logo image"/>
                          </div>
                          <div class="row mt-2 justify-content-center">
                            <button class="btn btn-danger" @click="removeImage100">Remove image</button>
                          </div>
                        </div>
                        <input type="file" name="img100" @change="onFileChange2" id="img100Input" v-bind:class="[{'visible' : !image100}, {'hidden' : image100}]">
                      </div>
                    </div></div>
                  <div class="form-group mt-4 mb-1">
                    <label for="roster">Team Roster</label>
                    <label for="roster"><small>You are the team captain</small></label>
                  </div>
                  <ol class="list-group">
                    <li  v-for="(gamer, index) in gamers" v-bind:class="[{'list-group-item-primary' : isOK(gamer) && (gamer.captain=='false'), 'list-group-item-captain' : isOK(gamer) && (gamer.captain=='true'), 'list-group-item-gray' : isNew(gamer)}, 'list-group-item']">
                      <div class="row">
                        <div v-bind:class="[{'visible' : !isRegistered(gamer)&&!isNew(gamer)}, {'hidden' : isRegistered(gamer)||isNew(gamer)}, 'col-12']" >
                          <div class="row" style="width :100%"> {{--Need this CSS hack--}}
                            <label class="col-12 col-md-6 col-form-label">Email Address OR DGLusername </label>
                            <div class="col-12 col-md-6">
                              <input type="text" class="form-control" v-bind:name="'gamer['+ gamer.sl +']'" v-on:change="getGamer(gamer)" v-model="gamer.alias" v-bind:id="gamer.sl">
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
                            <button v-if="index!=0" class="btn btn-danger btn-sm" type="button" v-on:click="unsetGamer(gamer)">
                              <i class="fas fa-trash-alt"></i>
                              Kick
                            </button>
                            <span v-else class=" btn-sm bg-purple">CAPTAIN</span>
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
                            <button class="btn btn-danger btn-sm" type="button" v-on:click="unsetGamer(gamer)">
                              <i class="fas fa-trash-alt"></i>
                              Kick
                            </button>
                          </div>
                        </div>

                      </div>
                    </li>
                  </ol>

                  <div v-if="gamers_on_team < team_size" class="w-100 my-2">
                    <span class="font-white">Atleast</span> <span class="font-white">@{{team_size-gamers_on_team}}</span> <span class="font-white">more teammates needed</span>
                  </div>
                  <div v-else class="w-100 my-2">
                    <span class="font-primary-color">You have enough teammates</span>
                  </div>

                  @if( $tournament->squadsize > $tournament->esport->teamsize )
                  <div v-if="gamers_on_team < squad_size" class="w-100 my-2">
                    <span class="font-white">Upto</span> <span class="font-white">@{{gamers_on_team < team_size ? squad_size - team_size : squad_size-gamers_on_team }}</span> <span class="font-white">more subs</span>
                  </div>
                  <div v-else class="w-100 my-2">
                    <span class="font-red">Team Full</span>
                  </div>
                  @endif
                  <div class="form-check mt-5">
                    <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" v-model="confirm">
                    <label class="form-check-label" for="exampleRadios1">
                      I confirm that I have read and understood the rules and regulations of the tournament. I understand that if I am in violation of these rules, I or my team maybe disqualified from the tournament and/or banned from DGL.
                    </label>
                  </div>
                  <div v-if="errors.length" class="w-100 mt-3">
                    <ul v-for="error in errors">
                      <li class="font-red">@{{error}}</li>
                    </ul>
                  </div>
                </div>

                <br>

                <button  class="btn btn-outline-dgl" type="submit" value="submit">Submit</button>
              </form>
            <?php else : ?>
              <h1 class="font-white">You are already registered for this tournament.</h1>
            <?php endif; ?>
          @else
            <div class="row justify-content-center">
              <div class="col-10">
                <h3 class="font-gray">NOT VERIFIED</h3>

                <p class="font-white">Hey there sharpshooter, looks like you haven't verified your email address, yet. We sent you a
                  verification email when you registered. Looks like you missed it.
                </p>
                <p class="font-white">
                  Check in your spam folder if its not in your inbox. If that fails go to your profile and request another one.
                </p>
              </div>
            </div>
          @endif
        @else
          <h3 class="font-gray">You must be logged in in order to view this content.</h3>
          <a href="/tournament/login/{{$tournament->id}}" class="btn  btn-success btn-large my-3">SIGN IN</a>
        @endif
      </div>  <!-- col -->
      {{--<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>--}}
      <script src="/js/vue.min.js"></script>
      <script>
          let data = {
              name: "",
              tag: "",
              gamers:[
                  @if(Auth::user())
                  {sl: "0", captain : "true", fname : "{{Auth::user()->fname}}", lname : "{{Auth::user()->lname}}", email : "{{Auth::user()->email}}", alias : "{{Auth::user()->alias}}", status : "ok"},
                  @else
                  {sl: "0", captain : "true", fname : "", lname : "", email : "", alias : "", status : "init"},
                  @endif
                  @for($i=1; $i<$tournament->squadsize; $i++)
                  {sl: "{{$i}}", captain : "false", fname : "", lname : "", email : "", alias : null, status : "init"},
                  @endfor
              ],
              image100: '',
              image300: '',
              confirm: false,
              errors: [],
              gamers_on_team: 1,
              team_size: {{$tournament->esport->teamsize}},
              squad_size: {{$tournament->squadsize}}
              //verified_gamers: 0,
              //verified_log0s: false
          };

          var app = new Vue({
              el: '#app',
              data: data,
              methods: {

                  onFileChange(e) {
                      var files = e.target.files || e.dataTransfer.files;
                      if (!files.length)
                          return;
                      this.createImage300(files[0]);
                  },
                  createImage300(file) {
                      //alert(file["type"]);
                      //if(file["type"]=="image/png")
                      //{
                      var image = new Image();
                      var reader = new FileReader();
                      var vm = this;

                      var _URL = window.URL || window.webkitURL;

                      reader.onload = (e) => {
                          vm.image300 = e.target.result;

                          image.src = _URL.createObjectURL(file);

                          console.log('file type2');
                          console.log(file["type"]);

                          if(!(file["type"]=="image/png" || file["type"]=="image/jpeg"))
                          {
                              alert("Image uploaded must be a PNG or JPG file.");
                              vm.image300 ='';
                              var input = document.getElementById("img300Input");
                              input.value = "";
                          }
                          else
                            image.onload = function(){
                                if(this.width!=300||this.height!=300)
                                {
                                    alert("Image uploaded of size 300px x 300px."+
                                        " Image uploaded is "+this.width+"px x "+ this.height + "px.");
                                    vm.image300 ='';
                                    var input = document.getElementById("img300Input");
                                    input.value = "";
                                }
                            };
                      };
                      reader.readAsDataURL(file);
                  },
                  removeImage300: function (e) {
                      e.preventDefault();
                      this.image300 = '';
                      var input = document.getElementById("img300Input");
                      input.value = "";
                  },

                  onFileChange2(e) {
                      var files = e.target.files || e.dataTransfer.files;
                      if (!files.length)
                          return;
                      this.createImage100(files[0]);
                  },

                  createImage100(file) {
                      var image = new Image();
                      var reader = new FileReader();
                      var vm = this;

                      var _URL = window.URL || window.webkitURL;
                      reader.onload = (e) => {
                          vm.image100 = e.target.result;

                          image.src = _URL.createObjectURL(file);

                          if(!(file["type"]=="image/png" || file["type"]=="image/jpeg"))
                          {
                              alert("Image uploaded must be a PNG or JPG file.");
                              vm.image100 ='';
                              var input = document.getElementById("img100Input");
                              input.value = "";
                          }
                          else
                            image.onload = function(){
                                if(this.width!=50||this.height!=50)
                                {
                                    alert("Image uploaded of size 50px x 50px."+
                                        " Image uploaded is "+this.width+"px x "+ this.height + "px.");
                                    vm.image100 ='';
                                    var input = document.getElementById("img100Input");
                                    input.value = "";
                                }
                            }
                      };
                      reader.readAsDataURL(file);
                  },

                  removeImage100: function (e) {
                      e.preventDefault();
                      this.image100 = '';
                      var input = document.getElementById("img100Input");
                      input.value = "";
                  },

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
                      var sl = gamer.sl;

                          app.gamers[sl].fname= "";
                          app.gamers[sl].lname = "";
                          app.gamers[sl].email = "";
                          app.gamers[sl].alias = null;
                          app.gamers[sl].status = "init";

                      app.gamers_on_team--;
                  },
                  getGamer: function(input){

                      let sl = input.sl;
                      app.gamers[sl].status = "searching";
                      //Update the gamer based on the alias change that just occurred.
                      axios.get('/tournaments/'+input.alias+"/{{$tournament->id}}").then( function(response) {

                          var gamer = response.data;

                          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                          let is_email = re.test(gamer);
                          // NOTE : app.gamers[sl] =  gamer -- causes view updates to fail (model still updates).. WTF?
                          //these return undefined if not found.
                          console.log('response.data');
                          console.log(response.data);
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
                          else if(response.data == "no-discord")
                          {
                              alert("This teammate needs to provide us their Discord ID on the Settings page before they can be recruited.");
                              app.gamers[sl].status = "undefined";
                              app.gamers[sl].fname = "";
                              app.gamers[sl].lname = "";
                              app.gamers[sl].email = "";
                              app.gamers[sl].alias = null;
                              document.getElementById(sl).focus();
                          }

                          else if(response.data == "steam-required")
                          {
                              alert("This teammate needs to provide us their STEAM ID on the Settings page before they can be recruited.");
                              app.gamers[sl].status = "undefined";
                              app.gamers[sl].fname = "";
                              app.gamers[sl].lname = "";
                              app.gamers[sl].email = "";
                              app.gamers[sl].alias = null;
                              document.getElementById(sl).focus();
                          }

                          else if(response.data == "battlenet-required")
                          {
                              alert("This teammate needs to provide us their BATTLE TAG on the Settings page before they can be recruited.");
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


                              var duplicate = false;
                              for(i=0; i<app.gamers.length; i++)
                              {
                                  if(app.gamers[i].email == gamer)
                                  {
                                      duplicate = true;
                                      break;
                                  }

                              }
                              if(duplicate)
                              {
                                  alert(gamer + " is already on your team");
                                  app.gamers[sl].status = "undefined";
                                  app.gamers[sl].fname = "";
                                  app.gamers[sl].lname = "";
                                  app.gamers[sl].email = "";
                                  app.gamers[sl].alias = null;
                                  document.getElementById(sl).focus();
                              }
                              else
                              {
                                  app.gamers[sl].status = "new";
                                  app.gamers[sl].fname = null;
                                  app.gamers[sl].lname = null;
                                  app.gamers[sl].email = gamer;
                                  app.gamers_on_team++;
                              }

                          }
                          else // REGISTERED gamer FOUND
                          {
                              var duplicate = false;
                              for(i=0; i<app.gamers.length; i++)
                              {
                                  if(app.gamers[i].email == gamer.email)
                                  {
                                      duplicate = true;
                                      break;
                                  }

                              }
                              if(duplicate)
                              {
                                  alert(gamer.alias + " is already on your team");
                                  app.gamers[sl].status = "undefined";
                                  app.gamers[sl].fname = "";
                                  app.gamers[sl].lname = "";
                                  app.gamers[sl].email = "";
                                  app.gamers[sl].alias = null;
                                  document.getElementById(sl).focus();
                              }
                              else{
                                  app.gamers[sl].alias = gamer.alias;
                                  app.gamers[sl].fname = gamer.fname;
                                  app.gamers[sl].lname = gamer.lname;
                                  app.gamers[sl].email = gamer.email;

                                  if ((gamer.fname != undefined) && (gamer.lname != undefined) && (gamer.email != undefined)) {
                                      app.gamers[sl].status = "ok";
                                      app.gamers_on_team++;

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
                          }
                          //this is not the same instance as app.gamers[sl]

                      } );

                  },

                  checkName: function(){
                      if(app.name.length>25);
                        app.name = app.name.substring(0, 25);
                  },
                  checkTag: function(){
                      if(app.tag.length>5);
                      app.tag = app.tag.substring(0, 5);
                  },

                  validation: function(e){
                      //console.log('validation called');
                      app.errors = [];
                      var min_gamers = app.team_size;
                      var g = 0;
                      var search = false;
                      for(var i=0; i<app.gamers.length; i++)
                      {
                          if((app.gamers[i].status=="new")||(app.gamers[i].status=="ok"))
                              g++;
                          if(app.gamers[i].status=="searching")
                              search = true;
                      }


                      if(!app.name.length)
                          app.errors.push("You need to decide on a name for your team.");

                      if(!app.tag.length)
                          app.errors.push("Your team needs a team/clan tag. It is a shorter acronym for your team.");

                      if(!(app.image300.length && app.image100.length))
                          app.errors.push("You need to upload your team logos.");

                      if(g<min_gamers)
                          app.errors.push("You need more teammates on your team.");

                      if(!app.confirm)
                          app.errors.push("You need to confirm that you agree to DGL rules and regulations.");

                      if(!app.errors.length && !search)
                          return true;

                      app.confirm = false;
                      e.preventDefault();
                  }
              }

          });
      </script>
    </div>    <!--row-->

