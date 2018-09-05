@extends('layouts.simple')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-10 col-lg-5 mb-5" style="background-color: white; max-width: 400px; box-shadow: 7px 7px 75px #e6e6e6;">

        <div class="row mt-4 justify-content-center">
            <img src="{{URL::asset('storage/Crown.png')}}" width="125" alt="DaGameLeague Logo" />
        </div>
        <div class="row justify-content-center px-1 px-md-5">
            <div class="col-12">
                <div class="row">
                    <form class="w-100 mt-3" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="E-mail Address" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="col">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                        </div>
                        </div>

                        <div class="form-group mb-5">
                        <div class="col">
                        <button type="submit" class="btn btn-lg btn-block back-color-purple font-white">
                        Reset Password
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
