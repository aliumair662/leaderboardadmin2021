@extends('layouts.app')

@section('content')


<div class="wrapper Play-Now-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="login-form-wrapper">
                    <div class="login-form">
                        <!-- <div class="login-logo text-center mb-5">
                            <img src="{{ asset('assets/logos/logo.svg') }}">
                        </div> -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="login-input-group">
                                <!--<input type="text" name="" placeholder="Email" class="login-input">-->
                                <input id="email" type="email" placeholder="Email" class="login-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="login-input-group">
                                <!--<input type="password" name="" placeholder="Password" class="login-input">-->
                                <input id="password" type="password" placeholder="Password" class="login-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="login-input-group text-center submit-input">
                                <button type="submit" class="login-submit">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                        <div class="login-form-Forgot text-center">
                            <a href="#" class="login-Forgot text-white"><u>Forgot Password?</u></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
