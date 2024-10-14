<div class="side-bar" id="sideBar">
    <a href="javascript:void(0)" class="sideBar__close" onclick="closeSideBar()">×</a>
    <div class="side-bar-logo bg-logo-wrapper">

        <a href="{{ route('admin.dashboard') }}"><img
                src="{{ asset($logo->img_path ?? 'admin/images/placeholder-logo.png') }}" alt="logo"
                class="img-fluid"></a>

    </div>
    <div class="side-bar-links">
        <ul class="navigation-list">

            <li><a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            <li><a href="{{ route('admin.users_listing') }}">
                    <i class="fa fa-users" aria-hidden="true"></i> Users Management
                </a>
            </li>


            <li><a href="{{ route('admin.inquiries_listing') }}">
                    <i class="fa fa-comment" aria-hidden="true"></i> inquiry Management
                </a>
            </li>

            <li><a href="{{ route('admin.reviews_listing') }}">
                    <i class="fa fa-comments" aria-hidden="true"></i> Reviews Management
                </a>
            </li>

            <li><a href="{{ route('admin.testimonial_listing') }}">
                    <i class="fa fa-comments" aria-hidden="true"></i> Testimonials Management
                </a>
            </li>

            <li><a href="{{ route('admin.orders_listing') }}">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i> Orders Management
                </a>
            </li>


            <li><a href="{{ route('admin.newsletter_listing') }}">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Newsletter
                </a>
            </li>

            <li
                class="custom-dropdown {{ in_array(Request::url(), [route('admin.products_listing'), route('admin.category_listing'), route('admin.subcategory_listing'), route('admin.collection_listing')]) ? 'open' : '' }}">
                <a href="javascript:void(0)" class="custom-dropdown__active">
                    <i class="fa fa-list-alt" aria-hidden="true"></i> Inventory Management
                </a>
                <div class="custom-dropdown__values">
                    <ul class="values-wrapper">
                        <li><a class="{{ Request::url() == route('admin.collection_listing') ? 'active' : '' }}"
                                href="{{ route('admin.collection_listing') }}">Collection</a>
                        <li><a class="{{ Request::url() == route('admin.category_listing') ? 'active' : '' }}"
                                href="{{ route('admin.category_listing') }}">Categories</a></li>
                        <li><a class="{{ Request::url() == route('admin.subcategory_listing') ? 'active' : '' }}"
                                href="{{ route('admin.subcategory_listing') }}">Sub Categories</a></li>
                        <li><a class="{{ Request::url() == route('admin.products_listing') ? 'active' : '' }}"
                                href="{{ route('admin.products_listing') }}">Products</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li
                class="custom-dropdown {{ in_array(Request::url(), [
                    route('admin.showLogo'),
                    route('admin.welcomeSlider'),
                    route('admin.homeSlider'),
                    route('admin.socialInfo'),
                ])
                    ? 'open'
                    : '' }}">
                <a href="javascript:void(0)" class="custom-dropdown__active">
                    <i class="fa fa-cog" aria-hidden="true"></i> Site Settings
                </a>
                <div class="custom-dropdown__values">
                    <ul class="values-wrapper">
                        <li><a class="{{ Request::url() == route('admin.showLogo') ? 'active' : '' }}"
                                href="{{ route('admin.showLogo') }}">Logo Management</a></li>
                        <li><a class="{{ Request::url() == route('admin.welcomeSlider') ? 'active' : '' }}"
                                href="{{ route('admin.welcomeSlider') }}">Welcome Baner</a></li>
                        <li><a class="{{ Request::url() == route('admin.homeSlider') ? 'active' : '' }}"
                                href="{{ route('admin.homeSlider') }}">Banners Management</a></li>
                        <li><a class="{{ Request::url() == route('admin.socialInfo') ? 'active' : '' }}"
                                href="{{ route('admin.socialInfo') }}">Contact / Social Info</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
