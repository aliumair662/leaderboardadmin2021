@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid site-wrapper front-screen-height">
            <div class="row">
                <div class="col-12">
                    <div class="Payment-Method-header">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="Wallet_btn">
                                    <a href="{{route('home')}}" class="Wallet"><b class="Wallet-Back">Back</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="price-amount-wrapper mini-price-amount-wrapper">
                        <div class="login-form-wrapper Play-Now-wrapper">
                            <div class="login-form">
                                <div class="login-logo text-center">
                                    <p class="mb-1 Manage-competition-text">There is no currently <br> no leaderboard giveaways live</p>
                                    <p class="mb-3">Please come back soon!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
