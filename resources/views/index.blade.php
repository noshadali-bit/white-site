@extends('layouts.main')
@section('content')

<section class="home_banner">
    <div class="banner_img">
        <img src="{{ $welcome_slider->img_path }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner_cont">
                    {!! $welcome_slider->long_desc !!}
                    <a href="{{ route('product') }}" class="themebtn">SHOP NOW</a>
                </div>
            </div>
        </div>
    </div>
</section> 

<section class="catagories_bottom">
    <div class="cata_botSlider">
        <div class="cata_bot_item">FREE SHIPPING AND RETURN</div>
        <div class="cata_bot_item">NEW SEASON, NEW STYLES: FASHION SALE YOU CAN'T MISS</div>
        <div class="cata_bot_item">LIMITED TIME OFFER: FASHION SALE YOU CAN'T RESIST</div>
        <div class="cata_bot_item">FREE SHIPPING AND RETURN</div>
        <div class="cata_bot_item">NEW SEASON, NEW STYLES: FASHION SALE YOU CAN'T MISS</div>
        <div class="cata_bot_item">LIMITED TIME OFFER: FASHION SALE YOU CAN'T RESIST</div>
        <div class="cata_bot_item">FREE SHIPPING AND RETURN</div>
        <div class="cata_bot_item">NEW SEASON, NEW STYLES: FASHION SALE YOU CAN'T MISS</div>
        <div class="cata_bot_item">LIMITED TIME OFFER: FASHION SALE YOU CAN'T RESIST</div>
    </div>
    <div class="container pt-5">
        <div class="row">
            @foreach ($in_deal_products as $item)
            <div class="col-md-4">
                <a href="{{ $item->slug }}" class="catagory_crd">
                    <div class="cata_goryImg">
                        <img src="{{ asset($item->img_path) }}" alt="">
                    </div>
                    <div class="catagories_con">
                        <div class="catagory_top">
                            <h4>{{ $item->title }}</h4>
                            <p>Start from ${{ $item->price }}</p>
                        </div>
                        <div class="cata_botLink">Shop Now <i class='bx bx-right-arrow-alt'></i> </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="season_cata">
    <div class="container">
        <div class="season_top">
            <div class="sec_head">Season Collection</div>
            <a href="#" class="sec_link">View All Catagories <i class='bx bx-right-arrow-alt'></i></a>
        </div>
        <div class="cata_slider">
            @foreach ($collections as $item)
            <div class="cata_item">
                <a href="#" class="cata_crd">
                    <div class="cata_img">
                        <img src="{{ asset($item->img_path) }}" alt="">
                    </div>
                    <div class="cata_content">
                        <p>{{ $item->title }}</p>
                        <span>
                            @php
                                $count = 0;
                                foreach ($item->collection_categories as $key => $value) {
                                    $count += $value->get_products->count();
                                }

                            @endphp
                            {{ $count }} items</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- <section class="product_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section_title mb-5">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <div class="section_cont">
                                <h3>new arrivals</h3>
                                <p>"Explore the latest trends with our new arrivals. From fashion-forward styles to
                                    must-have essentials, discover what's fresh and elevate your wardrobe. Shop now!"
                                </p>
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="{{ route('product') }}" class="themebtn">view all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Best Arrivals</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">New Arrivals</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">On Sale</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Generally Speaking V-Neck Dress in Navy Floral.</a>
                                <p>$ 46.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro2.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Simple Situation Mock Neck Bodysuit in White
                                    Pearl.</a>
                                <p>$ 29.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro3.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Borrowed Time Mineral Wash V-Neck Dress,-.</a>
                                <p>$ 56.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro4.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/valentine1.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Generally Speaking V-Neck Dress in Navy Floral.</a>
                                <p>$ 46.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro2.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Simple Situation Mock Neck Bodysuit in White
                                    Pearl.</a>
                                <p>$ 29.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro3.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Borrowed Time Mineral Wash V-Neck Dress,-.</a>
                                <p>$ 56.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro4.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/valentine1.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Generally Speaking V-Neck Dress in Navy Floral.</a>
                                <p>$ 46.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro2.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Simple Situation Mock Neck Bodysuit in White
                                    Pearl.</a>
                                <p>$ 29.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro3.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Borrowed Time Mineral Wash V-Neck Dress,-.</a>
                                <p>$ 56.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/pro4.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="{{ asset('assets/images/valentine1.png') }}" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="{{ route('product') }}" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> --}}

