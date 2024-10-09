<footer class="footer" style="background-image: url( {{ asset('assets/images/footer_bg.png') }}  );">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="newsletter">
                    <?php App\Helpers\Helper::inlineEditable('h3', ['class' => ' '], 'SUBSCRIBE OUR NEWSLETTER', 'HOMECONTENT11'); ?>
                    <form action="{{ route('newsletter_submit') }}" method="POST">
                        @csrf
                        <input type="email" placeholder="enter your email address" name="email"
                            value="{{ old('email') }}" required>
                        <button class="themebtn">subscribe</button>
                    </form>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="footer-info">
                    <a href="{{ route('index') }}" class="footer-info__logo ">
                        <img src="{{ asset($logo->img_path ?? 'assets/images/footer_logo.png') }}" alt="Logo"
                            class="imgFluid" />
                    </a>
                    <?php App\Helpers\Helper::inlineEditable(
                        'p',
                        ['class' => ' '],
                        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                        the industry's standard dummy text ever since the 1500s, when an unknown printer...",
                        'INNERCONTENT12'
                    ); ?>

                    <ul class="footer-info__social">
                        <li><a href="{{ $config['FACEBOOK'] }}"><i class='bx bxl-facebook'></i></a></li>
                        <li><a href="{{ $config['INSTAGRAM'] }}"><i class="bx bxl-instagram"></i></a></li>
                        <li><a href="{{ $config['TWITTER'] }}"><i class="bx bxl-twitter"></i></a></li>
                        <li><a href="{{ $config['YOUTUBE'] }}"><i class='bx bxl-youtube'></i></a></li>
                        <li><a href="{{ $config['PINTEREST'] }}"><i class='bx bxl-pinterest'></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="footer__quickLinks">
                    <?php App\Helpers\Helper::inlineEditable('h6', ['class' => 'title'], 'QUICK LINKS', 'INNERCONTENT13'); ?>
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">about us</a></li>
                        <li><a href="{{ route('product') }}">products</a></li>
                        {{--<li><a href="{{ route('blog') }}">blogs</a></li>--}}
                        <li><a href="{{ route('contact') }}">contact us</a></li>
                        <li><a href="{{ route('faqs') }}">Faqs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="footer__quickLinks">
                    <?php App\Helpers\Helper::inlineEditable('h6', ['class' => 'title'], 'OTHER LINKS', 'INNERCONTENT14'); ?>
                    <ul>
                        <li><a href="{{route('privacy_policy')}}">Privacy Policy</a></li>
<li><a href="{{route('terms_and_conditions')}}">Terms And Conditions</a></li>
<li><a href="{{route('refund_policy')}}">Refund Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="footer__newletter">
                    <?php App\Helpers\Helper::inlineEditable('h6', ['class' => 'title'], 'CONTACT INFO', 'INNERCONTENT15'); ?>
                    <p><i class='bx bxs-map'></i>{{ $config['COMPANYADDRESS'] }}</p>
                    <p><i class='bx bxs-envelope'></i>{{ $config['COMPANYEMAIL'] }}</p>
                    <p><i class='bx bxs-phone'></i>{{ $config['COMPANYPHONE'] }}</p>
                </div>
            </div>
            <div class="col-12">
                <hr class="hr wow zoomIn" data-wow-delay="300ms">
                <div class="footer__copyright">
                    <?php App\Helpers\Helper::inlineEditable('p', ['class' => ' '], 'Copyright © 2024 Alain Fernandez - All rights reserved.', 'INNERCONTENT16'); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
