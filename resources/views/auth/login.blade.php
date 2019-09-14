@extends('layouts.auth')

@section('auth')
    <div class="col-md-5">
        <div class="card-group">
            <div class="card">
                <div class="card-body p-5">

                     <img src="img/avatars/logo_the.png" class="mb-3 center" style="width: 70px; height:40px; display: block; margin-left: auto; margin-right: auto;">
                     <p class="text-muted text-center">Sign In to your account</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="{{ __('User Name') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-lock"></i>
                            </span>
                            </div>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4" style="padding-left: 300px;">
                                <button type="submit" class="btn btn-primary px4">
                                    {{ __('Login') }}









                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection