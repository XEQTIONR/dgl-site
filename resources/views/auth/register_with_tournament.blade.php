@extends('layouts.simple')
@section('header-scripts')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.standalone.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
@endsection
@section('footer-scripts')
  <script src="http://code.jquery.com/jquery-3.2.1.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <script>
      $('#dob').datepicker({
          format: 'dd/mm/yyyy',
          autoclose: true,
          startDate: '-90y',
          endDate: '-12y'
      });

      $('#dob-btn').click(function(){
          $('#dob').focus();
      });

      $('#form').submit(function(){
          $('#email').removeAttr('disabled');
          return true;
      })
  </script>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center mt-5" >
      <div class="col-10" style="background-color: white; max-width: 600px; box-shadow: 7px 7px 75px #e6e6e6;">
        <div class="row mt-4 justify-content-center">
          <img src="{{URL::asset('storage/DGLCrownLightGray.svg')}}" width="125" />
        </div>
        <div class="row mt-4 justify-content-center px-1 px-md-5">
          <div class="col-12">
            <form id="form" class="form-horizontal w-100" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
              <input type="hidden" name="inviteId" value="{{$inviteId}}">

              <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                {{--<label for="fname" class="col-md-4 control-label">First Name</label>--}}

                <div class="col">
                  <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" placeholder="First name" required autofocus>

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
                  <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required autofocus>

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
                  <input id="alias" type="text" class="form-control" name="alias" value="{{ old('alias') }}" placeholder="Alias" required autofocus>

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
                  <input id="email" type="email" class="form-control" name="email" value="{{ $toEmail }}" placeholder="Email address" required disabled>

                  @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>

              <div class="input-group col date mb-3 {{ $errors->has('dob') ? ' has-error' : '' }}">
                <label for="dob" class="col-md-4 control-label">Birthday</label>

                {{--<div class="col">--}}
                <input id="dob" name="dob" class="form-control" value="{{ old('dob') }}" required autofocus autocomplete="off">
                <div id="dob-btn" class="input-group-addon px-3 py-2" style="display: inline; background-color: #67c; border-radius: 2px">
                  <i class="far fa-calendar-alt" style="color: #FFF"></i>
                </div>
                @if ($errors->has('dob'))
                  <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                @endif
                {{--</div>--}}
              </div>

              <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                {{--<label for="steamid" class="col-md-4 control-label">Steam ID:</label>--}}

                <div class="col">
                  <input id="steamid" type="text" class="form-control" name="steamid" value="{{ old('steamid') }}" placeholder="SteamID"  autofocus>

                  @if ($errors->has('steamid'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('steamid') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('battlenetid') ? ' has-error' : '' }}">
                {{--<label for="fname" class="col-md-4 control-label">Battle.Net ID:</label>--}}

                <div class="col">
                  <input id="battlenetid" type="text" class="form-control" name="battlenetid" value="{{ old('battlenetid') }}"  placeholder="BattleNet Account"  autofocus>

                  @if ($errors->has('battlenetid'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('battlenetid') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('discordid') ? ' has-error' : '' }}">
                {{--<label for="discordid" class="col-md-4 control-label">Discord ID</label>--}}

                <div class="col">
                  <input id="discordid" type="text" class="form-control" name="discordid" value="{{ old('discordid') }}" placeholder="Discord ID"  autofocus>

                  @if ($errors->has('discordid'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('discordid') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                <div class="col">
                  <input id="password" type="password" class="form-control" name="password"  placeholder="Password" required>

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
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
              </div>

              <div class="form-group my-5">
                <div class="col">
                  <button type="submit" class="btn btn-lg btn-block btn btn-outline-success">
                    Register
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
