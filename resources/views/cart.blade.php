@extends('layouts.main')
@section('content')
    <section class="inner_banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="inner_cont">
                        <h3>Add to cart</h3>
                        <div class="inner_link">
                            <a href="{{ route('index') }}">home</a>
                            <a href="javascript:;">cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cart_product">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="cart_main">
                        <div class="cart_table">
                            @if (Session::has('cart') && !empty(Session::get('cart')))
                                <table>
                                    <tr class="cart_headings">
                                        <th>
                                            <h5>Product</h5>
                                        </th>
                                        <th>
                                            <h5>Price</h5>
                                        </th>
                                        <th>
                                            <h5>Quantity</h5>
                                        </th>
                                        <th>
                                            <h5>Subtotal</h5>
                                        </th>
                                    </tr>
                                    @php
                                        $cart = Session::get('cart');
                                        $total = 0;
                                    @endphp

                                    @foreach ($cart as $k => $val)
                                        @php
                                            if ($k == 'order_id') {
                                                continue;
                                            }
                                            $product = App\Models\Products::where('id', $val['product_id'])->first();
                                            $total += $val['sub_total'];
                                        @endphp
                                        <tr class="cart_data">
                                            <td class="cart_img">
                                                <div class="cart_pro_img">
                                                    <a href="{{ route('remove-cart', $val['cart_id']) }}">X</a> <img
                                                        src="{{ asset($product->img_path ?? 'assets/images/placeholder.png') }}" alt="{{ $product->title }}">
                                                    <h5>{{ $product->title }}</h5>
                                                </div>
                                            </td>
                                            <td>
                                                <p>${{ $product->price }}</p>
                                            </td>
                                            <td>
                                                <div class="cart-icons">
                                                    {{-- <button class="changeqty minus" onclick="decrementQuantity(this)">-</button> --}}
                                                    <input type="text" value="{{ $val['quantity'] }}" min="1"
                                                        max="10" id="quantity" data-card-id="{{ $val['cart_id'] }}"
                                                        data-price="{{ $val['price'] }}">
                                                    {{-- <button class="changeqty plus" onclick="incrementQuantity(this)">+</button> --}}
                                                </div>
                                            </td>
                                            <td>
                                                <p class="single-product-total">${{ $val['sub_total'] }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <tr>
                                    <td colspan="4">
                                        <div class="section-content text-center py-5">
                                            <div class="subHeading">There are currently no items present in the shopping
                                                cart.</div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </div>

                        <div class="shoping">
                            <div class="shop_btn">
                                <a href="{{ route('product') }}" class="themebtn"> Update Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart_box">
                        <div class="box_heading">
                            <h3>Cart Total</h3>
                        </div>
                        <div class="price">
                            <h5>Total</h5>
                            <p>${{ $total ?? ''}}</p>
                        </div>

@if(isset($total))
                        <div class="cart_btn">
                            <a href="{{ route('checkout') }}" class="themebtn">Proceed To Checkout</a>
                        </div>
                        @endif
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="recente_post">
                            <p>Search</p>
                            <form action="">
                                <input type="search">
                                <button>search</button>
                            </form>
                            <hr>
                            <div class="recent_cont alt">
                            <h4>RECENT POSTS</h4>
                            <p>Type Your Heading Here</p>
                            <p>Type Your Heading Here</p>
                            <p>Type Your Heading Here</p>
                            </div>
                            <div class="recent_cont">
                            <h4>RECENT COMMENTS</h4>
                            <p>No comments to show.</p> 
                            </div>
                            <div class="recent_cont">
                            <h4>ARCHIVES</h4>
                            <p>November 2023</p> 
                            </div>
                            <div class="recent_cont">
                            <h4>CATEGORIES</h4>
                            <p>Uncategorized</p> 
                            </div>
                        </div>
                    </div> --}}
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
            $(".changeqty").click(function() {
                var qty = $("#quantity").val()
                var rowid = $("#quantity").data('cart_id')
                var price = $("#quantity").data('price')
                console.log(qty + " " + rowid + " " + " " + price)

                if ($(this).hasClass('minus')) {
                    if (qty > 1) {
                        $("#quantity").val(--qty)
                        var total = (price * qty)
                        $(".single-product-total").text("$" + total)
                    }
                } else if ($(this).hasClass('plus')) {
                    $("#quantity").val(++qty)
                    var total = (price * qty)
                    $(".single-product-total").text("$" + total)
                }

                var token = $('meta[name="csrf-token"]').attr("content");
                var url = '{{ url('update-cart') }}';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        rowid: rowid,
                        qty: qty,
                        price: price,
                        _token: token
                    },
                    success: function() {
                        $.toast({
                            heading: 'Success!',
                            position: 'bottom-right',
                            text: 'Quantity Updated',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 2000,
                            stack: 6
                        });
                        setInterval(() => {
                            location.reload();
                        }, 2000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });


            })
        })()
    </script>
@endsection
