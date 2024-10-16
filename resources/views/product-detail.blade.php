@extends('layouts.main')
@section('content')

<section class="inner_banner">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="inner_cont">
                    <h3>Product Details</h3>
                    <div class="inner_link">
                        <a href="{{ route('home') }}">home</a> /
                        <a href="{{ route('categories') }}">Product Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product_details">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pro_detailSlidermain">
                    <div class="pro_detailSlider">
                        <div class="pro_detailItem">
                            <div class="pro_detailImg">
                                <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="pro_detailItem">
                            <div class="pro_detailImg">
                                <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="pro_detailItem">
                            <div class="pro_detailImg">
                                <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="pro_detailItem">
                            <div class="pro_detailImg">
                                <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="pro_detailItem">
                            <div class="pro_detailImg">
                                <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="pro_detailItem">
                            <div class="pro_detailImg">
                                <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="nav_sliderMain">
                        <div class="pro_navSlider">
                            <div class="pro_navItem">
                                <div class="pro_navImg">
                                    <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="pro_navItem">
                                <div class="pro_navImg">
                                    <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="pro_navItem">
                                <div class="pro_navImg">
                                    <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="pro_navItem">
                                <div class="pro_navImg">
                                    <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="pro_navItem">
                                <div class="pro_navImg">
                                    <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="pro_navItem">
                                <div class="pro_navImg">
                                    <img src="{{ asset('assets/images/pro1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pro_detailCon">
                    <h3 class="pro_detailHead">Ribbed Modal T-shirt</h3>
                    <div class="best_line">
                        <div class="best_btn">
                            Best seller
                        </div>
                        <p class="best_con">
                            <i class='bx bxs-zap bx-flashing'></i>
                            Selling fast! 56 people have this in their carts.
                        </p>
                    </div>
                    <div class="pro_detailMainPrice">
                        <div class="pro_price">
                            $7.00 <del>$10.00</del>
                        </div>
                        <div class="pro_discount">
                            20% OFF
                        </div>
                    </div>
                    <div class="views">
                        <span>20</span>
                        People are viewing this right now
                    </div>
                    <div class="color_begie">
                        <div class="pro_innerHead">
                            Color:<b>Beige</b>
                        </div>
                        <div class="wrapper">
                            <div class="radio_group">
                                <input type="radio" name="like" checked>
                                <label for="like" class="inner_color Beige"></label>
                            </div>
                            <div class="radio_group">
                                <input type="radio" name="like">
                                <label for="like" class="inner_color Black"></label>
                            </div>
                        </div>
                    </div>
                    <div class="color_begie">
                        <div class="pro_innerHead">
                            Size:<b>M</b>
                        </div>
                        <div class="wrapper">
                            <div class="radio_group">
                                <input type="radio" name="size" checked>
                                <label for="size" class="Size">S</label>
                            </div>
                            <div class="radio_group">
                                <input type="radio" name="size">
                                <label for="size" class="Size">M</label>
                            </div>
                            <div class="radio_group">
                                <input type="radio" name="size">
                                <label for="size" class="Size">L</label>
                            </div>
                        </div>
                    </div>
                    <div class="color_begie">
                        <div class="pro_innerHead">
                            <b>Quantity</b>
                        </div>
                        <div class="quantity">
                            <button class="minus" aria-label="Decrease">&minus;</button>
                            <input type="number" class="input-box" value="1" min="1" max="10">
                            <button class="plus" aria-label="Increase">&plus;</button>
                        </div>
                    </div>
                    <div class="pro_detailBtnmain">
                        <div class="pro_detailBtn">
                            <a href="#" class="themebtn">Add To Cart - $7.00</a>
                            <a href="#" class="deletBtn"><i class='bx bxs-trash'></i></a>
                            <a href="#" class="deletBtn"><i class='bx bx-check'></i></a>
                        </div>
                        <a href="#" class="themebtn pay_btn">Buy Now</a>
                        <div class="more_pay">
                            <a href="#">More payment options</a>
                        </div>
                    </div>
                    <ul class="bottomDetail_line">
                        <li><a href="#"><img src="{{ asset('assets/images/compare.svg') }}" alt="" class="compare"> <span> Compare color</span></a></li>
                        <li><a href="#"><i class='bx bx-question-mark'></i> <span> Ask a question</span></a></li>
                        <li><a href="#"><i class='bx bxs-truck'></i> <span> Delivery & Return</span></a></li>
                        <li><a href="#"><i class='bx bx-share-alt'></i> <span> Share</span></a></li>
                    </ul>
                    <div class="shiping_boxes">
                        <div class="ship_box">
                            <div class="ship_icon">
                                <i class='bx bxs-ship'></i>
                            </div>
                            <p>Estimate delivery times:<b>12-26 days</b> (International),<b>3-6 days</b> (United States).</p>
                        </div>
                        <div class="ship_box">
                            <div class="ship_icon">
                            <i class='bx bxs-package' ></i>
                            </div>
                            <p>Return within <b>30 days</b> of purchase. Duties & taxes are non-refundable.</p>
                        </div>
                    </div>
                    <div class="pay_safe"><i class='bx bx-check-shield' ></i> Guarantee Safe
                    Checkout <img src="{{ asset('assets/images/cart_img.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product_section relate">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section_title mb-5">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <div class="section_cont">
                                <h3>Related Products</h3>

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
                        <img src="{{ asset('assets/images/valentine1.png') }}" alt="">
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
                        <img src="{{ asset('assets/images/valentine2.png') }}" alt="">
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
                        <img src="{{ asset('assets/images/valentine3.png') }}" alt="">
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
                        <img src="{{ asset('assets/images/valentine4.png') }}" alt="">
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
                        <img src="{{ asset('assets/images/pro1.png') }}" alt="">
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