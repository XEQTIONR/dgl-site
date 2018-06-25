@extends('layouts.main')

@section('body-section')

<div id="settingsApp" class="row">
  <div class="back-color-purple d-block sidebar">
    <div class="row" style="margin-top: 75px;">
      <div class="col-12">
      <h6 class="d-none d-lg-block font-white text-uppercase text-center">Settings</h6>
       <h2><i class="fas fa-cog mx-3 d-inline d-lg-none font-white"></i></h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="list-group list-group-flush list-group-settings">
        <a href="#"
           v-on:click="changeActive('myinfo')"
           v-bind:class="{active: panels.myinfo}"
           class="list-group-item">
          <i class="fas fa-info mr-3 ml-1"></i>
          <span class="d-none d-lg-inline">My Information</span>
        </a>
        {{--there should always be a gamer meta with a  verification code--}}
        @if($gamer->status == 'unverified')
        <a href="#"
           v-on:click="changeActive('emailverify')"
           v-bind:class="{active: panels.emailverify}"
           class="list-group-item">
          <i class="fas fa-at mr-2"></i>
          <span class="d-none d-lg-inline">Email Verification</span>
        </a>
        @endif
        <a href="#" 
           v-on:click="changeActive('mycheckins')"
           v-bind:class="{active: panels.mycheckins}"
           class="list-group-item">
          <i class="fas fa-check mr-2"></i>
          <span class="d-none d-lg-inline">My Checkins</span>
        </a>
        <a href="#" 
           v-on:click="changeActive('mytournamentinvites')"
           v-bind:class="{active: panels.mytournamentinvites}"
           class="list-group-item">

          <i class="far fa-envelope-open mr-2"></i>
          <span class="d-none d-lg-inline">My Tournament Invites</span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-9 col-sm-10 col-lg-8">
      <div v-bind:class="[{'visible' : panels.myinfo}, {'hidden' : !panels.myinfo}]" id="myInfo" class="row mt-10">
        <div v-bind:class="[{'visible' : !gamer.edit}, {'hidden' : gamer.edit}]" class="col-11 col-md-7 col-lg-8 col-xl-7 offset-1">
          <dl class="row">
            <div class="col-12">
              <div class="row mb-0">
                <div class="col-10 pl-0">
                  <h5 class="text-uppercase">Basic Information </h5>
                </div>
                <div class="col-2 col-md-1">
                  <span v-on:click="edit()" style="font-size: 20px"><a><i class="fas fa-pencil-alt mt-1"></i></a></span>
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
                <small>Your gaming platform credentials. These fields become mandatory depending on which tournament
                you participate in. So make sure your information is updated.</small>
              </div>
            </div>

            <?php
              $steamflag = false;
              $steamavatarURL = "";
              $owflag = false;
              $owavatarURL = "";

              if(isset($gamer->personaname))
              {
                $steamflag = true;
                $steamavatarURL = $gamer->steamavatar;
              }
              if(isset($gamer->battletag))
              {
                $owflag = true;
                $owavatarURL = $gamer->owavatar;
              }
            ?>
            <dt class="col-sm-3">Steam ID</dt>
            <dd class="col-sm-9">
              <dl>
                @if($steamflag)
                <div class="row">
                    <img v-bind:src="gamer.steamavatar" width="64" height="64">
                    <h3 class="d-none d-lg-inline ml-1">@{{gamer.personaname}}</h3>
                    <h5 class="d-inline d-lg-none ml-1">@{{gamer.personaname}}</h5>
                </div>
                @else
                <dd>@{{ gamer.steam }}</dd>
                <dd><small><em>You need to provide this to register for DGL tournaments of Steam games.</em></small></dd>
                @endif
              </dl>
            </dd>
            <dt class="col-sm-3">BattleNet ID</dt>
            <dd class="col-sm-9">
              @if($owflag)
                <div class="row">
                    <img v-bind:src="gamer.owavatar" width="64" height="64">
                    <h3 class="d-none d-lg-inline ml-1">@{{ gamer.battlenet }}</h3>
                    <h5 class="d-inline d-lg-none ml-1">@{{ gamer.battlenet }}</h5>
                </div>
              @else
              <dl>
                <dd>@{{ gamer.battlenet }}</dd>
                <dd><small><em>You need to provide this to register for DGL tournaments of Blizzard games.</em></small></dd>
              </dl>
              @endif
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
        <div v-bind:class="[{'visible' : gamer.edit}, {'hidden' : !gamer.edit}]" class="col-9 col-md-6 offset-1">
        <div class="row mb-0">
          <div class="col-10 pl-0">
          <h5 class="text-uppercase">Basic Information</h5>
          </div>
          <div class="col-2 pl-0 pr-2">
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
              <label class="input-group-addon btn mb-0 bg-lightestgray" for="date">
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
            <label for="inputLname">Steam64 ID
              <span class="ml-2" v-bind:class="[{'visible-inline': searchingSteam },{'hidden': !searchingSteam}]">
                <i class="fa-spin fas fa-circle-notch"></i>
              </span>
            </label>
            <div class="input-group">
              <input v-model="steamIdInput" v-on:blur="submitEnable()" v-on:focus="submitDisable()" v-on:change="getSteamInfo()" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <label class="input-group-addon btn mb-0 bg-lightestgray" v-on:click="getSteamInfo()" for="date">
                <span class="fas fa-search"></span>
              </label>
            </div>
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
              {{--<span>@{{ steamStatus }}</span>--}}

              {{-- hidden inputs for those which get replaced in DOM--}}
              <input name="steamid" v-model="steamIdInput" type="hidden">
              <input name="steamAvatarURL" v-model="steamAvatarURL" type="hidden">

            </div>
            <div class="col-1 mr-0 pr-0">
              <button v-on:click="steamProfileFound = false; steamIdInput = '';" type="button" class="btn btn-danger">X</button>
            </div>
          </div>
          <div v-if="!owProfileFound" class="form-group row">
            <label for="inputKname">Battle Tag
              <span class="ml-2" v-bind:class="[{'visible-inline': searchingBattleTag },{'hidden': !searchingBattleTag}]">
                <i class="fa-spin fas fa-circle-notch"></i>
              </span>
            </label>
            <div class="input-group">
              <input v-model="battleTagInput" v-on:blur="submitEnable()" v-on:focus="submitDisable()" v-on:change="getOverwatchInfo()" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <label class="input-group-addon btn mb-0 bg-lightestgray" v-on:click="getOverwatchInfo()" for="date">
                <span class="fas fa-search"></span>
              </label>
            </div>
            <small id="emailHelp" class="form-text text-muted">Currently only Battle.Net accounts owning a copy of Overwatch. Required for Overwatch tournaments.</small>
          </div>
          <div v-else class="form-group row">
            <div class="col-12 ml-0 pl-0">
              <label>Battle Tag</label>
            </div>
            <div class="col-2">
              <img v-bind:src="owAvatarURL" width="64" height="64">
            </div>
            <div class="col-9">
              <h3>@{{ battleTagInput }}</h3>
              <input name="battlenetid"  v-model="battleTagInput" type="hidden">
              <input name="battleNetAvatarURL" v-model="owAvatarURL" type="hidden">
            </div>
            <div class="col-1 mr-0 pr-0">
              <button v-on:click="owProfileFound = false; battleTagInput = '';" type="button" class="btn btn-danger">X</button>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputLname">Discord ID</label>
            <input {{--name="inputDiscord"--}} type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">Required for all tournaments. No exceptions.</small>
          </div>

          <button v-bind:disabled="searchingSteam || searchingBattleTag || submit_disabled" type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div>

    <div v-bind:class="[{'visible' : panels.mycheckins}, {'hidden' : !panels.mycheckins}]" class="row mt-10">
      <div class="col-11 offset-1">
        <div class="row">
          <h5 class="text-uppercase">My Checkins</h5>
        </div>
        <div class="row">
          <small>All your match Checkins. You must check-in into a match before playing.</small>
        </div>
        <div class="row mt-4">
          @foreach($checkin_meta as $roster)
            <div class="row">
              <div class="col">
        <span>
          <img class="align-center" src="{{$roster->contendingTeam->logo_size2}}" alt="{{$roster->contendingTeam->tag}} logo">
          <span class="d-inline d-md-none">{{$roster->contendingTeam->tag}}</span>
          <span class="d-none d-md-inline">{{$roster->contendingTeam->name}}</span>
          <span class="ml-3">competing in</span>
          <span class="ml-3">
             @foreach($teams_formed as $someteam)
              @if($someteam->id == $roster->contending_team_id)
                {{$someteam->tournament->name}}
              @endif
            @endforeach
            @foreach($teams_joined as $someteam)
              @if($someteam->id == $roster->contending_team_id)
                {{$someteam->tournament->name}}
              @endif
            @endforeach
          </span>
        </span>
              </div>
            </div>
            <ul class="list-group w-100 my-5">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-1"></div>
                  <div class="col"><small class="text-uppercase"><strong>Against</strong></small></div>
                  <div class="col"><small class="text-uppercase"><strong>Checkin Start</strong></small></div>
                  <div class="col"><small class="text-uppercase"><strong>Checkin End</strong></small></div>
                  <div class="col"><small class="text-uppercase"><strong>Match Start</strong></small></div>
                  <div class="col"><small class="text-uppercase"><strong>Status / Action</strong></small></div>
                </div>
              </li>
              @foreach($roster->contendingTeam->matchContestants as $matchContestantMe)
                <li class="list-group-item">
                  @foreach($matchContestantMe->match->contestants as $opponent) {{-- template fails >1 opponent--}}
                  @if($roster->contending_team_id != $opponent->contending_team_id)
                    <div class="row">
                      <div class="col-1">vs</div>
                      <div class="col">
                        <span>
                        <img class="align-center" src="{{$opponent->contending_team->logo_size2}}">
                        <span class="d-inline d-md-none">{{$opponent->contending_team->tag}}</span>
                        <span class="d-none d-md-inline">{{$opponent->contending_team->name}}</span>
                        </span>
                      </div>
                      <div class="col">
                        <?php $time = new \Carbon\Carbon($matchContestantMe->match->checkinstart)?>
                        <span>{{$time->diffForHumans()}}</span>
                      </div>
                      <div class="col">
                        <?php $time = new \Carbon\Carbon($matchContestantMe->match->checkinend)?>
                        <span>{{$time->diffForHumans()}}</span>
                      </div>
                      <div class="col">
                        <?php $time = new \Carbon\Carbon($matchContestantMe->match->matchstart)?>
                        <span>{{$time->diffForHumans()}}</span>
                      </div>
                      {{--<div class="col">{{$matchContestantMe->match->checkinend}}</div>--}}
                      <?php $checked_in = false ?>
                      @foreach($roster->checkin as $acheckin)
                        @if($matchContestantMe->match->id == $acheckin->match_id)
                          <?php $checked_in = true ?>
                        @endif
                      @endforeach
                      <div class="col">
                        @if($checked_in)
                          <span class="font-primary-color">
              <i class="fas fa-check mr-2"></i>
              <small><strong class="d-none d-md-inline">CHECKED IN</strong></small>
            </span>
                        @else
                          <?php
                          $now = \Carbon\Carbon::now();
                          $c_start = \Carbon\Carbon::parse($matchContestantMe->match->checkinstart);
                          $c_end = \Carbon\Carbon::parse($matchContestantMe->match->checkinend);
                          ?>
                          @if($now->gte($c_start) && $now->lte($c_end))
                            <a href="/checkin/{{$roster->id}}/{{$matchContestantMe->match->id}}" class="btn btn-success btn-sm text-uppercase">
                              <i class="fas fa-map-marker mr-1"></i>
                              Checkin
                            </a>
                          @elseif($now->gt($c_end))
                              <span class="font-light-gray text-uppercase"><small><strong>Checkin Expired</strong></small></span>
                          @endif
                        @endif
                      </div>
                    </div> <!-- row -->
                  @endif
                  @endforeach
                </li>
              @endforeach
            </ul>
          @endforeach
        </div>
      </div>
    </div>
      @if($gamer->status=='unverified')
      <div v-bind:class="[{'visible' : panels.emailverify}, {'hidden' : !panels.emailverify}]" class="row mt-10">
        <div class="col-11 col-lg-6 offset-1">
          <div class="row">
              <h5 class="text-uppercase">Email Verification</h5>
          </div>
          <div class="row mt-4">
            <span>Hey there sharpshooter. We sent you verification email when registered.
              If you missed it you can request another one here.
              Dont forget to check spam folder first though.
            </span>
          </div>
          <?php $initial_meta = false;
                $less_than_24 = true;

            foreach ($meta as $item)
            {
              if($item->meta_key == 'email_verification_code') // meta found
              {
                if($item->created_at == $item->updated_at) // initial meta?
                  $initial_meta = true;
                else //not initial meta
                {
                  $today = \Carbon\Carbon::now();
                  $ud = \Carbon\Carbon::parse($item->updated_at);
                  $ud24 = $ud->addHours(24);
                  if($today->gte($ud24)) // meta created a day or more ago
                  {
                    $less_than_24 = false;
                  }
                }
                break;
              }
            }
          ?>
          @if($initial_meta || !$less_than_24)
          <div class="row mt-4 mb-5">
            <a href="/resend_verify/{{$gamer->id}}" class="btn btn-primary" type="button">
              <i class="fas fa-envelope mr-1"></i>
              Send verfication email.
            </a>
          </div>
          @elseif($less_than_24)
            <div class="row mt-4 mb-5">
              <span>Looks like we sent you a  <strong>NEW</strong> verification email less than 24 hours ago.
                The earliest you can request another verification email is tomorrow. Confucius said -
                <em>'When in doubt, check spam folder.'</em>
              </span>
            </div>
          @endif
        </div>
      </div>
      @endif

      <div v-bind:class="[{'visible' : panels.mytournamentinvites}, {'hidden' : !panels.mytournamentinvites}]" class="row mt-10">
        <div class="col-11 col-lg-8 offset-1">
          <div class="row">
            <h5 class="text-uppercase">Invitations Received</h5>
          </div>
          <div class="row mb-3">
            <small>Invitions from other captains to join their teams.</small>
          </div>
          <div class="row">
            <ul class="list-group w-100 mb-5">
              @foreach($teams_joined as $team)
                <li class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <p>{{$team->name}}</p>
                    <small><strong>{{$team->tournament->name}}</strong></small>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                    <h5>{{$team->tag}}</h5>
                    <small> Invited by
                      <strong>
                        @foreach($team->roster as $aroster)
                          @if($aroster->gamer_id != $gamer->id)
                            {{$aroster->gamer->alias}}
                          @endif
                        @endforeach
                      </strong>
                    </small>
                  </div>
                  @foreach($team->roster as $aroster)
                    @if($aroster->gamer_id == $gamer->id)

                        <div class="d-flex w-100 justify-content-end mt-1">
                        @if($aroster->status=='confirmation_required')
                          <a href="/roster/{{$gamer->alias}}/{{$team->id}}" class="btn btn-success">
                            + JOIN TEAM
                          </a>

                        @elseif($aroster->status=='ok')
                          <span class="font-primary-color"><i class="fas fa-check mr-3"></i><strong>TEAM JOINED</strong></span>
                        @elseif($aroster->status=='rejected')
                          <span class="font-red"><i class="fas fa-times mr-3"></i><strong>DECLINED</strong></span>
                        @else
                          <span class="font-light-gray"><i class="fas fa-exclamation mr-3"></i><strong>INVITE EXIPRED</strong></span>
                        @endif
                        </div>
                    @endif
                  @endforeach
                </li>
              @endforeach
            </ul>
          </div>

          <div class="row">
            <h5 class="text-uppercase">Invitations Sent</h5>
          </div>
          <div class="row mb-3">
            <small>Your efforts to recruit gamers.</small>
          </div>
          <div class="row">
            @foreach($teams_formed as $team)
            <ul class="list-group w-100 mb-5">
                @foreach($team->roster as $roster)
                <li class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5>{{$team->name}}</h5>
                    <small><strong>{{$team->tournament->name}}</strong></small>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                    <div class="d-flex w-100 justify-content-start">
                      <p class="mr-1"><strong>{{$team->tag}}</strong></p>
                      <span>{{$roster->gamer->alias}}</span>
                    </div>
                    <small><strong>{{$roster->status}}</strong></small>
                  </div>
                </li>
                @endforeach
                @foreach($team->invites as $invite)
                <li class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5>{{$team->name}}</h5>
                    <small><strong>{{$team->tournament->name}}</strong></small>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                    <span>{{$invite->email}}</span>

                    <small><strong>{{$invite->status}}</strong></small>
                  </div>
                </li>
                @endforeach
            </ul>
            @endforeach
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

      searchingSteam: false,
      steamIdInput: "{{$gamer->steamid}}",

      @if($gamer->personaname)
      steamProfileFound: true,
      steamPersonaName: "{{$gamer->personaname}}",
      steamAvatarURL: "{{$gamer->steamavatar}}",
      @else
      steamProfileFound: false,
      steamPersonaName: "",
      steamAvatarURL: "",
      @endif
      searchingBattleTag: false,
      battleTagInput: "{{$gamer->battlenetid}}",
      @if($gamer->battletag)
      owProfileFound: true,
      owAvatarURL: "{{$gamer->owavatar}}",
      @else
      owProfileFound: false,
      owAvatarURL: "",
      @endif

      submit_disabled: false,

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
          'steamavatar': '{{$gamer->steamavatar ? $gamer->steamavatar : null}}',
          'personaname': '{{$gamer->personaname ? $gamer->personaname : null}}',
          'battlenet': '{{ ($gamer->battlenetid) ? $gamer->battlenetid : "-none-" }}',
          'battletag': '{{ ($gamer->battletag) ? $gamer->battletag : null }}',
          'owavatar': '{{$gamer->owavatar ? $gamer->owavatar : null}}',
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
              this.gamer.edit = true;
              this.steamIdInput = ""+this.gamer.steam;
              this.steamAvatarURL = ""+this.gamer.steamavatar;
              this.steamPersonaName = ""+this.gamer.personaname;

              this.battleTagInput = ""+this.gamer.battletag;
              this.owAvatarURL = ""+this.gamer.owavatar;

              if(this.steamIdInput!='-none-')
                  this.steamProfileFound = true;
              else
                  this.steamIdInput=""; // reset it. because it has been set to string -none-

              if(this.battleTagInput != "")
                  this.owProfileFound = true;

          },
          cancel: function()
          {
              this.gamer.edit = false;
              toastr.options = {
                  "closeButton" : true,
                  "timeOut": "8000",
              }
              toastr.warning("Cancelled.");

          },

          submitDisable: function(){
              // if(app.steamIdInput!="" || app.battleTagInput!="")
              // {
                  app.submit_disabled = true;
              // }
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
  .visible-inline{
    display: inline;
  }
  .hidden{
    /**visibility: hidden;*/
    display: none;
  }
</style>
@endsection