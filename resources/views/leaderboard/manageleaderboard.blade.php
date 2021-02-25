@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container-fluid site-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="Payment-Method-header">
                    <!-- <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="Wallet_btn">
                                <a href="{{route('home')}}" class="Wallet"><b class="Wallet-Back">Back</b></a>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="Payment-Method-header-text-area">
                                <h3 class="Payment-Method-heading Price-Amount-heading">Manage Leaderboard</h3>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-12 position-relative text-center">
                            <div class="Payment-Method-header-text-area">
                                <h3 class="Payment-Method-heading Price-Amount-heading">Manage Leaderboard</h3>
                            </div>
                            <a class="back-button" href="{{route('home')}}">
                                    <div class="Wallet">
                                        <b class="Wallet-Back">Back</b>
                                    </div>
                                </a> 
                        </div>
                    </div>
                </div>
                <div class="Manage-competition enter-post-page">
                    <div class="Playing-button-wrapper mb-5">
                        <a href="{{route('CreateLeaderboard')}}" class="login-submit">Create Leaderboard</a>
                    </div>
                    <input type="hidden" name="active-leaderboad" id="active-leaderboad" value="{{(!empty($leaderboardsActive->active) && $leaderboardsActive->active==1) ? $leaderboardsActive->id : ''}}">

                    @if(!empty($leaderboards))
                    <!-- Manage-Leaderboard-post-wrapper-->
                    @foreach($leaderboards as $leaderboard)
                    <div class="Manage-Leaderboard-post-wrapper position-relative" id="leaderboard_post_wrapper_{{$leaderboard->id}}">
                        <div class="position-absolute b-drag-position">
                            <img src="assets/logos/b-drag.svg">
                        </div>
                        <div class="Leaderboard-post">
                            <div class="Live-post">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <div class="Live-enter-post">
                                            <div class="enter-post-header">
                                                <div class="Live-enter-post-heading">
                                                    <h3 class="Live-enter-post-heading-text">{{substr($leaderboard->post_title,0,15)}}</h3>
                                                </div>
                                                <div class="Live-enter-post-Leaderboard-button ml-auto">
                                                    <a href="{{route('Leaderboard',$leaderboard->id)}}"><button class="Live-enter-post-Leaderboard-btn"> Leaderboard ID {{$leaderboard->id}}</button></a>
                                                </div>
                                            </div>
                                            <div class="enter-post-content">
                                                <div class="enter-post-content-textare mt-5 mb-4">
                                                    <!--<textarea rows="4"></textarea>-->
                                                   <?php echo $leaderboard->media ;?>

                                                </div>
                                            </div>
                                            <div class="Live-enter-post-footer">
                                                <div class="Live-enter-post-footer-button">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a href="{{route('Leaderboard',$leaderboard->id)}}">
                                                                <button class="Live-enter-post-footer-btn btn-block">View Leaderboard</button>
                                                            </a>
                                                        </div>
                                                        @if($leaderboard->active!=2)
                                                        <div class="col-6">
                                                            <a href="{{route('EditLeaderboard',$leaderboard->id)}}" >
                                                                <button class="Live-enter-post-footer-btn btn-block">View Settings</button>
                                                            </a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="Live-enter-post ml-auto">
                                            <div class="post-header text-center">
                                                <div class="swich_button mb-4">
                                                    <span class="slider-message" style="color: red;font-weight: bold;"></span>
                                                    <label class="switch-live">
                                                        <input type="checkbox"  class="onofftoggel" id="onofftoggel_{{$leaderboard->id}}" data-id="{{$leaderboard->id}}" data-endtime="{{$leaderboard->leaderboard_end_date}}" data-starttime="{{$leaderboard->leaderboard_start_date}}"  {{($leaderboard->active == 1) ? 'checked' : ''}} {{($leaderboard->active == 2) ? 'disabled' : ''}}>
                                                        <span class="slider-live round-live" ></span>
                                                    </label>
                                                </div>
                                                <a href="#">
                                                    <button class="Go-Live-btn pl-5 pr-5 font-weight-bold">{{($leaderboard->active == 1) ? 'LIVE' : ''}}{{($leaderboard->active == 2) ? 'FINISHED' : ''}}  {{($leaderboard->active == 0) ? 'PAUSED' : ''}}</button>
                                                </a>

                                            </div>
                                            <div class="enter-post-content">
                                                <div class="Payment-Method-header shadow-none bg-transparent mt-0">
                                                    @if($leaderboard->active != 2)

                                                    <div class="row">
                                                        <div class="col-md-12 casino-timer text-center">
                                                            <div class="row" >
                                                                <div class="col-12">
                                                                    <p>Leader Board End In</p>
                                                                </div>
                                                                <div class="col-3 days"><h3 id="days">{{$leaderboard->days}}</h3><p>Days</p></div>
                                                                <div class="col-3 hours"><h3 id="hours">{{$leaderboard->hours}}</h3><p>Hours</p></div>
                                                                <div class="col-3 mins"><h3 id="mins">{{$leaderboard->mins}}</h3><p>Mins</p></div>
                                                                <div class="col-3 secs"><h3 id="secs">{{$leaderboard->secs}}</h3><p>Secs</p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="Live-enter-post-footer">
                                                <div class="Live-enter-post-footer-button">
                                                    <p class="Live-enter-post-footer-text"><span class="run-lable">{{($leaderboard->active == 2) ? 'Ran' :'Running'}}</span> for {{$leaderboard->leaderboard_run_period}} Days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