<section class="all-in-one">
    <div class="row">
        <div class="col-md-4 p-0">
            <div class="all-in-one-img">
                <?php App\Helpers\Helper::dynamicImages(asset(''),$connect.'assets/images/allinone1.png',array("data-width"=>"100","data-height"=>"100","class"=>""),$title.'-IMG-1'); ?>
            </div>
        </div>
        <div class="col-md-4 p-0">
            <div class="all-in-one-cont">
                <div class="cont_main">
                    <?php App\Helpers\Helper::inlineEditable('h4', ['class' => ''], '"Chic All-in-Ones: Explore Jumpsuits & Rompers"', 'WEL1'); ?>
                    <?php App\Helpers\Helper::inlineEditable('p', ['class' => ''], '"Elevate your style effortlessly with our jumpsuit and romper collection. From casual chic to
                        dressed-up elegance, find your perfect one-piece ensemble for any occasion."', 'WEL2'); ?>
                    
                    <a href="{{ route('product') }}" class="themebtn">SHOP NOW</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-0">
            <div class="all-in-one-img">
                <?php App\Helpers\Helper::dynamicImages(asset(''),$connect.'assets/images/allinone2.png',array("data-width"=>"100","data-height"=>"100","class"=>""),$title.'-IMG-2'); ?>
            </div>
        </div>
    </div>
</section>

<section class="simple">
    <div class="simple_overlay">
        <?php App\Helpers\Helper::dynamicImages(asset(''),$connect.'assets/images/simple_img.png',array("data-width"=>"100","data-height"=>"100","class"=>""),$title.'-IMG-3'); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="simple_main">
                    <?php App\Helpers\Helper::inlineEditable('h3', ['class' => 'title'], 'Simple Situation Mock Neck Bodysuit in White Pearl', 'WEL3'); ?>
                    <?php App\Helpers\Helper::inlineEditable('p', ['class' => 'text'], 'Our Simple Situation Mock Neck Bodysuit is the perfect combination of style and
                        comfort. Enjoy a cozy, buttery soft fabric, featuring a mock neckline and long sleeves. The
                        thong style ensures a seamless fit and look. Look great and feel amazing with this unique and
                        comfortable bodysuit.', 'WEL4'); ?>
                    <div class="simple_btn">
                        <a href="{{ route('product') }}" class="themebtn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section_title mb-5">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <div class="section_cont">
                                <h3>Valentine 24</h3>

                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="{{ route('product') }}" class="themebtn">view all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($feature_products as $item)
            <div class="col-md-3">
                <div class="pro_items">
                    <div class="pro_img">
                        <img src="{{ asset($item->img_path) }}" alt="">
                    </div>
                    <div class="pro_cont">
                        <a href="{{ route('product-detail', $item->slug) }}" class="arrivals_btn">{{ $item->title }}</a>
                        <p>${{ $item->price }} USD</p>
                        <button class="themebtn cart-btn" data-product_id="{{ $item->id }}">
                            Add To Cart
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="warm">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-4">
                <div class="warm_main">
                    <div class="warm_main__items">
                        <div class="image">
                            <?php App\Helpers\Helper::dynamicImages(asset(''),$connect.'assets/images/wam_img1.png',array("data-width"=>"100","data-height"=>"100","class"=>""),$title.'-IMG-4'); ?>
                        </div>
                        <div class="content">

                            <?php App\Helpers\Helper::inlineEditable('h3', ['class' => 'title'], 'Warm', 'WEL5'); ?>
                            <?php App\Helpers\Helper::inlineEditable('h5', ['class' => 'subtitle'], 'Thoughts Ribbed Top in Charcoal', 'WEL6'); ?>
                            <?php App\Helpers\Helper::inlineEditable('p', ['class' => 'text'], 'Welcome cool weather with the cozy style of the Warm Thoughts Ribbed Top!
                                Crafted from soft waffle knit, it features a wide boat neckline, dolman sleeves, and a
                                relaxed fit. Plus, enjoy the versatility of being able to wear it off the shoulder!
                                Enjoy unbeatable comfort in this season`s must-have top!', 'WEL7'); ?>

                            <div class="warm_btn">
                                <a href="{{ route('product') }}" class="themebtn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="warm_main">
                    <div class="warm_main__items">
                        <div class="image">
                            <?php App\Helpers\Helper::dynamicImages(asset(''),$connect.'assets/images/wam_img2.png',array("data-width"=>"100","data-height"=>"100","class"=>""),$title.'-IMG-5'); ?>
                        </div>
                        <div class="content">
                            <?php App\Helpers\Helper::inlineEditable('h3', ['class' => 'title'], 'Warm', 'WEL8'); ?>
                            <?php App\Helpers\Helper::inlineEditable('h5', ['class' => 'subtitle'], 'Thoughts Ribbed Top in Charcoal', 'WEL9'); ?>
                            <?php App\Helpers\Helper::inlineEditable('p', ['class' => 'text'], 'Welcome cool weather with the cozy style of the Warm Thoughts Ribbed Top!
                                Crafted from soft waffle knit, it features a wide boat neckline, dolman sleeves, and a
                                relaxed fit. Plus, enjoy the versatility of being able to wear it off the shoulder!
                                Enjoy unbeatable comfort in this season`s must-have top!', 'WEL10'); ?>
                            <div class="warm_btn">
                                <a href="{{ route('product') }}" class="themebtn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="warm_main">
                    <div class="warm_main__items">
                        <div class="image">
                            <?php App\Helpers\Helper::dynamicImages(asset(''),$connect.'assets/images/wam_img3.png',array("data-width"=>"100","data-height"=>"100","class"=>""),$title.'-IMG-5'); ?>
                        </div>
                        <div class="content">
                            <?php App\Helpers\Helper::inlineEditable('h3', ['class' => 'title'], 'Warm', 'WEL11'); ?>
                            <?php App\Helpers\Helper::inlineEditable('h5', ['class' => 'subtitle'], 'Thoughts Ribbed Top in Charcoal', 'WEL12'); ?>
                            <?php App\Helpers\Helper::inlineEditable('p', ['class' => 'text'], 'Welcome cool weather with the cozy style of the Warm Thoughts Ribbed Top!
                                Crafted from soft waffle knit, it features a wide boat neckline, dolman sleeves, and a
                                relaxed fit. Plus, enjoy the versatility of being able to wear it off the shoulder!
                                Enjoy unbeatable comfort in this season`s must-have top!', 'WEL13'); ?>
                            <div class="warm_btn">
                                <a href="{{ route('product') }}" class="themebtn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="news_letter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section_cont news_head text-center ">
                    <h3>Newsletter</h3>
                    <?php App\Helpers\Helper::inlineEditable('p', ['class' => ''], 'New arrivals. Exclusive previews. First access to sales. Sign up to stay in the know.', 'WEL14'); ?>
                </div>
                <form action="{{ route('newsletter_submit') }}" method="POST" class="news_form">
                    @csrf
                    <input type="email" name="email" placeholder="Enter Your Email">
                    <button type="submit" class="themebtn">SUBMIT</button>
                </form>
            </div>
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