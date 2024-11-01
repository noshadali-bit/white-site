@extends('layouts.main')
@section('content')

<section class="inner_banner">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="inner_cont">
                    <h3>Shop</h3>
                    <div class="inner_link">
                        <a href="{{ route('home') }}">home</a> /
                        <a href="javascript:;">Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="filter_card">
    <div class="filter_crdHead">
        <div class="filtre_crdLeft">
            <i class='bx bx-filter'></i> Filter
        </div>
        <div class="cross_btn">
            <i class='bx bx-x'></i>
        </div>
    </div>
    <div class="filter_main">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Collection
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="filter_crd_list">
                            @foreach ($all_collections as $item)
                            <li><a href="javascript:;" class="select_collection" data-collection="{{ $item->id }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Category
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body" id="categoryContainer">
                        <ul class="filter_crd_list">
                            @foreach ($all_categories as $item)
                            <li><a href="javascript:;" class="select_cat" data-collection="{{ $item->id }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item" >
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Sub-Category
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="filter_crd_list" id="subcategoryContainer">
                            @foreach ($all_sub_categories as $item)
                            <li><a href="javascript:;" class="select_sub_cat" data-collection="{{ $item->id }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Price
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="price-range-slider">

                            <p class="range-value">
                                <input type="text" id="amount" readonly>
                            </p>
                            <div id="slider-range" class="range-bar"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="filter_Innerbtn">
                <a href="#" class="themebtn">Clear Filter</a>
            </div>
        </div>
    </div>
</div>
<section class="product_page">
    <div class="container">
        <div class="product_topbar">
            <div class="pro_links">
                <a href="{{ route('home') }}">home</a>
                <a href="{{ route('categories') }}">Categories</a>
            </div>
            <div class="pagenation">
                <div class="filter_btn">
                    <i class='bx bx-filter'></i> Filter
                </div>
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
                        @if (isset($_GET['category']))
                        <input type="hidden" name="category" value="{{ $_GET['category'] }}">
                        @endif

                        <select name="order_by" class="orderby order-by-select" aria-label="Shop order">
                            <option value="menu_order" selected disabled>Default sorting</option>
                            <option
                                {{ isset($_GET['order_by']) && $_GET['order_by'] == 'sort-by-latest' ? 'selected' : '' }}
                                value="sort-by-latest">Sort by latest</option>
                            <option
                                {{ isset($_GET['order_by']) && $_GET['order_by'] == 'price-low-to-high' ? 'selected' : '' }}
                                value="price-low-to-high">Sort by price: low to high</option>
                            <option
                                {{ isset($_GET['order_by']) && $_GET['order_by'] == 'price-high-to-low' ? 'selected' : '' }}
                                value="price-high-to-low">Sort by price: high to low</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        @if (!$products->isEmpty())
        <div class="row" id="grid-view-row">
            @foreach ($products as $product)
            <div class="col-lg-3 grid-view-columns">
                <div class="pro_items">
                    <div class="pro_img">
                        <img src="{{ asset($product->img_path) }}" alt="{{ $product->title }}">
                    </div>
                    <div class="pro_cont">
                        <a href="{{ route('product-detail', $product->slug) }}" class="arrivals_btn">{{ $product->title }}</a>
                        <p>$ {{ $product->price }}</p>

                        <a href="javascript:;" class="themebtn cart-btn" data-product_id="{{ $product->id }}">add to cart</a>
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