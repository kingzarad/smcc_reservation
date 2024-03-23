@extends('layouts.user.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 ">

            <div class="d-flex justify-content-center ">
                <img class="login-logo-avatar" src="{{ asset('assets/images/smcc-logo.png') }}" alt="">
            </div>

            <div class="col-md-auto login-wrapper shadow">
                <div class="d-flex justify-content-center login-title">
                    <h5>{{ __('LOGIN') }}</h5>
                </div>
                <div class="login-container mt-5 m-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="login" class="col-md-12 col-form-label ">{{ __('Username or Email Address') }}</label>
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror"
                                name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

                            @error('login')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex justify-content-between align-items-center rmb">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                  <small>  {{ __('Remember Me') }}</small>
                                </label>
                            </div>
                            <div class="form-check">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                       <small> {{ __('Forgot Your Password?') }}</small>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-login-c">
                            {{ __('Sign In') }}
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
