<div class="overlay"></div>
<div class="cart_crd">
    
</div>
    <div class="search_main">
        <div class="srh_cross"><i class='bx bx-x'></i></div>
        <h3 class="srh_head">SEARCH HERE</h3>
        <form action="#" class="form_search">
            <input type="text" placeholder="Search here...">
            <button class="srh_btn" type="submit"><i class='bx bx-search'></i></button>
        </form>
    </div>
    <header class="header">
        <div class="header_top">
            <div class="container">
                <div class="top">
                    <div class="address">
                        <a href="{{ route('login') }}">Sign In</a>
                        <a href="javascript:;">Tracking Info</a>
                        <a href="javascript:;">Corporate Inquiry</a>
                    </div>
                    <ul class="languages">
                        <li><a href="{{ route('cart') }}"><i class='bx bxs-cart'></i></a></li>
                        <li><a href="javascript:;" class="srh_btn"><i class='bx bx-search'></i> search
                            </a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="container py-4">
            <div class="main_logo">
                <a href="{{ route('home') }}" class="header__logo">
                    <img src="{{ asset($logo->img_path) }}" alt="Logo" class="imgFluid" />
                </a>
            </div>
            <div class="header-main">
                <div class="nav_bar">

                    <ul class="header-main__nav">
                        @foreach ($collections as $item)
                        <li><a href="">{{ $item->title }}</a>
                            <div class="cat_menu">
                                <div class="container">
                                    <div class="main_innerCatMenu">
                                        <div class="cata_left">
                                            <div class="men_img">
                                                <img src="{{ asset($item->img_path) }}" alt="">
                                            </div>
                                            <div class="cata_innerMenu">
                                                @foreach ($item->collection_categories as $category)
                                                <a href="#">{{ $category->title }}</a>
                                                    @if(count($category->get_subcatgory) > 0)
                                                        @foreach ($category->get_subcatgory as $sub_cat)
                                                        <ul>
                                                            <li><a href="#">{{ $sub_cat->title }}</a></li>
                                                        </ul>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        <li><a href="{{ route('product') }}">Products</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>


                    {{-- <ul class="header-main__nav">
                        <li><a href="">New Arrivals</a>
                            <div class="cat_menu">
                                <div class="container">
                                    <div class="main_innerCatMenu">
                                        <div class="cata_left">
                                            <div class="men_img">
                                                <img src="{{ asset('assets/images/men.gif') }}" alt="">
                                            </div>
                                            <div class="cata_innerMenu">
                                                <a href="#">Kurta Pajama</a>
                                                <a href="#">Kameez Shalwar</a>
                                                <ul>
                                                    <li><a href="#">Casual</a></li>
                                                    <li><a href="#">Semi-Formal</a></li>
                                                    <li><a href="#">Formal</a></li>
                                                    <li><a href="#">Exclusive</a></li>
                                                </ul>
                                                <a href="#">Kurta</a>
                                                <ul>
                                                    <li><a href="#">Casual</a></li>
                                                    <li><a href="#">Semi-Formal</a></li>
                                                    <li><a href="#">Formal</a></li>
                                                    <li><a href="#">Formal Kurta</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cata_innerMenu">
                                            <a href="#">Like Father Like Son</a>
                                            <a href="#">Caps</a>
                                            <a href="#">Waistcoat</a>
                                            <a href="#">Pocket Square</a>
                                            <a href="#">Unstitched Fabric</a>
                                            <ul>
                                                <li><a href="#">Platinum Class</a></li>
                                                <li><a href="#">Gold Class</a></li>
                                                <li><a href="#">Silver Class</a></li>
                                                <li><a href="#">Boski</a></li>
                                                <li><a href="#">Latha</a></li>
                                            </ul>
                                        </div>
                                        <div class="cata_innerMenu">
                                            <a href="#">Bottom</a>
                                            <a href="#">Footwear</a>
                                            <ul>
                                                <li><a href="#">Embroidered</a></li>
                                                <li><a href="#">Trendy</a></li>
                                            </ul>
                                            <a href="#">Underwear</a>
                                            <ul>
                                                <li><a href="#">Modal</a></li>
                                                <li><a href="#">Cotton</a></li>
                                            </ul>
                                        </div>
                                        <div class="cata_innerMenu">
                                            <a href="#">Grooms Collection</a>
                                            <ul>
                                                <li><a href="#">Sherwani</a></li>
                                                <li><a href="#">Turban</a></li>
                                                <li><a href="#">Khussa</a></li>
                                                <li><a href="#">Special Kurta</a></li>
                                                <li><a href="#">Teen Boys</a></li>
                                                <li><a href="#">Kid Boys</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="">Cast & Crew</a>
                            <div class="cat_menu">
                                <div class="container">
                                    <div class="main_innerCatMenu">
                                        <div class="cata_innerMenu">
                                            <a href="#">MEN</a>
                                            <ul>
                                                <li><a href="#">Kameez Shalwar</a></li>
                                                <li><a href="#">Kurta Trouser</a></li>
                                                <li><a href="#">Waistcoat</a></li>
                                                <li><a href="#">Shawl</a></li>
                                                <li><a href="#">Unstitched</a></li>
                                                <li><a href="#">Footwear</a></li>
                                            </ul>
                                        </div>
                                        <div class="cata_menuRightIng">
                                            <img src="{{ asset('assets/images/crew_img.jpg') }}" alt="" class="img__cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="">Women</a>
                            <div class="cat_menu">
                                <div class="container">
                                    <div class="main_innerCatMenu">
                                        <div class="cata_innerMenu">
                                            <a href="#">Face</a>
                                            <ul>
                                                <li><a href="#">Blusher</a></li>
                                                <li><a href="#">Cream & Foundation</a></li>
                                                <li><a href="#">Powder</a></li>
                                                <li><a href="#">Other</a></li>
                                            </ul>
                                        </div>
                                        <div class="cata_innerMenu">
                                            <a href="#">Eyes</a>
                                            <ul>
                                                <li><a href="#">Eye Liner</a></li>
                                                <li><a href="#">Eye Pencil</a></li>
                                                <li><a href="#">Eye Shadow</a></li>
                                            </ul>
                                        </div>
                                        <div class="cata_innerMenu">
                                            <a href="#">Lips</a>
                                            <ul>
                                                <li><a href="#">Lipstick</a></li>
                                                <li><a href="#">Lipgloss</a></li>
                                                <li><a href="#">Others</a></li>
                                            </ul>
                                        </div>
                                        <div class="makeup_img">
                                            <img src="{{ asset('assets/images/makeup.gif') }}" alt="" class="img__cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="">Men</a></li>
                        <li><a href="">Boys & Girls</a></li>
                        <li><a href="">Fragrances</a></li>
                        <li><a href="">Makeup</a></li>
                        <li><a href="">Catalogue</a></li>
                        <li><a href="">SALE</a></li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </header>