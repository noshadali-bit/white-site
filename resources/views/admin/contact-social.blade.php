@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Contact / Social Info Management</h2>
                    </div>
                </div>

            </div>
            <form action="{{ route('admin.saveSocialInfo') }}" method="POST" class="main-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Facebook:</label>
                            <input type="url" name="FACEBOOK" required class="form-control"
                                value="{{ $config['FACEBOOK'] }}" placeholder="Enter Facebook Address">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Instagram:</label>
                            <input type="url" name="INSTAGRAM" required class="form-control"
                                value="{{ $config['INSTAGRAM'] }}" placeholder="Enter Instagram Address">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Twitter:</label>
                            <input type="url" name="TWITTER" required class="form-control"
                                value="{{ $config['TWITTER'] }}" placeholder="Enter Twitter Address">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Youtube:</label>
                            <div class="relative-div">
                                <input type="url" name="YOUTUBE" required class="form-control"
                                    value="{{ $config['YOUTUBE'] }}" placeholder="Enter Youtube link">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Pinterest:</label>
                            <div class="relative-div">
                                <input type="text" name="PINTEREST" required class="form-control"
                                    value="{{ $config['PINTEREST'] }}" placeholder="Enter Pinterest Id">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Phone:</label>
                            <div class="relative-div">
                                <input type="text" name="COMPANYPHONE" required class="form-control"
                                    value="{{ $config['COMPANYPHONE'] }}" placeholder="Enter Phone Number">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Email:</label>
                            <div class="relative-div">
                                <input type="email" name="COMPANYEMAIL" required class="form-control"
                                    value="{{ $config['COMPANYEMAIL'] }}" placeholder="Enter Email Address">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label>Address:</label>
                            <div class="relative-div">
                                <input type="text" name="COMPANYADDRESS" required class="form-control"
                                    value="{{ $config['COMPANYADDRESS'] }}" placeholder="Enter Address">
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="form-group">
                            <label>Shipping Price:</label>
                            <div class="relative-div">
                                <input type="text" name="SHIPPINGPRICE" required class="form-control"
                                    value="{{ $config['SHIPPINGPRICE'] }}" placeholder="Enter Third Phone Number">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12">
                        <div class="text-center">
                            <button type="submit" class="primary-btn primary-bg">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <style type="text/css">

    </style>
@endsection
@section('js')
@endsection
