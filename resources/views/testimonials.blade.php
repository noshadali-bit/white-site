@extends('layouts.main')
@section('content')
    <section class="inner_banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="inner_cont">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"TESTIMONIALS","INNERCONTENT27",);?>
                        <div class="inner_link">
                            <a href="{{ route('index') }}">home</a>
                            <a href="javascript:;">Testimonials</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured_pro alt_clint">
        <div class="fearured_bg_img">
            <img src="{{ asset('assets/images/our_clients_bg.png') }}" alt="">
        </div>
        <div class="container">
            <div class="f_section_heading">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-7">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"WHAT OUR CLIENTS SAY","INNERCONTENT28",);?>
                    </div>
                </div>
            </div>
            <div class="testimonials_slider">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonials_items">
                        <p class="test-scroll-desc">
                            {{ $testimonial->description }}
                        </p>
                        <div class="user">
                            <img src="{{ asset($testimonial->img_path) }}" alt="{{ $testimonial->name }}">
                            <div class="user_detail">
                                <b>{{ $testimonial->name }}</b>
                                <p>{{ date('y M Y', strtotime($testimonial->created_at)) }}</p>
                            </div>
                        </div>
                        <div class="quot">
                            <span><i class='bx bxs-quote-left'></i></span>
                        </div>
                    </div>
                @endforeach
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
