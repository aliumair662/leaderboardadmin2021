@extends('layouts.app')

@section('content')
    <div class="wrapper admin-panal">
        <div class="container-fluid site-wrapper">
            <div class="Payment-Method-header admin-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="Payment-Method-header-text-area float-none">
                            <h3 class="Payment-Method-heading admin-heading text-center">Admin Panel</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row competition admin-competition">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <a href="{{route('ManageLeaderboard')}}">
                        <button class="btn-block">Manage <br> Leaderboard</button></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <a href="{{route('Users')}}"><button class="btn-block">Users</button></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <a href="{{route('Users')}}"><button class="btn-block">Packages</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
