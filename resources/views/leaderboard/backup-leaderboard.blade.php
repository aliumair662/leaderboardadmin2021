@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container-fluid site-wrapper competition-8">
        <input type="hidden" name="current-active-leaderboar-id" id="current-active-leaderboar-id" value="{{$leaderboard->id}}">
        <div class="row">
            <div class="col-12">
                <div class="Payment-Method-header">
                    <div class="row">
                        <div class="col-md-4 casino-timer text-center">
                            <div class="Wallet_btn">
                                <a href="{{route('ManageLeaderboard')}}" class="Wallet"><b class="Wallet-Back">Back</b></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="Payment-Method-header-text-area">
                                <h3 class="Payment-Method-heading Price-Amount-heading">Leaderboard ID {{$leaderboard->id}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row work-part">
                    <div class="col-6">
                        <h4>ENTRY POST</h4>
                    </div>
                    <div class="col-6 text-right">
                        <div class="how-it-works">
                            <button>How It Works</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <form action="">
                            <div class="form-group mt-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">

                                    {{$leaderboard->post_url}}

                                </textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 text-right tag-friend">
                        <!--<button>Tag Friends now</button>-->
                        <a href="{{$leaderboard->post_url}}" target="_blank">Tag Friends now</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row leaderboard-search">
                            <div class="col-md-4">
                                <h4>THE LIVE LEADERBOARD</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group md-form form-sm form-2 pl-0">
                                    <form action="" style="display: flex;width: 100%;" method="GET" id="search-form">
                                        <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Search here..." aria-label="Search" name="keyword" value="">
                                        <div class="input-group-append">
                                                <span class="input-group-text amber lighten-3" id="basic-text1">
                                                    <i class="fas fa-search text-grey" aria-hidden="true" id="fa-search"></i>
                                                </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="leaderboard">
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>Position</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <h5>Account</h5>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>Mentions</h5>
                                    </div>
                                </div>
                            </div>
                            <div id="leaderboard-mentions-section">

                            @if(!empty($leaderboard->post_mentions))
                                <?php
                                $i=1;
                                $FinalMentions=$leaderboard->post_mentions;
                                ?>
                             @foreach($FinalMentions as $Mentions)
                            <div class="row mentions-row ownerId_{{$Mentions->ownerId}}" data-id="{{$Mentions->ownerId}}" data-mention="{{$Mentions->totalMentiones}}">
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>{{$i}}</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="{{$Mentions->ownername_profile_pic_url}}" alt="">
                                            <span><h5>{{$Mentions->ownername}}</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5 id="total_mentions_{{$Mentions->ownerId}}">{{$Mentions->totalMentiones}}</h5>
                                    </div>
                                </div>
                            </div>
                                        <?php
                                        $i++;
                                        ?>
                                @endforeach
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
