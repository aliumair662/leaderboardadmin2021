@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid site-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="Payment-Method-header">
                        <div class="row">
                            <!-- <div class="col-md-4 col-12">
                                <div class="Wallet_btn">
                                    <a href="{{route('ManageLeaderboard')}}" class="Wallet"><b class="Wallet-Back">Back</b></a>
                                </div>
                            </div> -->
                            <div class="col-md-12 position-relative text-center">
                                <div class="Payment-Method-header-text-area">
                                    <h3 class="Payment-Method-heading Price-Amount-heading">Create Leaderboard</h3>
                                </div>
                                <a class="back-button" href="{{route('ManageLeaderboard')}}">
                                    <div class="Wallet">
                                        <b class="Wallet-Back">Back</b>
                                    </div>
                                </a> 
                            </div>
                        </div>
                    </div>
                    <div class="Manage-competition-wrapper">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        <div class="Manage-competition">
                            <form method="POST" action="{{ route('addLeaderboard') }}">
                                @csrf
                            <div class="Manage-competition-heading-section">
                                <p class="Manage-competition-heading">SCRAP MENTIONS FROM POST</p>
                                <input type="text" class="Manage-competition-input" name="post_url" value="{{ old('post_url') }}" required placeholder="Enter Instagram Post link">
                            </div>
                            <div class="Manage-competition-dropdown-section">
                                <p class="Manage-competition-heading">RUN LEADERBOARD FOR</p>
                                <select name="leaderboard_run_period" class="Manage-competition-select" aria-label="Default select example" required>
                                    <option value="">Open this select menu</option>
                                <?php
                                    for ($i = 1; $i <= 30; $i++){
                                        $day='day';
                                        if($i>1){
                                            $day='days';
                                            }
                                            ?>
                                    <option value="{{$i}}">{{$i}} {{$day}}</option>
                                    <?php

                                    }
                                    ?>
                                </select>
                            </div>
                    <div class="Manage-competition-dropdown-section">
                                <p class="Manage-competition-heading">ADD LEADERBOARD PACKAGE</p>
                                <select name="package" class="Manage-competition-select" aria-label="Default select example" required>
                                    <option value="">Open this select menu</option>
                                    @if(!empty($leaderboardpackages))
                                    @foreach($leaderboardpackages as $package)
                                    <option value="{{$package->id}}">{{$package->package_name}} - {{$package->price_per_hour}}</option>
                                     @endforeach
                                    @endif
                                </select>
                            </div>

                            
                            <div class="Playing-button-wrapper pt-3">
                                <!--<a href="#" class="login-submit ml-auto float-right rounded Continue-Playing-btn">Create Leaderboard</a>-->
                                <button type="submit" class="login-submit ml-auto float-right rounded Continue-Playing-btn">
                                    Create Leaderboard
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
