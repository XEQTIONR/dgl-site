@extends('layouts.main')

@section('body-section')

<div id="settingsApp" class="row">
  <div class="back-color-purple" style="width: 301px;">
    <div class="row" style="margin-top: 75px;">
      <div class="col-12">
      <h6 class="font-white text-uppercase text-center">Settings</h6>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="list-group list-group-flush"  style="width: 301px;">
        <a href="#"
           v-on:click="changeActive('myinfo')"
           v-bind:class="{active: panels.myinfo}"
           class="list-group-item">
          <i class="fas fa-info ml-1 mr-3"></i>
          My Information
        </a>
        <a href="#" 
           v-on:click="changeActive('emailverify')"
           v-bind:class="{active: panels.emailverify}"
           class="list-group-item">
          <i class="fas fa-at mr-2"></i>
          Email Verification
        </a>
        <a href="#" 
           v-on:click="changeActive('mycheckins')"
           v-bind:class="{active: panels.mycheckins}"
           class="list-group-item">
          <i class="fas fa-check mr-2"></i>
          My Checkins
        </a>
        <a href="#" 
           v-on:click="changeActive('mytournamentinvites')"
           v-bind:class="{active: panels.mytournamentinvites}"
           class="list-group-item">

          <i class="far fa-envelope-open mr-2"></i>
          My Tournament Invites
        </a>
      </div>
    </div>
  </div>
  <div class="col-9">
      <div v-bind:class="[{'visible' : panels.myinfo}, {'hidden' : !panels.myinfo}]" id="myInfo" class="row mt-10">
        <div v-bind:class="[{'visible' : !gamer.edit}, {'hidden' : gamer.edit}]" class="col-6 offset-1">
          <dl class="row">
            <div class="col-12">
              <div class="row mb-0">
                <div class="col-11 pl-0">
                <h5 class="text-uppercase">Basic Information </h5>
                </div>
                <div class="col-1">
                  <span v-on:click="edit()" style="font-size: 20px"><a><i class="fas fa-pencil-alt ml-5 mt-1"></i></a></span>
                </div>
              </div>
              <div class="row mb-3">
                <small>Because you're one in a million.</small>
              </div>
            </div>
            <dt class="col-sm-3">Alias</dt>
            <dd class="col-sm-9"><strong><em>@{{ gamer.oldalias }}</em></strong></dd>

            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">@{{ gamer.oldfname+" "+gamer.oldlname }}</dd>

            <dt class="col-sm-3">Email Address</dt>
            <dd class="col-sm-9">
              <dl>
                <dd>@{{ gamer.email }}</dd>
                <dd><small><em>Your email address is not shared publicly</em></small></dd>
              </dl>

            </dd>


            <dt class="col-sm-3">Birthday</dt>
            <dd class="col-sm-9">@{{ gamer.olddobstring }}</dd>
          </dl>
          <dl class="row">
            <div class="col-12">
              <div class="row mb-0">
                <h5 class="mt-5 mb-2 text-uppercase">Gamer Social</h5>
              </div>
              <div class="row mb-3">
                <small>Your gaming platform credentials. You will atleast some of these filled in before you can participate in our tournaments..</small>
              </div>
            </div>

            <dt class="col-sm-3">Steam ID</dt>
            <dd class="col-sm-9">
              <dl>
                <dd>@{{ gamer.steam }}</dd>
                <dd><small><em>You need to provide this to register for DGL tournaments of Steam games.</em></small></dd>
              </dl>
            </dd>
            <dt class="col-sm-3">BattleNet ID</dt>
            <dd class="col-sm-9">
              <dl>
                <dd>@{{ gamer.battlenet }}</dd>
                <dd><small><em>You need to provide this to register for DGL tournaments of Battle.Net games.</em></small></dd>
              </dl>
            </dd>
            <dt class="col-sm-3">Discord ID</dt>
            <dd class="col-sm-9">
              <dl>
                <dd>@{{ gamer.discord }}</dd>
                <dd><small><em>You need to provide this to register for ANY DGL tournaments.</em></small></dd>
              </dl>
            </dd>
          </dl>
        </div>
        <div v-bind:class="[{'visible' : gamer.edit}, {'hidden' : !gamer.edit}]" class="col-6 offset-1">
        <div class="row mb-0">
          <div class="col-11 pl-0">
          <h5 class="text-uppercase">Basic Information</h5>
          </div>
          <div class="col-1">
            <span v-on:click="cancel()" style="font-size: 25px" class="text-right"><i class="far fa-times-circle  ml-5"></i></span>
          </div>
        </div>
        <form method="POST" action="/gamers" class="mb-5">
          {{csrf_field()}}
          <div class="row mb-3">
            <small>Because you're one in a million.</small>
          </div>
          <div class="form-group row">
            <label for="inputAlias">Alias</label>
            <input v-model="gamer.alias" type="text" name="alias" class="form-control" id="inputAlias" aria-describedby="aliasHelp" placeholder="Enter alias">
            <small id="emailHelp" class="form-text text-muted">Must be unique</small>
          </div>
          <div class="form-group row">
            <label for="inputFname">First Name</label>
            <input v-model="gamer.fname" type="text" name="fname" class="form-control" id="inputFname" placeholder="Your first name">
            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
          </div>
          <div class="form-group row">
            <label for="inputLname">Last Name</label>
            <input v-model="gamer.lname" type="text" name="lname" class="form-control" id="inputLname" placeholder="Your last name">
            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
          </div>


          <div class="form-group row">
            <label for="inputLname">Birthday</label>
            <div id="datepicker" class="input-group date"
                 data-date-format="dd/mm/yyyy"
                 data-date-end-date="-10y"
                 data-date-start-date="01/01/1950" {{--some reasonable lower bound--}}
            >
              <input id="inputDob" v-model="gamer.dob" type="text"  name="dob"  class="form-control" readonly />
              <label class="input-group-addon btn mb-0 back-color-lightergray" for="date">
                <span class="fa fa-calendar-alt open-datetimepicker"></span>
              </label>
            </div>
            <small id="dobHelp" class="form-text text-muted">dd/mm/yyyy</small>
          </div>

          <div class="row mb-0">
            <h5 class="mt-5 mb-2 text-uppercase">Gamer Social</h5>
          </div>
          <div class="row mb-3">
            <small>Your gaming platform credentials. You will atleast some of these filled in before you can participate in our tournaments.</small>
          </div>
          {{--<div class="form-group row">--}}
            {{--<label>Steam64ID</label>--}}
          {{--</div>--}}
          <div v-if="!steamProfileFound" class="form-group row">
            <label for="inputLname">Steam64 ID</label>
            <input v-model="steamIdInput" v-on:change="getSteamInfo()" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">Required for tournaments with games hosted on Steam.</small>
          </div>
          <div v-else class="form-group row">
            <div class="col-12 ml-0 pl-0">
              <label>Steam64ID</label>
            </div>
            <div class="col-2">
              <img v-bind:src="steamAvatarURL">
            </div>
            <div class="col-9">
              <h3>@{{ steamPersonaName }}</h3>
              <span>@{{ steamStatus }}</span>
            </div>
            <div class="col-1 mr-0 pr-0">
              <button type="button" class="btn btn-danger">X</button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputLname">BNet ID</label>
            <input {{--name="inputBattleNet"--}} type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">Currently only Battle.Net accounts owning a copy of Overwatch. Required for Overwatch tournaments.</small>
          </div>

          <div class="form-group row">
            <label for="inputLname">Discord ID</label>
            <input {{--name="inputDiscord"--}} type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">Required for all tournaments. No exceptions.</small>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div>

      <div v-bind:class="[{'visible' : panels.emailverify}, {'hidden' : !panels.emailverify}]" class="row mt-10">
        <div class="col-6 offset-1">
          <div class="row">
              <h5 class="text-uppercase">Email Verification</h5>
          </div>
          <div class="row mt-4">
            <span>Hey there sharpshooter. We sent you verification email when registered.
              If you missed it you can request another one here.
              Dont forget to check spam folder first though.
            </span>
          </div>

          <div class="row mt-4 mb-5">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-envelope mr-1"></i>
              Send verfication email.
            </button>
          </div>
        </div>
      </div>
  </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: false,
            //startDate: '-30y'
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>

