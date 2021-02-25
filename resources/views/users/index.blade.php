@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container-fluid site-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="Payment-Method-header">
                    <div class="row">
                        <div class="col-md-12 position-relative text-center">
                            <div class="Payment-Method-header-text-area">
                                <h3 class="Payment-Method-heading Price-Amount-heading">Users</h3>
                            </div>
                            <a class="back-button" href="{{route('home')}}">
                                    <div class="Wallet">
                                        <b class="Wallet-Back">Back</b>
                                    </div>
                                </a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row leaderboard-search user">
                    <div class="col-md-3">
                        <h4>USERS</h4>
                    </div>
                    <div class="col-9 col-md-6">
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <form action="" style="display: flex; width: 100%;" method="GET" id="search-form">
                                <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search here..." aria-label="Search" onkeyup="searchUser()" name="keyword" id="keyword" value="" />
                                <div class="input-group-append">
                                            <span class="input-group-text amber lighten-3" id="basic-text1">
                                                <i class="fas fa-search text-grey" aria-hidden="true" id="fa-search"></i>
                                            </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-3 upload-document">
                        <a href="{{route('UserListPdf')}}" class="mr-2"><img src="assets/logos/Icon awesome-file-pdf.svg" alt=""><br><span>PDF</span></a>
                        <a href="{{route('UserListexport')}}" class="mr-2"><img src="assets/logos/Icon awesome-file-csv.svg" alt=""><br><span>CSV</span></a>
                        <a href="{{route('UserListexportCSV')}}"><img src="assets/logos/Path 7127.svg" alt=""><br><span>XLSX</span></a>
                    </div>
                </div>
            </div>
            <div class="col-12 player-data user-table">
                <table class="table table-borderless table-responsive" id="UserTable">
                    <tbody><tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                      
                        <th>Email</th>
                        <th>Password</th>
                          <th>Instagram</th>
                         <th>Ip</th>
                          <th>Country</th>
                    </tr>
                    @if(!empty($users))
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        
                        <td>{{$user->email}}</td>
                        <td>{{$user->password_text}}</td>
                         <td>{{$user->instagramUsername}}</td>
                          <td>{{$user->ip}}</td>
                           <td>{{$user->country}}</td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody></table>
            </div>
        </div>
    </div>
</div>
@endsection
