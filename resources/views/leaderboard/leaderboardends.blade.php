@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container-fluid site-wrapper competition-8">
        <div class="row">
            <div class="col-12">
                <div class="Payment-Method-header">
                    <div class="row">
                        <div class="col-md-12 casino-timer text-center">
                            <div class="row">
                                <div class="col-12">
                                    <p>Leader Board End In</p>
                                </div>
                                <div class="col-3 days"><h3>05</h3><p>Days</p></div>
                                <div class="col-3 hours"><h3>12</h3><p>Hours</p></div>
                                <div class="col-3 mins"><h3>26</h3><p>Mins</p></div>
                                <div class="col-3 secs"><h3>05</h3><p>Secs</p></div>
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
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 text-right tag-friend">
                        <button>Tag Friends now</button>
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
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>1</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>2</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>3</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>4</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>5</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>6</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>7</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>8</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>9</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="position">
                                        <h5>10</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="account">
                                        <div class="table-avatar">
                                            <img class="mr-2" src="assets/logos/avatar.jpg" alt="">
                                            <span><h5>Testuser6463</h5></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2 col-xl-2 col-sm-4">
                                    <div class="mentions">
                                        <h5>230</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
