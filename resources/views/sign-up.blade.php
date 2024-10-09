@extends('layouts.main')
@section('content')
    <section class="inner_banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="inner_cont">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"My account","INNERCONTENT33",);?>
                        <div class="inner_link">
                            <a href="{{ route('index') }}">home</a>
                            <a href="javascript:;">My account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="login_form_section">
        <div class="container">
            <div class="login_form">
                <div class="form_heading">
                    <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"sign up","INNERCONTENT34",);?>
                </div>
                <form action="{{ route('sign-up-submit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="drop_form_input">
                                <label for="">Full Name <s>*</s></label>
                                <input value="{{ old('full_name') }}" type="text" placeholder="Enter Name"
                                    name="full_name" required>
                                @error('full_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="drop_form_input">
                                <label for="">Phone <s>*</s></label>
                                <input value="{{ old('phone') }}" type="text" placeholder="Enter Phone" name="phone"
                                    required>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="drop_form_input">
                                <label for="">Email <s>*</s></label>
                                <input value="{{ old('email') }}" type="email" placeholder="Enter Email" name="email"
                                    required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="drop_form_input">
                                <label for="">Password<s>*</s></label>
                                <input type="password" placeholder="********" name="password"
                                    required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="drop_form_btn">
                                <button class="themebtn">Sign Up</button>
                                <div class="password_lost justify-content-center">
                                    <div class="checkbox">
                                        <label for="check">
                                            Already Have an Account
                                            <a href="{{ route('login') }}">Login</a>
                                        </label>
                                    </div>
                                </div>
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
