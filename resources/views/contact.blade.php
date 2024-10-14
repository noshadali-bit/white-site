@extends('layouts.main')
@section('content')
    <section class="inner_banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="inner_cont">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"Contact Us","INNERCONTENT29",);?>
                        <div class="inner_link">
                            <a href="{{ route('home') }}">home</a>
                            <a href="javascript:;">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact_form_section">
        <div class="container">
            <div class="contact_form">
                <div class="contact_heading">
                    <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"GET IN TOUCH","INNERCONTENT30",);?>
                </div>
                <form action="{{ route('contact-us-submit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form_input">
                                <input required type="text" placeholder="name:" name="fname"
                                    value="{{ old('fname') }}">
                                @error('fname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form_input">
                                <input required type="text" placeholder="last name:" name="lname"
                                    value="{{ old('lname') }}">
                                @error('lname')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form_input">
                                <input required type="email" placeholder="email:" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form_input">
                                <input required type="text" placeholder="phone:" name="phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form_input">
                                <textarea required name="message" id="" cols="30" rows="5" placeholder="message:">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form_btn">
                                <button class="themebtn">submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection
