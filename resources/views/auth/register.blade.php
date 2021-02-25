@extends('layouts.app')

@section('content')


<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="login-form-wrapper">
                    <div class="login-form">
                        <div class="login-logo text-center mb-4">
                            <img src="{{ asset('assets/logos/logo.svg') }}">
                            <p class="Signup-gide mb-0 mt-4">
                                First let's create an account so you can see the leaderboard live!
                            </p>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="Signup-input-group">
                                <input type="text" name="" placeholder="First Name">

                            </div>
                            <div class="Signup-input-group">
                                <input type="text" name="" placeholder="Last Name">
                            </div>
                            <div class="Signup-input-group">
                                <input id="name" type="text" placeholder="Nick Name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="Signup-input-group">
                                <!--<input type="email" name="" placeholder="Email">-->
                                <input id="email" type="email" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="Signup-password mt-4 pt-1">
                                <div class="login-input-group">
                                    <!--<input type="password" name="" placeholder="Password" class="login-input">-->

                                    <input id="password" type="password" placeholder="Password" class="login-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="login-input-group">
                                    <!--<input type="password" name="" placeholder="Confirm Password" class="login-input">-->
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="login-input" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="mt-5 login-form-Forgot text-left">
                                    <p>
                                        <input type="radio" class="Sign-radio mr-2">I agree with the <a href="#" class="login-to-Sign"><u>Terms & Conditions</u></a>
                                    </p>
                                </div>
                                <div class="login-input-group text-center submit-input">
                                    <button type="submit" class="login-submit">
                                        Create Account
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
