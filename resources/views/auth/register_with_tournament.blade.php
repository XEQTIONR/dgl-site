@extends('layouts.simple')
@section('header-scripts')

  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
@endsection
@section('footer-scripts')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.standalone.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <script>
      $('#dob-btn').click(function(){
          $('#dob').focus();
      });
  </script>
  {{--<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>--}}
  <script src="/js/vue.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="/js/app.js"></script>
  <style>
    .visible{
      /**visibility : visible;*/
      display: inherit;
    }
    .visible-inline{
      display: inline;
    }
    .hidden{
      /**visibility: hidden;*/
      display: none;
    }
  </style>
  <script>
      let data = {

          fname: "{{old('fname')}}",
          lname: "{{old('lname')}}",
          alias: "{{old('alias')}}",
          email: "{{$toEmail}}",
          //dob: "", cannot use this because of bootstap datepicker
          password: "",
          confirm_password: "",

          searchingAlias: false,

          searchingSteam: false,
          steamIdInput: "",
          steamProfileFound: false,
          steamPersonaName: "",
          steamAvatarURL: "",

          searchingBattleTag: false,
          battleTagInput: "",
          owProfileFound: false,
          owAvatarURL: "",
          errors: [],

          submit_disabled: false
      };

      var app = new Vue({
          el: '#app',
          data: data,
          methods:{

              findGamer: function(){

                  app.searchingAlias = true;
                  axios.get('/findgamer/'+ app.alias).then(function(response)
                  {
                      app.searchingAlias = false;
                      var alias = response.data;
                      console.log("alias: "+ alias);
                      toastr.options = {
                          "closeButton" : true,
                          "timeOut": "3000",
                      };
                      if(alias == "")
                      {
                          toastr.success(app.alias+ " is available.");
                      }
                      else
                      {
                          toastr.error(app.alias+" is taken.");
                          app.alias="";
                      }
                  });
                  app.searchingAlias = false;

              },

              submitDisable: function(){
                  app.submit_disabled = true;
              },
              submitEnable: function () {
                  if(!app.searchingBattleTag || !app.searchingSteam)
                      app.submit_disabled = false;
              },

              getSteamInfo: function()//steam64id
              {
                  var statuses = ['offline','online','busy','away','snooze','looking to trade', 'looking to play'];
                  if(app.steamIdInput!="" && !app.searchingSteam) {
                      app.searchingSteam = true;
                      axios.get('/steamapi/' + this.steamIdInput).then(function (response) {
                          var steam_profile = response.data;

                          app.searchingSteam = false;
                          app.submit_disabled = false;
                          toastr.options = {
                              "closeButton" : true,
                              "timeOut": "5000",
                          };

                          if (steam_profile.responseStatus == 'success')
                          {

                              app.steamProfileFound = true;
                              // app.steamid = "" + app.steamIdInput;
                              app.steamPersonaName = steam_profile.personaname;
                              app.steamAvatarURL = steam_profile.avatarmedium;
                              // app.steamStatus = statuses[steam_profile.personastate];
                              toastr.success("Steam profile found.");
                          }
                          else
                          {
                              app.steamProfileFound = false;
                              app.steamIdInput="";
                              toastr.error("Could not find your profile. :(");
                          }
                      }, function (response)
                      {
                          app.searchingSteam = false;
                          app.submit_disabled = false;
                          app.steamProfileFound = false;
                          app.steamIdInput="";
                          toastr.error("Could not find your profile. :(");
                      });
                  }
              },
              getOverwatchInfo: function()
              {
                  if(app.battleTagInput!="" && !app.searchingBattleTag) {
                      app.searchingBattleTag = true;
                      app.submit_disabled = false;
                      axios.get('/owapi/' + this.battleTagInput.replace("#", "-")).then(function (response) {
                          var ow_data = response.data;

                          app.searchingBattleTag = false;


                          toastr.options = {
                              "closeButton" : true,
                              "timeOut": "5000",
                          };

                          if (ow_data.responseStatus == 'success')
                          {
                              app.owProfileFound = true;
                              app.owAvatarURL = ow_data.data;
                              toastr.success("BattleNet profile found.");

                          }
                          else{
                              console.log('response status: '+ ow_data.responseStatus);
                              app.owProfileFound = false;
                              app.battleTagInput="";
                              toastr.error("Could not find your profile. :(");
                          }
                      });
                  }
              },
              validateAlias: function()
              {
                  if(app.alias.length>25);
                  app.alias = app.alias.substring(0, 25);

                  var regex = /[a-zA-Z0-9]/;
                  var string="";
                  for(i=0; i<app.alias.length; i++)
                  {
                      var char = ""+app.alias.charAt(i);

                      if(regex.test(char))
                          string = string + char;
                      else
                          console.log('fail ' + char);
                  }

                  app.alias = string;
              },
              validation: function(e) {
                  console.log('validation called');
                  app.errors = [];
                  //this.findGamer();
                  if(!app.fname.length>0)
                      app.errors.push("Your first name is required.");
                  if(!app.lname.length>0)
                      app.errors.push("Your last name is required.");
                  if(!app.alias.length>0)
                      app.errors.push("An alias/screen name is required.");
                  if(!app.email.length>0)
                      app.errors.push("Enter your email");
                  // if(!app.dob.length>0)
                  //     app.errors.push("Enter your date of birth");
                  if(!app.password.length>0)
                      app.errors.push("Enter a password you will use to log into DGL.");
                  if(!app.confirm_password.length>0)
                      app.errors.push("You need to enter your password again in the confirm password field.");
                  if(app.password!=app.confirm_password)
                      app.errors.push("Your password entries DO NOT match.");

                  if(!document.querySelector('#dobField').value.length>0)
                      app.errors.push("Enter your date of birth");

                  @if($esport->platform->slug == config('social.battlenet_slug'))
                  if(!app.owProfileFound)
                      app.errors.push("You Battle Tag is required to process your tournament registration.");
                  @endif

                  @if($esport->platform->slug == config('social.steam_slug'))
                  if(!app.steamProfileFound)
                      app.errors.push("You Steam id is required to process your tournament registration.");
                  @endif
                  if(!app.errors.length)
                  {
                      document.querySelector('#email').removeAttribute('disabled');
                      return true;
                  }

                  e.preventDefault();
              }
          }
      });
  </script>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center mt-5" >
      <div class="col-10" style="background-color: white; max-width: 600px; box-shadow: 7px 7px 75px #e6e6e6;">
        <div class="row mt-4 justify-content-center">
          <img src="{{URL::asset('storage/Crown.png')}}" alt="DaGameLeague Logo" style=" height:auto; width:auto; max-width: 80%; object-fit: contain"/>
        </div>
        <div class="row justify-content-center"><h6>Sign Up for DaGameLeague</h6></div>
        <div class="row mt-4 justify-content-center px-1 px-md-5">
          <div class="col-12">
            <form id="app" @submit="validation" class="form-horizontal w-100" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
              <input type="hidden" name="inviteId" value="{{$inviteId}}">

              <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                {{--<label for="fname" class="col-md-4 control-label">First Name</label>--}}

                <div class="col">
                  <input v-model="fname" id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" placeholder="First name">

                  @if ($errors->has('fname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fname') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                {{--<label for="lname" class="col-md-4 control-label">Last Name</label>--}}

                <div class="col">
                  <input v-model="lname" id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" placeholder="Last Name">

                  @if ($errors->has('lname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lname') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                {{--<label for="alias" class="col-md-4 control-label">Alias</label>--}}

                <div class="col">
                  <input v-model="alias" v-on:input="validateAlias()" id="alias" v-on:change="findGamer()" type="text" class="form-control" name="alias" value="{{ old('alias') }}" placeholder="Alias">

                  @if ($errors->has('alias'))
                    <span class="help-block">
                        <strong>{{ $errors->first('alias') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                <div class="col">
                  <input v-model="email" id="email" type="email" class="form-control" name="email" disabled placeholder="Email address">

                  @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group mb-3">
                <label for="dob" class="col-md-4 control-label">Birthday</label>

                <div id="dob" class="input-group date px-3"
                     data-provide="datepicker"
                     data-date-format="dd/mm/yyyy"
                     data-date-end-date="-9y"
                     data-date-start-date="-80y">
                  <input id="dobField" name="dob" class="form-control" autocomplete="off">
                  <div id="dob-btn" class="input-group-addon px-3 py-2" style="display: inline; background-color: #67c; border-radius: 2px">
                    <i class="far fa-calendar-alt" style="color: #FFF"></i>
                  </div>
                  @if ($errors->has('dob'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dob') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div v-if="!steamProfileFound" class="form-group">
                {{--<label for="steamid" class="col-md-4 control-label">Steam ID:</label>--}}

                <div class="col">
                  <div class="input-group">
                    <input v-model="steamIdInput" v-on:change="getSteamInfo()" id="steamid" name="steamid" type="text" class="form-control" value="{{ old('steamid') }}" placeholder="SteamID64"  autofocus>
                    <label v-show="!searchingSteam" class="input-group-addon btn mb-0 bg-lightestgray" v-on:click="getSteamInfo()" for="date">
                      <span class="fas fa-search"></span>
                      {{--<span v-bind:class="[{'fa-spin fas fa-circle-notch': !searchingBattleTag },{'fas fa-search': searchingBattleTag}]"></span>--}}
                    </label>
                    <label v-show="searchingSteam" class="input-group-addon btn mb-0 bg-lightestgray" for="date">
                      <span class="fa-spin fas fa-circle-notch"></span>
                      {{--<span v-bind:class="[{'fa-spin fas fa-circle-notch': !searchingBattleTag },{'fas fa-search': searchingBattleTag}]"></span>--}}
                    </label>
                  </div>
                </div>
              </div>
              <div v-else class="form-group row justify-content-center mx-2 p-2" style="border: 2px solid #6677cc;">
                <div class="col-12">
                  <label>Steam64ID</label>
                </div>
                <div class="col">
                  <img v-bind:src="steamAvatarURL" alt="Gamer Steam Avatar">
                </div>
                <div class="col">
                  <h3>@{{ steamPersonaName }}</h3>
                  {{--<span>@{{ steamStatus }}</span>--}}

                  {{-- hidden inputs for those which get replaced in DOM--}}
                  <input name="steamid" v-model="steamIdInput" type="hidden">
                  <input name="steamAvatarURL" v-model="steamAvatarURL" type="hidden">

                </div>
                <div class="col">
                  <button v-on:click="steamProfileFound = false; steamIdInput = '';" type="button" class="btn btn-danger d-block ml-auto mr-0">X</button>
                </div>
              </div>

              <div v-if="!owProfileFound" class="form-group">
                {{--<label for="fname" class="col-md-4 control-label">Battle.Net ID:</label>--}}
                <div class="col">
                  <div class="input-group">
                    <input v-model="battleTagInput" v-on:change="getOverwatchInfo()" name="battlenetid" id="battlenetid" type="text" class="form-control"  value="{{ old('battlenetid') }}"  placeholder="BattleNet Account"  autofocus>
                    <label v-show="!searchingBattleTag" class="input-group-addon btn mb-0 bg-lightestgray" v-on:click="getOverwatchInfo()" for="date">
                      <span class="fas fa-search"></span>
                      {{--<span v-bind:class="[{'fa-spin fas fa-circle-notch': !searchingBattleTag },{'fas fa-search': searchingBattleTag}]"></span>--}}
                    </label>
                    <label v-show="searchingBattleTag" class="input-group-addon btn mb-0 bg-lightestgray" for="date">
                      <span class="fa-spin fas fa-circle-notch"></span>
                      {{--<span v-bind:class="[{'fa-spin fas fa-circle-notch': !searchingBattleTag },{'fas fa-search': searchingBattleTag}]"></span>--}}
                    </label>
                  </div>
                </div>
              </div>
              <div v-else class="form-group row justify-content-center mx-2 p-2" style="border: 2px solid #6677cc;">
                <div class="col-12">
                  <label>Battle Tag</label>
                </div>
                <div class="col">
                  <img v-bind:src="owAvatarURL" width="64" height="64" alt="Gamer Overwatch Avatar">
                </div>
                <div class="col">
                  <h3>@{{ battleTagInput }}</h3>
                  <input name="battlenetid"  v-model="battleTagInput" type="hidden">
                  <input name="battleNetAvatarURL" v-model="owAvatarURL" type="hidden">
                </div>
                <div class="col">
                  <button v-on:click="owProfileFound = false; battleTagInput = '';" type="button" class="btn btn-danger d-block ml-auto mr-0">X</button>
                </div>
              </div>

              {{--<div class="form-group{{ $errors->has('discordid') ? ' has-error' : '' }}">--}}
                {{--<label for="discordid" class="col-md-4 control-label">Discord ID</label>--}}

                {{--<div class="col">--}}
                  {{--<input id="discordid" type="text" class="form-control" name="discordid" value="{{ old('discordid') }}" placeholder="Discord ID"  autofocus>--}}

                  {{--@if ($errors->has('discordid'))--}}
                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('discordid') }}</strong>--}}
                                    {{--</span>--}}
                  {{--@endif--}}
                {{--</div>--}}
              {{--</div>--}}

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                <div class="col">
                  <input v-model="password" id="password" type="password" class="form-control" name="password"  placeholder="Password" required>

                  @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>


              <div class="form-group">
                {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                <div class="col">
                  <input v-model="confirm_password" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
              </div>

              <div v-if="errors.length" class="w-100 mt-3">
                <ul v-for="error in errors">
                  <li class="font-red">@{{error}}</li>
                </ul>
              </div>

              <div class="form-group my-5">
                <div class="col">
                  <button v-bind:disabled="searchingSteam || searchingBattleTag || searchingAlias" type="submit" class="btn btn-lg btn-block btn btn-outline-success">
                    Sign Up
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
