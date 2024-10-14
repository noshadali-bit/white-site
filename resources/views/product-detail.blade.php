@extends('layouts.main')
@section('content')

    <section class="inner_banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="inner_cont">
                        <h3>Shop detail</h3>
                        <div class="inner_link">
                            <a href="{{ route("product") }}">Shop</a>
                            <a href="{{ route('sub_category', $product->get_categories->slug) }}">{{ $product->get_categories->title }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product_detail">
        <div class="container">
            <div class="tabs_cont">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail_slider">
                            <swiper-container class="mySwiper" effect="cards" grab-cursor="true">

                                <swiper-slide> <a href="javascript:;" class="detail_img">
                                        <img src="{{ $product->img_path ? $product->img_path : asset('assets/images/placeholder.png') }}"
                                            alt="{{ $product->title }}">
                                    </a></swiper-slide>
                                @foreach ($product_other_imgs as $other_img)
                                    <swiper-slide> <a href="javascript:;" class="detail_img">
                                            <img src="{{ asset($other_img->img_path) }}" alt="{{ $product->title }}">
                                        </a></swiper-slide>
                                @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail_heading">
                            <ul>
                                <li><a href="{{ route('home') }}">Home </a></li>
                                <li><a
                                        href="{{ route('product', ['category' => $product->get_categories->slug ?? 'uncategorized']) }}">{{ $product->get_categories->title ?? 'uncategorized' }}
                                    </a></li>
                                <li>
                                    <b>
                                        {{ $product->slug }}
                                    </b>
                                </li>
                            </ul>
                            <h3>{{ $product->title }}</h3>
                            <h4>${{ number_format($product->price, 2) }}</h4>
                            <p>
                                {{ $product->short_desc }}
                            </p>

                            @if ($product->upc)
                                <ul>
                                    <li><b>UPC</b></li>
                                    <li>{{ $product->upc }}</li>
                                </ul>
                            @endif
                            @if ($product->manufacturer_model)
                                <ul>
                                    <li><b>MANUFACTURER MODEL</b></li>
                                    <li>{{ $product->manufacturer_model }}</li>
                                </ul>
                            @endif
                            @if ($product->type)
                                <ul>
                                    <li><b>TYPE</b> : </li>
                                    <li>{{ $product->get_sub_categories->title }}</li>
                                </ul>
                            @endif
                            @if ($product->model)
                                <ul>
                                    <li><b>MODEL</b> : </li>
                                    <li>{{ $product->model }}</li>
                                </ul>
                            @endif
                            @if ($product->calibergauge)
                                <ul>
                                    <li><b>CALIBERGAUGE</b> : </li>
                                    <li>{{ $product->calibergauge }}</li>
                                </ul>
                            @endif
                            @if ($product->manufacturer)
                                <ul>
                                    <li><b>MANUFACTURER</b> : </li>
                                    <li>{{ $product->manufacturer }}</li>
                                </ul>
                            @endif

                            <form action="{{ route('save-cart') }}" method="POST">
                                <div class="quinity_main">
                                    <input type="hidden" name="price" value="{{ number_format($product->price, 2) }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="q_input">
                                        <button type="button" class="minus" onclick="decrementValue()"><i
                                                class='bx bx-chevron-down'></i></button>
                                        <input type="text" id="counter"name="qty" value="1" min="1">
                                        <button type="button" class="plus" onclick="incrementValue()"><i
                                                class='bx bx-chevron-up'></i></button>
                                    </div>
                                    @csrf
                                    <button class="themebtn">Add to cart</button>
                                </div>
                            </form>

                            <div class="compare">
                                <a href="javascript:;"><i class='bx bx-git-compare'></i> compare</a>
                                <a href="javascript:;"><i class='bx bx-heart'></i> add to wishlist</a>
                            </div>
                            <div class="hunting">
                                <p><b>Category:</b></p>
                                <a href="javascript:;">{{ $product->get_categories->title ?? 'uncategorized' }}</a>
                            </div>
                            <div class="hunting">
                                <p><b>Sub Category:</b></p>
                                <a href="javascript:;">{{ $product->get_sub_categories->title ?? 'uncategorized' }}</a>
                            </div>
                            <ul>
                                <li>Share:</li>
                                <li><a href="javascript:;"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="javascript:;"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="javascript:;"><i class='bx bxl-pinterest'></i></a></li>
                                <li><a href="javascript:;"><i class='bx bxl-linkedin'></i></a></li>
                                <li><a href="javascript:;"><i class='bx bxl-instagram'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="detail_section">
        <div class="container">
            <div class="review_tabs">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="REVIEWS" role="tabpanel" aria-labelledby="REVIEWS-tab">
                        <h2>Product Detail</h2>
                        @php
                            $detail = unserialize($product->detail);    
                        @endphp
                        <table class="table">
                            @foreach ($detail as $item => $val)
                                @if ($val != '' || $val != NULL)
                                    <tr>
                                        <th>{{ ucfirst($item) }}</th>
                                        <td>{{ $val }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
    </section>

    <section class="review_section">
        <div class="container">

            <div class="review_tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="REVIEWS-tab" data-bs-toggle="tab" data-bs-target="#REVIEWS"
                            type="button" role="tab" aria-controls="REVIEWS" aria-selected="true">REVIEWS
                            ({{ $reviews->count() }})</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="SHIPPING-DELIVERY-tab" data-bs-toggle="tab"
                            data-bs-target="#SHIPPING-DELIVERY" type="button" role="tab"
                            aria-controls="SHIPPING-DELIVERY" aria-selected="false">SHIPPING & DELIVERY</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="REVIEWS" role="tabpanel" aria-labelledby="REVIEWS-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="review_title">
                                    <h4>REVIEWS </h4>
                                    @if (!$reviews->isEmpty())
                                        <div class="reviews">
                                            @foreach ($reviews as $review)
                                                <div class="reviews-single">
                                                    <div class="reviews-single__info">
                                                        <div class="title">
                                                            {{ date('d M Y', strtotime($review->created_at)) }}
                                                        </div>
                                                        <p>
                                                            {{ $review->message }}
                                                        </p>
                                                        <div class="mt-3">
                                                            <div class="title">{{ $review->full_name }}</div>
                                                            <div class="rating">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    @if ($i < $review->rating)
                                                                        <i class="bx bxs-star"></i>
                                                                    @else
                                                                        <i class="bx bx-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>There are no reviews yet.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="review_title">
                                    <?php App\Helpers\Helper::inlineEditable('h4', ['class' => ' '], 'BE THE FIRST TO REVIEW', 'INNERCONTENT322'); ?>
                                    <form action="{{ route('add-review') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="review_input">
                                                    <label for="">Name <span>*</span></label>
                                                    <input type="text" name="full_name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="review_input">
                                                    <label for="">Email <span>*</span></label>
                                                    <input type="email" name="email">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="review_input">
                                                    <label for="">Your review <span>*</span></label>
                                                    <textarea name="message" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="review_input">
                                                    <label for="">Your rating <span>*</span></label>
                                                    <div class="working-rating">
                                                        <input type="radio" id="star5" name="rating"
                                                            value="5">
                                                        <label class="star" for="star5" title="Awesome"></label>
                                                        <input type="radio" id="star4" name="rating"
                                                            value="4">
                                                        <label class="star" for="star4" title="Great"></label>
                                                        <input type="radio" id="star3" name="rating"
                                                            value="3">
                                                        <label class="star" for="star3" title="Very good"></label>
                                                        <input type="radio" id="star2" name="rating"
                                                            value="2">
                                                        <label class="star" for="star2" title="Good"></label>
                                                        <input type="radio" id="star1" name="rating"
                                                            value="1">
                                                        <label class="star" for="star1" title="Bad"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="review_input">
                                                    <button class="themebtn">submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="SHIPPING-DELIVERY" role="tabpanel"
                        aria-labelledby="SHIPPING-DELIVERY-tab"></div>
                </div>
            </div>
    </section>

    <section class="featured_pro detail_section">
        <div class="fearured_bg_img">
            <img src="{{ asset('assets/images/deal_bg.png') }}" alt="">
        </div>
        <div class="container">
            @if (!$related_products->isEmpty())
                <div class="f_section_heading">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-5">
                            <?php App\Helpers\Helper::inlineEditable('h3', ['class' => 'deal_h'], 'RELATED PRODUCTS', 'HOMECONTENT17'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($related_products as $i => $product)
                        @if ($i == 4)
                            @break
                        @endif
                        <div class="col-md-3">
                            <div class="featured_items">
                                <div class="featured_img">
                                    <img src="{{ $product->img_path ? $product->img_path : asset('assets/images/placeholder.png') }}"
                                        alt="{{ $product->title }}">
                                </div>
                                <div class="featured_cont">
                                    <h3>{{ $product->title }}</h3>
                                    <h2>${{ number_format($product->price, 2) }}</h2>
                                    <form action="{{ route('save-cart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="cart-price" name="price"
                                            value="{{ number_format($product->price, 2) }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="featured_btn">
                                            <div class="featured_quinity">
                                                <button type="button" class="f_minus"
                                                    onclick="decrementQuantity(this)">-</button>
                                                <input type="text" name="qty" value="1" min="1"
                                                    max="10" id="quantity">
                                                <button type="button" class="f_plus"
                                                    onclick="incrementQuantity(this)">+</button>
                                            </div>
                                            <button class="cart-btn">Add to cart</button>
                                        </div>
                                    </form>
                                    <div class="para">
                                        <p>{{ $product->short_desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            <div class="f_section_heading">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6">
                        <h3>No RELATED PRODUCTS</h3>
                    </div>
                </div>
            </div>
            @endif
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
