@extends('layouts.simple')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-10 col-lg-5 mb-5" style="background-color: white; max-width: 400px; box-shadow: 7px 7px 75px #e6e6e6;">

    <div class="row mt-4 justify-content-center">
        <img src="{{URL::asset('storage/DGLCrownLightGray.svg')}}" width="125" />
    </div>
    <div class="row justify-content-center px-1 px-md-5">
        <div class="col-12">
            {{--<div class="panel panel-default">--}}
                <div class="row">
                    <form class="w-100 mt-3" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ ($errors->has('alias') || $errors->has('email')) ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-4 control-label">E-Mail or Alias</label>--}}
                            <div class="col">
                                <input id="email" type="text" class="form-control" name="alias" placeholder="Email address or alias" value="{{ old('alias') }}" required autofocus>

                                @if ($errors->has('alias'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alias') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            <div class="col">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row justify-content-between ml-3 mb-4 pl-2 pr-3">
                            <div class="d-block">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-block">
                                <a class="btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col">
                                <button type="submit" class="btn btn-lg btn-block back-color-purple font-white">
                                    Login
                                </button>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <div class="col">
                                <a href="/register" class="btn btn-lg btn-block btn-outline-success">
                                    Or, Sign Up Now.
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            {{--</div>--}}
        </div>
    </div>
</div>
</div>
@endsection