<script>
  let data = {

      steamProfileFound: false,
      steamIdInput: "",
      steamPersonaName: "",
      steamAvatarURL: "",
      steamStatus: "",
      panels: {
          'myinfo': true,
          'emailverify': false,
          'mycheckins': false,
          'mytournamentinvites': false
      },
      gamer: {
          'edit': false,
          'alias': '{{$gamer->alias}}',
          'fname': '{{$gamer->fname}}',
          'lname': '{{$gamer->lname}}',
          'email': '{{$gamer->email}}',
          'dobstring': '  <?php
              $dob = new \Carbon\Carbon($gamer->dob);
              echo $dob->format('j F Y');
          ?>',
          'oldalias': '{{$gamer->alias}}',
          'oldfname': '{{$gamer->fname}}',
          'oldlname': '{{$gamer->lname}}',
          'olddobstring': '{{$dob->format('j F Y')}}',

          'dob' : '{{$gamer->dob}}'.split('-').reverse().join('-').replace(/-/g,'/'), //format mm-dd-yyyy -> dd/mm/yyyy
          'steam': '{{ ($gamer->steamid) ? $gamer->steamid : "-none-" }}',
          'battlenet': '{{ ($gamer->battlenetid) ? $gamer->battlenetid : "-none-" }}',
          'discord': '{{ ($gamer->discordid) ? $gamer->discordid : "-none-" }}'
      }
  };

  var app = new Vue({
      el: '#settingsApp',
      data: data,
      mounted() {
          $("#datepicker").datepicker().on("changeDate",
              function() {
              var x = $('#inputDob').val();
              app.gamer.dob = x;
              });
      },
      methods:{

          changeActive: function (panel)
          {
              //alert(panel);
              this.panels['myinfo'] = false;
              this.panels['emailverify'] = false;
              this.panels['mycheckins'] = false
              this.panels['mytournamentinvites'] = false;

              this.panels[panel] = true;
          },
          edit: function()
          {
              //alert("HI");
              this.gamer.edit = true;
          },
          cancel: function()
          {
              this.gamer.edit = false;
          },

          getSteamInfo: function()//steam64id
          {
           //   console.log("triggered");
              axios.get('/steamapi/'+this.steamIdInput).then(function(response){
                  var steam_profile = response.data;

                  //console.log(steam_profile.personaname);
                  //console.log(steam_profile.avatarmedium);
                  app.steamPersonaName = steam_profile.personaname;
                  app.steamAvatarURL = steam_profile.avatarmedium;
                  app.steamStatus = steam_profile.personastate;
                  if(steam_profile.responseStatus == 'success')
                    app.steamProfileFound = true;
                  else
                    app.steamProfileFound = false;
            });
          }
      }
  })
</script>
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
@endsection