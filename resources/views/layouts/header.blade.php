<div class="responsive_header">
    <div class="close_btn" onclick="closeside()">
        <i class='bx bx-x' style='color:#ffffff' ></i>
    </div>
    <ul class="responsive_menu">
        <li><a href="{{ route('index') }}">HOME</a></li>
        <li><a href="{{ route('about') }}">ABOUT US</a></li>
        <li><a href="{{ route('categories') }}">CATOGRIES</a></li>
        <li><a href="{{ route('product') }}">SHOP</a></li>
        {{--<li><a href="{{ route('blog') }}">BLOGS</a></li>--}}
        <li><a href="{{ route('testimonials') }}">TESTIMONIALS</a></li>
        <li><a href="{{ route('contact') }}">CONTACT US</a></li>
    </ul>
    <ul class="second_resUl">
        <div class="search_bar">
            <ul class="d-flex gap-3">
                @if (Auth::check())
                <li class="form_dropdown "><a href="{{ route('dashboard.index') }}" class="login_link">Dashboard</a></li>
                <li class="form_dropdown"><a href="{{ route('logout') }}" class="login_link">Logout</a>
                </li>
                @else
                <li class="form_dropdown {{ $errors->has('email') || $errors->has('password') ? 'show' : '' }}">
                    <a href="{{ route('login') }}" class="login_link">LOGIN /
                        REGISTER</a>
                    <div class="dropdown_form">
                        <div class="dropdown_heading">
                            <?php App\Helpers\Helper::inlineEditable('h3', ['class' => ' '], 'Sign in', 'INNERCONTENT41'); ?>
                            <a href="{{ route('sign_up') }}">Create an Account</a>
                        </div>
                        <form action="{{ route('login-submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="drop_form_input">
                                        <label for="">Email address <s>*</s></label>
                                        <input type="text" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="drop_form_input">
                                        <label for="">Password<s>*</s></label>
                                        <input type="password" placeholder="********" name="password" value="{{ old('password') }}">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="drop_form_btn">
                                        <button class="themebtn">log in</button>
                                        <div class="rest_password justify-content-center">
                                            <a href="{{ route('forget-password') }}">Lost your
                                                password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                @endif
            </ul>
        </div>
        <div class="shoping_cart">
            @php
            $cart = Session::get('cart');
            @endphp

            <a href="javascript:;" class="mycart"><i class='bx bx-shopping-bag'></i> <span>
                    {{ $cart ? count($cart) : '0' }}
                </span></a>

        </div>
    </ul>
