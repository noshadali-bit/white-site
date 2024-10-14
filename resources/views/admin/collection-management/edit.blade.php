@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Edit Collection</h2>
                    </div>
                </div>

            </div>
            <form action="{{ route('admin.savecollection') }}" method="POST" enctype="multipart/form-data"
                class="main-form create_user_form">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label> Collection title*:</label>
                            <input type="text" name="title" id="name" value="{{ $collection->title }}"
                                class="form-control" placeholder="Enter Title">
                            <input type="hidden" name="id" value="{{ $collection->id }}">
                        </div>
                        @if ($errors->has('title'))
                            <span class="error">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="col-lg-2 col-md-12 col-12">
                        <div class="form-group">
                            <label>Featured Collection:</label>
                            <div class="input-field--check">
                                <input type="checkbox" name="is_featured" id="is_featured"
                                    {{ $collection->is_featured == '1' ? 'checked' : '' }}>
                                <label for="is_featured" class="toggle">Yes</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <div class="img-upload-wrapper ">
                            <h3>Collection Image</h3>
                            <figure>
                                <img src="{{ asset($collection->img_path) }}"
                                    class="thumbnail-img" id="profie-img" alt="thumbnail">
                            </figure>
                            <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                            <input type="file"onchange="readURL(this, 'profie-img');" name="thumbnails"
                                id="thumbnail-img" class="d-none" accept="image/jpeg, image/png">

                        </div>
                        @if ($errors->has('thumbnails'))
                            <span class="error">{{ $errors->first('thumbnails') }}</span>
                        @endif
                    </div>

                    <div class="col-lg-12 col-12">
                        <div class="text-center">
                            <button type="submit" class="primary-btn primary-bg add-user">Update</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .thumbnail-img {
            max-width: 288px;
            height: 113px;
        }

        .picture {
            max-width: 288px;
            height: 113px;
        }

        .recommend {
            color: #D75DB2;
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
