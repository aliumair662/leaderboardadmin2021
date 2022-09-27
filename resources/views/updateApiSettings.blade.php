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
                                    <h3 class="Payment-Method-heading Price-Amount-heading">Update Settings</h3>
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
                            <form method="POST" action="{{ route('updateAPISettingss') }}">
                                @csrf
                            <div class="Manage-competition-heading-section">
                                <p class="Manage-competition-heading">Cron Time</p>
                                <input type="text" class="Manage-competition-input" name="cron_time" value="{{ '' ?? '' }}" placeholder="Enter Time in seconds">
                            </div>
                            <div class="Manage-competition-heading-section">
                                <p class="Manage-competition-heading">Api Token</p>
                                <input type="text" class="Manage-competition-input" name="api_token" value="{{ $dd['token'] ?? '' }}" placeholder="Enter Api Token">
                            </div>
                            <!-- <div class="Manage-competition-dropdown-section">
                                <p class="Manage-competition-heading">ADD LEADERBOARD PACKAGE</p>
                                <select name="package" class="Manage-competition-select" aria-label="Default select example" required>
                                    <option value="">Open this select menu</option>
                                    @if(!empty($leaderboardpackages))
                                    @foreach($leaderboardpackages as $package)
                                    <option value="{{$package->id}}">{{$package->package_name}} - {{$package->price_per_hour}}</option>
                                     @endforeach
                                    @endif
                                </select>
                            </div> -->

                            
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
