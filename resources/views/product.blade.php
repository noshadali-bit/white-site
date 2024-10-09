@extends('layouts.main')
@section('content')
    <section class="inner_banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="inner_cont">
                        <h3>Shop</h3>
                        <div class="inner_link">
                            <a href="{{ route('index') }}">home</a>
                            <a href="{{ route('categories') }}">Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product_page">
        <div class="container">
            <div class="product_topbar">
                <div class="pro_links">
                    <a href="{{ route('index') }}">home</a>
                    <a href="{{ route('categories') }}">Categories</a>
                </div>
                <div class="pagenation">
                    <div class="tabs_btn">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button grid-view-col="3" class="grid-view-change nav-link active"><i
                                        class='bx bx-grid'></i></button>
                                <button grid-view-col="4" class="grid-view-change nav-link"><i
                                        class='bx bxs-grid'></i></button>
                                <button grid-view-col="6" class="grid-view-change nav-link"><i
                                        class='bx bx-grid-alt'></i></button>
                            </div>
                        </nav>
                    </div>

                    <div class="default_sorting">
                        <form class="order-by-form">
                            @if(isset($_GET['category']))
                                <input type="hidden" name="category" value="{{ $_GET['category'] }}">
                            @endif
                            
                            <select name="order_by" class="orderby order-by-select" aria-label="Shop order">
                                <option value="menu_order" selected disabled>Default sorting</option>
                                <option {{ isset($_GET['order_by']) && $_GET['order_by'] == 'sort-by-latest' ? 'selected' : ''  }} value="sort-by-latest">Sort by latest</option>
                                <option {{ isset($_GET['order_by']) && $_GET['order_by'] == 'price-low-to-high' ? 'selected' : ''  }} value="price-low-to-high">Sort by price: low to high</option>
                                <option {{ isset($_GET['order_by']) && $_GET['order_by'] == 'price-high-to-low' ? 'selected' : ''  }} value="price-high-to-low">Sort by price: high to low</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            @if(!$products->isEmpty())
            <div class="row" id="grid-view-row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-12 grid-view-columns">
                        <div class="featured_items">
                            <a href="{{ route('product-detail', $product->slug) }}" class="featured_img">
                                <img src="{{ isset($product->img_path) ? $product->img_path : 'assets/images/placeholder.png' }}" alt="{{ $product->title }}">
                            </a>
                            <div class="featured_cont">
                                <h3>{{ $product->title }}</h3>
                                <h2>${{ number_format($product->price, 2) }}</h2>
                                <form action="{{ route('save-cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="cart-price" name="price" value="{{ number_format($product->price, 2) }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="featured_btn">
                                        <div class="featured_quinity">
                                            <button type="button" class="f_minus" onclick="decrementQuantity(this)">-</button>
                                            <input type="text" name="qty" value="1" min="1"
                                                max="10" id="quantity">
                                            <button type="button" class="f_plus" onclick="incrementQuantity(this)">+</button>
                                        </div>
                                        <button class="cart-btn">Add to cart</button>
                                    </div>
                                </form>
                                <div class="para">
                                    <p>{{ $product->short_desc }}</p>
                                </div>
                                {{-- <div class="icons">
                            <a href="javascript:;"><i class='bx bx-git-compare'></i></a>
                            <a href="javascript:;"><i class='bx bx-search'></i></a>
                            <a href="javascript:;"><i class='bx bx-heart'></i></a>
                        </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="section_heading">
    <h3 class="text-center">No products available</h3>
</div>

            @endif

            <div class="my-5">
                {{ $products->links('pagination::bootstrap-4') }}
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
    <script>
        let gridViewBtns = document.querySelectorAll('.grid-view-change');
        let gridViewRow = document.getElementById('grid-view-row');
        let colNum;
        if (!gridViewRow) {
            console.error("grid-view-row not found");
        } else if (gridViewBtns.length === 0) {
            console.error("No elements with class 'grid-view-change' found");
        } else {
            gridViewBtns.forEach(btn => {
                btn.addEventListener('click', handleGridViewChange);
            });
        }

        function handleGridViewChange() {
            gridViewBtns.forEach(singleBtn => {
                singleBtn.classList.remove('active');
            });
            this.classList.add('active');
            colNum = this.getAttribute('grid-view-col');
            let gridViewColumns = gridViewRow.querySelectorAll('.grid-view-columns');
            gridViewColumns.forEach(column => {
                column.className = `col-md-${colNum} grid-view-columns`;
            });
        }


        let orderBySelection = document.querySelector('.order-by-select')
        let orderByForm = document.querySelector('.order-by-form')
        orderBySelection.addEventListener('change', () => {
            orderByForm.submit()
        })
    </script>
@endsection
