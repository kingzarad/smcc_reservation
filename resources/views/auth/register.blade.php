@extends('layouts.user.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">

            <div class="d-flex justify-content-center ">
                <img class="register-logo-avatar" src="{{ asset('assets/images/smcc-logo.png') }}" alt="">
            </div>

            <div class="col-md-auto register-wrapper shadow">
                <div class="d-flex justify-content-center login-title">
                    <h5>{{ __('REGISTER') }}</h5>
                </div>
                <div class="register-container mt-3 m-4">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="col-md-12 col-form-label ">{{ __('Username') }}</label>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="col-md-12 col-form-label ">{{ __('Email Address') }}</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
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
                        <div class="mb-3">
                            <label for="password-confirm"
                                class="col-md-12 col-form-label ">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">

                        </div>
                        <div class="alert alert-warning">
                            <i class="fa fa-warning"></i>

                            <small>Upon completing the partial registration, please wait for the administrator's approval.
                                Thank You.</small>
                        </div>

                        <button type="submit" class="btn btn-login-c">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
