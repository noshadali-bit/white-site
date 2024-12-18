@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Add Leader</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" action="{{ route('admin.profile.create_testimonial') }}"
                    enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Select Profile*:</label>
                                <select name="profile_id" class="form-control w-100" id="profile-selection">
                                    <option value="" selected disabled>Select Profile</option>
                                    @foreach ($profiles as $profile)
                                        <option value="{{ $profile->id }}">
                                            {{ $profile->username }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('profile_id'))
                                    <span class="error">{{ $errors->first('profile_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" required class="form-control">
                                @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group">
                                <label>Designation:</label>

                                <input type="text" name="designation" required class="form-control">
                                @if ($errors->has('designation'))
                                    <span class="error">{{ $errors->first('designation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label>Description*:</label>
                                <textarea name="description" id="description" required class="form-control" placeholder="Enter Description">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="error">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                                <h3>Leader Image</h3>
                                <figure class="thumbnail-wrapper"><img src="{{ asset('admin/images/placeholder.png') }}" class="thumbnail-img"
                                        alt="thumbnail">
                                </figure>
                                <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                                <input type="file" onchange="thumb(this);" name="thumbnails" id="thumbnail-img"
                                    class="d-none" accept="image/jpeg, image/png">
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">

                            <button type="submit" class="primary-btn primary-bg">Add</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
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
    </style>
@endsection
@section('js')
    <script type="text/javascript">
    
       function thumb(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var thumbnailImg = $(input).siblings('.thumbnail-wrapper').find('img'); // Get the thumbnail image

        reader.onload = function(e) {
            thumbnailImg.attr('src', e.target.result); // Update the thumbnail image source
        };

        reader.readAsDataURL(input.files[0]);
    }
}
      
       
    </script>
@endsection
