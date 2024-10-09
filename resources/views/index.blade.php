@extends('layouts.main')
@section('content')

    
        <section class="home_banner">
            <div class="banner_img">
                <img src="{{ asset('assets/images/home-banner.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="banner_cont">
                            <h3>BUCKLE UP AND</h3>
                            <h3 class="head_2"><span>STAY ARMED</span></h3>
                            <a href="{{ route('product') }}" class="themebtn">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="category_section">
        @if (!$product_categories->isEmpty())
            <div class="container">
                <div class="section_heading">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-5">
                            <?php App\Helpers\Helper::inlineEditable('h3', ['class' => 'text-center'], 'OUR CATEGORIES', 'HOMECONTENT2'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($product_categories as $i => $category)
                    @if($i == 3)
                    @break
                    @endif
                        <div class="col-md-4">
                            <div class="category_items wow fadeInLeft">
                                <div class="cat_img">
                                    <img src="{{ $category->img_path??asset('assets/images/416x587.png') }}" alt="{{ $category->title }}">
                                </div>
                                <div class="cat_cont">
                                    <h3>{{ $category->title }}</h3>
                                    <a href="{{ route('product', ['category' => $category->slug]) }}" class="themebtn">shop now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="container">
                <div class="section_heading">
                    <h3>Categories are not available.</h3>
                </div>
            </div>
        @endif
    </section>



    <section class="about_section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="about_img wow fadeInLeft" data-wow-delay="300ms">
                        <img src="{{ asset('assets/images/about_img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about_cont wow fadeInRight" data-wow-delay="1s">
                        <?php App\Helpers\Helper::inlineEditable('h3', ['class' => ' '], 'about  ALAIN FERNANDEZ', 'HOMECONTENT5'); ?>
                        <?php App\Helpers\Helper::inlineEditable(
                            'p',
                            ['class' => ' '],
                            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        popularised in the 1960s with the release of Letraset sheets containing",
                            'HOMECONTENT6',
                        ); ?>

                        <a href="{{ route('about') }}" class="themebtn">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="featured_pro">
        <div class="fearured_bg_img">
            <img src="{{ asset('assets/images/deal_bg.png') }}" alt="">
        </div>
        <div class="container">
           
                <div class="f_section_heading">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <h3>No deals available</h3>
                        </div>
                    </div>
                </div>
           
            <div class="featured_allbtn">
                <a href="{{ route('product') }}" class="themebtn">view all product</a>
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
                <div class="col-md-6">
                    <?php App\Helpers\Helper::inlineEditable('h3', ['class' => ' '], 'WHAT OUR CLIENTS SAY', 'HOMECONTENT9'); ?>
                </div>
            </div>
        </div>
       

        <div class="testo_btn">
            <a href="{{ route('testimonials') }}" class="themebtn">view all testimonial <i
                    class='bx bx-right-arrow-alt'></i> </a>
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
