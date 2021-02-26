@extends('layouts.app') @section('content')
<div class="wrapper admin-panal">
    <div class="container-fluid site-wrapper">
        <div class="Payment-Method-header admin-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="Payment-Method-header-text-area float-none">
                        <h3 class="Payment-Method-heading admin-heading text-center">Create Packages</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row competition pt-5 create-packages">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="text" name="post_url" value="" required="required" placeholder="Enter Package Name" class="Manage-competition-input" />
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Free time for users</h4>
                <select class="packages-select" aria-label="Default select example">
                    <option>Choose Hours</option>
                    <option>1 Hour</option>
                    <option>2 Hours</option>
                    <option>3 Hours</option>
                    <option>4 Hours</option>
                    <option>5 Hours</option>
                    <option>6 Hours</option>
                    <option>7 Hours</option>
                    <option>8 Hours</option>
                </select>
            </div>
            <div class="col-md-4">
                <h4>Per Hour Price</h4>
                <input type="text" name="post_url" value="" required="required" placeholder="£" class="Manage-competition-input" />
            </div>
            <div class="col-md-4">
                <h4>Maximum Purchases</h4>
                <select class="packages-select" aria-label="Default select example">
                    <option>Select Package</option>
                    <option>1x</option>
                    <option>2x</option>
                    <option>3x</option>
                    <option>4x</option>
                    <option>5x</option>
                    <option>6x</option>
                    <option>7x</option>
                    <option>8x</option>
                    <option>9x</option>
                </select>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <div class="Playing-button-wrapper mb-5"><a href="#" class="login-submit">Add Package</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
