@extends('layouts.app') @section('content')
<div class="wrapper admin-panal">
    <div class="container-fluid site-wrapper">
        <div class="Payment-Method-header admin-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="Payment-Method-header-text-area float-none">
                        <h3 class="Payment-Method-heading admin-heading text-center">Create competition</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row competition pt-5 create-packages">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12"> 
                       <h3 class="create-competition">ENTER POST LINK</h3>
                        <input type="text" name="post_url" value="" required="required" placeholder="Enter Instagram Post link" class="Manage-competition-input" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <h3 class="create-competition">RUN LEADERBOARD FOR</h3>
                <select class="packages-select" aria-label="Default select example">
                    <option>Choose Time</option>
                    <option>24 Hours</option>
                    <option>1 Days</option>
                    <option>2 Days</option>
                    <option>3 Days</option>
                    <option>4 Days</option>
                    <option>5 Days</option>
                    <option>6 Days</option>
                    <option>7 Days</option>
                </select>
            </div>
            <div class="col-md-6">
            <h3 class="create-competition">SELECT PACKAGE</h3>
                      <select class="packages-select" aria-label="Default select example">
                            <option>Choose Package</option>
                            <option>Package Name</option>
                            <option>Package Name</option>
                            <option>Package Name</option>
                            <option>Package Name</option>
                            <option>Package Name</option>
                            <option>Package Name</option>
                            <option>Package Name</option>
                            <option>Package Name</option>
                        </select>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <div class="Playing-button-wrapper mb-5"><a href="#" class="login-submit">Add Package</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