</div>
<header class="header">
    <div class="header_top">
        <div class="container">
            <div class="top_bar">
                <div class="contact_link">
                    <a href="tel:{{ $config['COMPANYPHONE'] }}"><i class='bx bxs-phone-call'></i> CALL US NOW :
                        {{ $config['COMPANYPHONE'] }}</a>
                    <a href="mailto:{{ $config['COMPANYEMAIL'] }}"><i class='bx bxs-envelope'></i> Email :
                        {{ $config['COMPANYEMAIL'] }}</a>
                </div>
                <div class="social_links">
                    <ul>
                        <li><a href="{{ $config['FACEBOOK'] }}"><i class='bx bxl-facebook'></i></a></li>
                        <li><a href="{{ $config['INSTAGRAM'] }}"><i class="bx bxl-instagram"></i></a></li>
                        <li><a href="{{ $config['TWITTER'] }}"><i class="bx bxl-twitter"></i></a></li>
                        <li><a href="{{ $config['YOUTUBE'] }}"><i class='bx bxl-youtube'></i></a></li>
                        <li><a href="{{ $config['PINTEREST'] }}"><i class='bx bxl-pinterest'></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-main">

            <a href="{{ route('home') }}" class="header__logo">
                <img src="{{ asset($logo->img_path ?? 'assets/images/logo.png') }}" alt="Logo" class="imgFluid" />
            </a>
            <div class="menu_btn" onclick="openside()">
                <i class='bx bx-menu'></i>
            </div>
            <ul class="header-main__nav">
                <li><a href="{{ route('index') }}">HOME</a></li>
                <li><a href="{{ route('about') }}">ABOUT US</a></li>
                <li><a href="{{ route('categories') }}">CATOGRIES</a></li>
                <li><a href="{{ route('product') }}">SHOP</a></li>
                {{--<li><a href="{{ route('blog') }}">BLOGS</a></li>--}}
                <li><a href="{{ route('testimonials') }}">TESTIMONIALS</a></li>
                <li><a href="{{ route('contact') }}">CONTACT US</a></li>
            </ul>

            <div class="header_right">
                <div class="search_bar">
                    <ul class="d-flex gap-3">
                        @if (Auth::check())
                        <li class="form_dropdown "><a href="{{ route('dashboard.index') }}" class="login_link">Dashboard</a></li>
                        <li class="form_dropdown"><a href="{{ route('logout') }}" class="login_link">Logout</a>
                        </li>
                        @else
                        <li class="form_dropdown {{ $errors->has('email') || $errors->has('password') ? 'show' : '' }}">
                            <a href="{{ route('login') }}" class="login_link">LOGIN /
                                REGISTER</a>
                            <div class="dropdown_form">
                                <div class="dropdown_heading">
                                    <?php App\Helpers\Helper::inlineEditable('h3', ['class' => ' '], 'Sign in', 'INNERCONTENT41'); ?>
                                    <a href="{{ route('sign_up') }}">Create an Account</a>
                                </div>
                                <form action="{{ route('login-submit') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="drop_form_input">
                                                <label for="">Email address <s>*</s></label>
                                                <input type="text" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="drop_form_input">
                                                <label for="">Password<s>*</s></label>
                                                <input type="password" placeholder="********" name="password" value="{{ old('password') }}">
                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="drop_form_btn">
                                                <button class="themebtn">log in</button>
                                                <div class="rest_password justify-content-center">
                                                    <a href="{{ route('forget-password') }}">Lost your
                                                        password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="shoping_cart">
                    @php
                    $cart = Session::get('cart');
                    @endphp

                    <a href="javascript:;" class="mycart"><i class='bx bx-shopping-bag'></i> <span>
                            {{ $cart ? count($cart) : '0' }}
                        </span></a>

                </div>
            </div>
        </div>
    </div>
    <div class="heder_bottom">
        <div class="container">
            <p>HAND-PICKED DAILY FIREARMS AND AMMUNITION DEALS</p>
        </div>
    </div>
</header>


<section class="cart">
    <div class="sidebar_cart">
        <div id="mySidenav" class="sidenav">
            <div class="cart_heading">
                <h3>Shopping cart</h3>
                <a href="javascript:void(0)" class="closebtn"><span>×</span>close</a>
            </div>
            @if (Session::has('cart') && !empty(Session::get('cart')))
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
            <div class="cart_pro">
                <div class="cart_img">
                    <img src="{{ $product->img_path ?? asset('assets/images/placeholder.png') }}" alt="{{ $product->title }}">
                </div>
                <div class="cartr_cont">
                    <h5>{{ $product->title }}</h5>
                    <p><span>{{ $val['quantity'] }} x</span> ${{ $product->price }}</p>
                    <a href="{{ route('remove-cart', $val['cart_id']) }}" class="close_pro">x</a>
                </div>
            </div>
            @endforeach


            <div class="total">
                <h4>Subtotal:</h4>
                <p>${{ $total }}</p>
            </div>
            @endif
            <div class="cart_total">
                <div class="subtotal_btn">
                    <a href="{{ route('cart') }}" class="themebtn alt">view cart</a>
                    <a href="{{ route('checkout') }}" class="themebtn">Check out</a>
                </div>
            </div>
        </div>
    </div>
</section>