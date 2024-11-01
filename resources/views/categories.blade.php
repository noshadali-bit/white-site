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

    <section class="category_section">
        <div class="container">
            @if (!$categories->isEmpty())
   
                <div class="row">
                    @foreach ($categories as $i => $category)
                        <div class="col-md-4">
                            <div class="category_items wow fadeInLeft">
                                <div class="cat_img">
                                    <img src="{{ $category->get_collection->img_path ?? 'assets/images/416x587.png' }}"
                                        alt="{{ $category->title }}">
                                </div>
                                <div class="cat_cont">
                                    <h3>{{ $category->title }}</h3>
                                    <a href="{{ route('sub_category', $category->slug) }}" class="themebtn">shop now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="section_heading">
                    <h3>Categories are not available.</h3>
                </div>
            @endif


            <div class="my-5">
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        .cat_img img {
            object-fit: cover;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection
