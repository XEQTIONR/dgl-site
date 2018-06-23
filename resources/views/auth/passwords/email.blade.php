@extends('layouts.simple')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-10 col-lg-5 mb-5" style="background-color: white; max-width: 400px; box-shadow: 7px 7px 75px #e6e6e6;">

            <div class="row mt-4 justify-content-center">
                <img src="{{URL::asset('storage/DGLCrownLightGray.svg')}}" width="125" />
            </div>
            <div class="row justify-content-center"><h6>Reset your password</h6></div>
            <div class="row justify-content-center px-1 px-md-5">
                <div class="col-12">
                    {{--<div class="panel panel-default">--}}
                    <div class="row">
                        <form class="w-100 mt-3 mb-5" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                <div class="col">
                                    <input id="email" type="email" class="form-control"
                                           placeholder="Email Address" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Send Password Reset Link
                                    </button>
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

