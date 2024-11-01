<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset(isset($logo) ? $logo->img_path : '') }}">
    <title>{{ isset($title) ? $title . " |  Beauty By Sahre" : " Beauty By Sahre " }}</title>
    @include('layouts.links')
    @yield('css')
</head>
<input type="hidden" name="" id="web_base_url" value="{{url('/')}}">
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('js')
    <script type="text/javascript">
        (() => {

            $(".cart-btn").click(function() {
                if($("#qty").val()){
                    var qty = $("#qty").val();
                }else{
                    var qty = 1;
                }
                var id = $(this).data('product_id');
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('save-cart') }}", 
                    data: {
                        'qty': qty,
                        'id': id
                    },
                    success: function(data) {
                        console.log(data.data);

                        if (data.status == 1) {
                            $.toast({
                                heading: 'Success!',
                                position: 'top-right',
                                text: data.msg,
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 1000,
                                stack: 6
                            });

                            setTimeout(() => {
                                location.href = 'cart';
                            }, 1000);
                        }

                        if (data.status == 2) {
                            $.toast({
                                heading: 'Error!',
                                position: 'bottom-right',
                                text: data.error,
                                loaderBg: '#ff6849',
                                icon: 'error',
                                hideAfter: 5000,
                                stack: 6
                            });
                        }
                    }
                });
            });


            $(".select_collection").on('click', function(){
                var id = $(this).data('collection');
                var type = "collection";
                get_filter_data(id, type)
            })

            $(".select_cat").on('click', function(){
                var id = $(this).data('collection');
                var type = "category";
                get_filter_data(id, type)
            })

            $(".select_sub_cat").on('click', function(){
                var id = $(this).data('collection');
                var type = "sub_category";
                get_filter_data(id, type)
            })
            
            function get_filter_data(id, type){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('select-collection') }}", 
                    data: {
                        'id': id,
                        'type': type,
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            console.log(data.categories);
                            var categoriesHtml = '<ul>';
                            var subcategoriesHtml = '<ul>';
                            var productsHtml = '';
                            data.categories.forEach(function(category) {
                                categoriesHtml += `
                                    <li>
                                        <a href='javascript:;' class='select_cat' data-collection='${category.id}'>${category.title}</a>
                                    <li>`;
                                
                                category.get_subcatgory.forEach(function(subcategory) {
                                    subcategoriesHtml += `<li><a href='javascript:;' class='select_sub_cat' data-collection='${subcategory.id}'>${subcategory.title}</a></li>`;
                                });

                                category.get_products.forEach(function(product) {
                                    productsHtml += `
                                    <div class="col-lg-3 grid-view-columns">
                                        <div class="pro_items">
                                            <div class="pro_img">
                                                <img src="${product.img_path}" alt="${product.title}">
                                            </div>
                                            <div class="pro_cont">
                                                <a href="/product-detail/${product.slug}" class="arrivals_btn">${product.title}</a>
                                                <p>$ ${product.price}</p>
                                                <a href="javascript:;" class="themebtn cart-btn" data-product_id="${product.id}">add to cart</a>
                                            </div>
                                        </div>
                                    </div>`;
                                });
                            });
                            categoriesHtml += '</ul>';
                            subcategoriesHtml += '</ul>';
                            $('#categoryContainer').html(categoriesHtml);
                            $('#subcategoryContainer').html(subcategoriesHtml);
                            $('#grid-view-row').html(productsHtml);
                        }
                    }
                });
            }

            @if (session('notify_success') || isset($_GET['notify_success']))
                $.toast({
                    heading: 'Success!',
                    position: 'bottom-right',
                    text: '{{ session('notify_success')??$_GET['notify_success'] }}',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 2000,
                    stack: 6
                });
            @elseif (session('notify_error') || isset($_GET['notify_error']))
                $.toast({
                    heading: 'Error!',
                    position: 'bottom-right',
                    text: '{{ session('notify_error')??$_GET['notify_error'] }}',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 2000,
                    stack: 6
                });
            @endif
        })()
    </script>
</body>
@include('layouts.errorhandler')
@include('admin.core.editor')
<div id="preloader" style="display:none;">
    <div class="loading">
        <span>Loading...</span>
    </div>
</div>

</html>
