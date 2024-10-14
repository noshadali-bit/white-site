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
                    <a href="{{ route('product') }}" class="themebtn">SHOP JEANS</a>
                </div>
            </div>
        </div>
    </div>
</section> 

{{-- <section class="home_banner">
    <div class="banner_img">
        <img src="assets/images/banner.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner_cont">
                    <h3>Curve Confidence:</h3>
                    <h5>Denim Perfection for Every Shape</h5>
                    <p>"Discover denim perfection for every shape in our latest collection. From slim to curvy, our
                        jeans celebrate every curve with style and comfort. Find your perfect fit today.</p>
                    <a href="product.php" class="themebtn">SHOP JEANS</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}

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
            <div class="col-md-4">
                <a href="#" class="catagory_crd">
                    <div class="cata_goryImg">
                        <img src="assets/images/cbot1.jpg" alt="">
                    </div>
                    <div class="catagories_con">
                        <div class="catagory_top">
                            <h4>Modern Backpack</h4>
                            <p>Start from $199</p>
                        </div>
                        <div class="cata_botLink">Shop Now <i class='bx bx-right-arrow-alt'></i> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="catagory_crd">
                    <div class="cata_goryImg">
                        <img src="assets/images/cbot2.jpg" alt="">
                    </div>
                    <div class="catagories_con">
                        <div class="catagory_top">
                            <h4>Modern Backpack</h4>
                            <p>Start from $199</p>
                        </div>
                        <div class="cata_botLink">Shop Now <i class='bx bx-right-arrow-alt'></i> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="catagory_crd">
                    <div class="cata_goryImg">
                        <img src="assets/images/cbot3.jpg" alt="">
                    </div>
                    <div class="catagories_con">
                        <div class="catagory_top">
                            <h4>Modern Backpack</h4>
                            <p>Start from $199</p>
                        </div>
                        <div class="cata_botLink">Shop Now <i class='bx bx-right-arrow-alt'></i> </div>
                    </div>
                </a>
            </div>
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
            <div class="cata_item">
                <a href="#" class="cata_crd">
                    <div class="cata_img">
                        <img src="assets/images/cata1.jpg" alt="">
                    </div>
                    <div class="cata_content">
                        <p>Women's</p>
                        <span>23 items</span>
                    </div>
                </a>
            </div>
            <div class="cata_item">
                <a href="#" class="cata_crd">
                    <div class="cata_img">
                        <img src="assets/images/cata2.jpg" alt="">
                    </div>
                    <div class="cata_content">
                        <p>Men's</p>
                        <span>9 items</span>
                    </div>
                </a>
            </div>
            <div class="cata_item">
                <a href="#" class="cata_crd">
                    <div class="cata_img">
                        <img src="assets/images/cata3.jpg" alt="">
                    </div>
                    <div class="cata_content">
                        <p>Jewelry</p>
                        <span>31 items</span>
                    </div>
                </a>
            </div>
            <div class="cata_item">
                <a href="#" class="cata_crd">
                    <div class="cata_img">
                        <img src="assets/images/cata4.jpg" alt="">
                    </div>
                    <div class="cata_content">
                        <p>Sneakers</p>
                        <span>21 items</span>
                    </div>
                </a>
            </div>
            <div class="cata_item">
                <a href="#" class="cata_crd">
                    <div class="cata_img">
                        <img src="assets/images/cata5.jpg" alt="">
                    </div>
                    <div class="cata_content">
                        <p>Bags</p>
                        <span>5 items</span>
                    </div>
                </a>
            </div>
            <div class="cata_item">
                <a href="#" class="cata_crd">
                    <div class="cata_img">
                        <img src="assets/images/cata6.jpg" alt="">
                    </div>
                    <div class="cata_content">
                        <p>Glasses</p>
                        <span>14 items</span>
                    </div>
                </a>
            </div>
            <div class="cata_item">
                <a href="#" class="cata_crd">
                    <div class="cata_img">
                        <img src="assets/images/cata7.jpg" alt="">
                    </div>
                    <div class="cata_content">
                        <p>New Arrivals</p>
                        <span>31 items</span>
                    </div>
                </a>
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
                                <h3>new arrivals</h3>
                                <p>"Explore the latest trends with our new arrivals. From fashion-forward styles to
                                    must-have essentials, discover what's fresh and elevate your wardrobe. Shop now!"
                                </p>
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="product.php" class="themebtn">view all</a>
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
                                <img src="assets/images/pro1.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Generally Speaking V-Neck Dress in Navy Floral.</a>
                                <p>$ 46.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/pro2.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Simple Situation Mock Neck Bodysuit in White
                                    Pearl.</a>
                                <p>$ 29.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/pro3.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Borrowed Time Mineral Wash V-Neck Dress,-.</a>
                                <p>$ 56.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/pro4.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/valentine1.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
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
                                <img src="assets/images/pro1.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Generally Speaking V-Neck Dress in Navy Floral.</a>
                                <p>$ 46.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/pro2.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Simple Situation Mock Neck Bodysuit in White
                                    Pearl.</a>
                                <p>$ 29.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/pro3.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Borrowed Time Mineral Wash V-Neck Dress,-.</a>
                                <p>$ 56.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/pro4.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/valentine1.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
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
                                <img src="assets/images/pro1.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Generally Speaking V-Neck Dress in Navy Floral.</a>
                                <p>$ 46.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/pro2.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Simple Situation Mock Neck Bodysuit in White
                                    Pearl.</a>
                                <p>$ 29.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/pro3.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Borrowed Time Mineral Wash V-Neck Dress,-.</a>
                                <p>$ 56.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/pro4.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="pro_items">
                            <div class="pro_img">
                                <img src="assets/images/valentine1.png" alt="">
                            </div>
                            <div class="pro_cont">
                                <a href="product.php" class="arrivals_btn">Warm Thoughts Ribbed Top in Charcoal.</a>
                                <p>$ 30.00 usd</p>
                                <a href="cart.php" class="themebtn">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="all-in-one">
    <div class="row">
        <div class="col-md-4 p-0">
            <div class="all-in-one-img">
                <img src="assets/images/allinone1.png" alt="">
            </div>
        </div>
        <div class="col-md-4 p-0">
            <div class="all-in-one-cont">
                <div class="cont_main">
                    <h4>"Chic All-in-Ones: Explore Jumpsuits & Rompers"</h4>
                    <p>"Elevate your style effortlessly with our jumpsuit and romper collection. From casual chic to
                        dressed-up elegance, find your perfect one-piece ensemble for any occasion.</p>
                    <a href="product.php" class="themebtn">SHOP NOW</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-0">
            <div class="all-in-one-img">
                <img src="assets/images/allinone2.png" alt="">
            </div>
        </div>
    </div>
</section>

<section class="simple">
    <div class="simple_overlay">
        <img src="assets/images/simple_img.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="simple_main">
                    <h3 class="title">Simple Situation Mock Neck Bodysuit in White Pearl</h3>
                    <p class="text">Our Simple Situation Mock Neck Bodysuit is the perfect combination of style and
                        comfort. Enjoy a cozy, buttery soft fabric, featuring a mock neckline and long sleeves. The
                        thong style ensures a seamless fit and look. Look great and feel amazing with this unique and
                        comfortable bodysuit.</p>
                    <div class="simple_btn">
                        <a href="product.php" class="themebtn">Shop Now</a>
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
                            <a href="product.php" class="themebtn">view all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="pro_items">
                    <div class="pro_img">
                        <img src="assets/images/valentine1.png" alt="">
                    </div>
                    <div class="pro_cont">
                        <a href="product.php" class="arrivals_btn">Total Eclipse Tumbler In Baby Pink</a>
                        <p>$18.00 USD</p>
                        <a href="cart.php" class="themebtn">add to cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pro_items">
                    <div class="pro_img">
                        <img src="assets/images/valentine2.png" alt="">
                    </div>
                    <div class="pro_cont">
                        <a href="product.php" class="arrivals_btn">Patch Things Up Patchwork Long Sleeve Sweatshirt</a>
                        <p>$ 42.00 usd</p>
                        <a href="cart.php" class="themebtn">add to cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pro_items">
                    <div class="pro_img">
                        <img src="assets/images/valentine3.png" alt="">
                    </div>
                    <div class="pro_cont">
                        <a href="product.php" class="arrivals_btn">Classic Beauty Quilted Clutch in Brown</a>
                        <p>$ 32.00 usd</p>
                        <a href="cart.php" class="themebtn">add to cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pro_items">
                    <div class="pro_img">
                        <img src="assets/images/valentine4.png" alt="">
                    </div>
                    <div class="pro_cont">
                        <a href="product.php" class="arrivals_btn">Lumber Jill Plaid Button Down</a>
                        <p>$ 52.00 usd</p>
                        <a href="cart.php" class="themebtn">add to cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pro_items">
                    <div class="pro_img">
                        <img src="assets/images/pro1.png" alt="">
                    </div>
                    <div class="pro_cont">
                        <a href="product.php" class="arrivals_btn">Lumber Jill Plaid Button Down</a>
                        <p>$ 52.00 usd</p>
                        <a href="cart.php" class="themebtn">add to cart</a>
                    </div>
                </div>
            </div>
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
                            <img src="assets/images/wam_img1.png" alt="">
                        </div>
                        <div class="content">
                            <h3 class="title">Warm</h3>
                            <h5 class="subtitle">Thoughts Ribbed Top in Charcoal</h5>
                            <p class="text">Welcome cool weather with the cozy style of the Warm Thoughts Ribbed Top!
                                Crafted from soft waffle knit, it features a wide boat neckline, dolman sleeves, and a
                                relaxed fit. Plus, enjoy the versatility of being able to wear it off the shoulder!
                                Enjoy unbeatable comfort in this season's must-have top!</p>
                            <div class="warm_btn">
                                <a href="product.php" class="themebtn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="warm_main">
                    <div class="warm_main__items">
                        <div class="image">
                            <img src="assets/images/wam_img2.png" alt="">
                        </div>
                        <div class="content">
                            <h3 class="title">Warm</h3>
                            <h5 class="subtitle">Thoughts Ribbed Top in Charcoal</h5>
                            <p class="text">Welcome cool weather with the cozy style of the Warm Thoughts Ribbed Top!
                                Crafted from soft waffle knit, it features a wide boat neckline, dolman sleeves, and a
                                relaxed fit. Plus, enjoy the versatility of being able to wear it off the shoulder!
                                Enjoy unbeatable comfort in this season's must-have top!</p>
                            <div class="warm_btn">
                                <a href="product.php" class="themebtn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="warm_main">
                    <div class="warm_main__items">
                        <div class="image">
                            <img src="assets/images/wam_img3.png" alt="">
                        </div>
                        <div class="content">
                            <h3 class="title">Warm</h3>
                            <h5 class="subtitle">Thoughts Ribbed Top in Charcoal</h5>
                            <p class="text">Welcome cool weather with the cozy style of the Warm Thoughts Ribbed Top!
                                Crafted from soft waffle knit, it features a wide boat neckline, dolman sleeves, and a
                                relaxed fit. Plus, enjoy the versatility of being able to wear it off the shoulder!
                                Enjoy unbeatable comfort in this season's must-have top!</p>
                            <div class="warm_btn">
                                <a href="product.php" class="themebtn">Shop Now</a>
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
                    <p>New arrivals. Exclusive previews. First access to sales. Sign up to stay in the know.
                    </p>
                </div>
                <form action="" class="news_form">
                    <input type="email" placeholder="Enter Your Email">
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