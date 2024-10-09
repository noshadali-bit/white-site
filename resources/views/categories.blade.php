@extends('layouts.main')
@section('content')


<section class="inner_banner">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="inner_cont">
                    <?php App\Helpers\Helper::inlineEditable("h3",["class" => " "],"Categories","INNERCONTENT23");?>
                    <div class="inner_link">
                        <a href="{{ route("index") }}">home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="category_section">
            <div class="container">
    @if (!$product_categories->isEmpty())

            <div class="section_heading">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class" => "text-center"],"OUR CATEGORIES","INNERCONTENT24");?>
                    </div>
                </div>
            </div>
            <div class="row">
               @foreach ($product_categories as $i => $category)
                        <div class="col-md-4">
                            <div class="category_items wow fadeInLeft">
                                <div class="cat_img">
                                    <img src="{{ ($category->img_path ?? 'assets/images/416x587.png') }}" alt="{{ $category->title }}">
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
    {{ $product_categories->links('pagination::bootstrap-4') }}
</div>
</section>






@endsection
@section('css')
<style type="text/css">
    .cat_img img{
        object-fit:cover;
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