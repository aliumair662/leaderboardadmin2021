@extends('layouts.app') @section('content')

<form method="POST" action="{{ route('addpackage') }}">
                                @csrf
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

        <div class="row pt-5 create-packages">
             <div class="col-md-12">
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
                           
                       </div>      
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="text" name="package_name" value="" required="required" placeholder="Enter Package Name" class="Manage-competition-input" />
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4>Free time for users</h4>
                <select class="packages-select" aria-label="Default select example" name="free_time" required>
                    <option value="0">Choose One</option>
                    <option value="1">1 Hour</option>
                    <option value="2">2 Hours</option>
                    <option value="3">3 Hours</option>
                    <option value="4">4 Hours</option>
                    <option value="5">5 Hours</option>
                    <option value="6">6 Hours</option>
                    <option value="7">7 Hours</option>
                    <option value="8">8 Hours</option>
                </select>
            </div>
            <div class="col-md-3">
                <h4>Per Hour Price</h4>
                <input type="text" name="price_per_hour" value="" required="required" placeholder="£" class="Manage-competition-input" />
            </div>
            <div class="col-md-3">
                <h4>Free Credits</h4>
                <select class="packages-select" aria-label="Default select example" name="free_credit" required>
                    <option value="0">Choose One</option>
                    <option value="10">£10</option>
                    <option value="20">£20</option>
                    <option value="30">£30</option>
                    <option value="40">£40</option>
                    <option value="50">£50</option>
                    <option value="60">£60</option>
                    <option value="70">£70</option>
                    <option value="80">£80</option>
                    <option value="90">£90</option>
                    <option value="100">£100</option>
                </select>
            </div>
            <div class="col-md-3">
                <h4>Maximum Purchases</h4>
                <select class="packages-select" aria-label="Default select example" name="max_purchase" required>
                    <option value="0">Choose One</option>
                    <option value="1">1x</option>
                    <option value="2">2x</option>
                    <option value="3">3x</option>
                    <option value="4">4x</option>
                    <option value="5">5x</option>
                    <option value="6">6x</option>
                    <option value="7">7x</option>
                    <option value="8">8x</option>
                    <option value="9">9x</option>
                </select>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <div class="Playing-button-wrapper mb-5">
                    <button type="submit" class="login-submit">Add Package</button>
            </div>
        </div>

    </div>
   
</div>
</form>
@endsection
