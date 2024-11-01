@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mb-5 pb-2">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Template</h2>
                        </div>
                    </div>
                </div>
                <form class="main-form" method="POST" action="{{ route('dashboard.update_template') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf
                    <input type="hidden" name="template_id" value="{{ $template->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="sub-heading">Logo:</div>
                            <div class="profile-img">

                                <label for="profile-user-img"><i class="fa fa-pencil"></i></label>
                                <figure><img src="{{ asset($template_data['banner_logo'] ?? 'admin/images/placeholder.png') }}" id="logo_img_my"
                                        alt="user-img"></figure>
                                <input type="file" id="profile-user-img" name="banner_logo" class="d-none"
                                    onchange="image_show(this,'logo_img_my');" accept="image/jpeg, image/png">

                            </div>
                            @if ($errors->has('banner_logo'))
                                <span class="text-danger">{{ $errors->first('banner_logo') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="heading">Banner:</div>
                        </div>

                        @if ($used_template->template_id == 2 || $used_template->template_id == 4)
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="sub-heading"> Sub Heading:</label>
                                    <input type="text" name="sub_heading" class="form-control"
                                        value="{{ ($template_data!=null) ? $template_data['sub_heading'] : old('sub_heading')  }}">
                                    @if ($errors->has('sub_heading'))
                                        <span class="text-danger">{{ $errors->first('sub_heading') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if (
                            $used_template->template_id == 1 ||
                                $used_template->template_id == 2 ||
                                $used_template->template_id == 3 ||
                                $used_template->template_id == 4)
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="sub-heading"> Main Heading:</label>
                                    <input type="text" name="main_heading" class="form-control"
                                        value="{{ ($template_data!=null) ? $template_data['main_heading'] : old('main_heading')  }}">
                                    @if ($errors->has('main_heading'))
                                        <span class="text-danger">{{ $errors->first('main_heading') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="sub-heading"> Short Description:</label>
                                    <textarea name="short_desc" class="form-control">{{ ($template_data!=null) ? $template_data['short_desc'] : old('short_desc')  }}</textarea>
                                    @if ($errors->has('short_desc'))
                                        <span class="text-danger">{{ $errors->first('short_desc') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($used_template->template_id == 2 || $used_template->template_id == 4)
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="sub-heading"> Long Description:</label>
                                    <textarea class="form-contro ckeditor" name='long_desc' id="long_desc_editor" placeholder="Banner Long Description">{!! ($template_data!=null) ? $template_data['long_desc'] : old('long_desc')  !!}</textarea>
                                    @if ($errors->has('long_desc'))
                                        <span class="text-danger">{{ $errors->first('long_desc') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($used_template->template_id == 2 || $used_template->template_id == 3 || $used_template->template_id == 4)
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="sub-heading"> Button Text:</label>
                                    <input type="text" name="btn_text" class="form-control"
                                        value="{{ ($template_data!=null) ? $template_data['btn_text'] : old('btn_text')  }}">
                                    @if ($errors->has('btn_text'))
                                        <span class="text-danger">{{ $errors->first('btn_text') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($used_template->template_id == 2 || $used_template->template_id == 4)
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="sub-heading"> Button Link:</label>
                                    <input type="url" name="btn_link" class="form-control"
                                        value="{{ ($template_data!=null) ? $template_data['btn_link'] : old('btn_link')  }}">
                                    @if ($errors->has('btn_link'))
                                        <span class="text-danger">{{ $errors->first('btn_link') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($used_template->template_id == 3)
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="sub-heading"> Price:</label>
                                    <input type="text" name="price" class="form-control"
                                        value="{{ ($template_data!=null) ? $template_data['price'] : old('price')  }}">
                                    @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12 col-md-12 col-12 my-3 text-center">
                            <div class="sub-heading">Banner Image:</div>
                            <div class="profile-img banner-image">
                                <label for="banner_image"><i class="fa fa-pencil"></i></label>
                                <figure><img src="{{ asset($template_data['banner_image'] ?? 'admin/images/placeholder.png') }}" id="banner_image_preview"
                                        alt="user-img"></figure>
                                <input type="file" id="banner_image" name="banner_image" class="d-none"
                                    onchange="image_show(this,'banner_image_preview');" accept="image/jpeg, image/png">
                               
                            </div>
                             @if ($errors->has('banner_image'))
                                    <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                                @endif
                        </div>
                        @if ($used_template->template_id == 1 || $used_template->template_id == 3)
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="heading">Form Content:</div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="sub-heading">heading:</label>
                                    <input type="text" name="form_heading" class="form-control"
                                        value="{{ ($template_data != null) ? $template_data['form_heading'] : old('form_heading') }}">
                                    @if ($errors->has('form_heading'))
                                        <span class="text-danger">{{ $errors->first('form_heading') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label class="sub-heading">Description:</label>
                                    <textarea name="form_desc" class="form-control">{{ ($template_data!=null) ? $template_data['form_desc'] : old('form_desc')  }}</textarea>
                                    @if ($errors->has('form_desc'))
                                        <span class="text-danger">{{ $errors->first('form_desc') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if ($used_template->template_id == 1)
                        <div class="col-lg-12 col-md-12 col-12 my-3 text-center">
                            <div class="sub-heading">Form Background Image:</div>
                            <div class="profile-img banner-image">
                                <label for="form_banner_image"><i class="fa fa-pencil"></i></label>
                                <figure><img src="{{ asset($template_data['banner_image'] ?? 'admin/images/placeholder.png') }}" id="form_image_preview"
                                        alt="user-img"></figure>
                                <input type="file" id="form_banner_image" name="form_banner_image" class="d-none"
                                    onchange="image_show(this,'form_image_preview');" accept="image/jpeg, image/png">
                               
                            </div>
                            @if ($errors->has('form_banner_image'))
                                <span class="text-danger">{{ $errors->first('form_banner_image') }}</span>
                            @endif
                        </div>
                         @endif
                        
                        
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Receive Inquiry On:(Insert Maximum 3 Email Addresses separated by comma ", ")</label>
                                <input type="text" name="receive_email" id="receive_email" class="form-control" value="{{ ($template_data!=null) ? $template_data['receive_email'] : old('receive_email')  }}">
                                @if ($errors->has('receive_email'))
                                    <span class="text-danger">{{ $errors->first('receive_email') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="heading">Footer:</div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Copyright Text:</label>
                                <input type="text" name="copyright_text" class="form-control"
                                    value="{{ ($template_data!=null) ? $template_data['copyright_text'] : old('copyright_text')  }}">
                                @if ($errors->has('copyright_text'))
                                    <span class="text-danger">{{ $errors->first('copyright_text') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="heading">Social Media:</div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Facebook:</label>
                                <input type="url" name="facebook" class="form-control"
                                    value="{{ ($template_data!=null) ? $template_data['facebook'] : old('facebook')  }}">
                                @if ($errors->has('facebook'))
                                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Twitter:</label>
                                <input type="url" name="twitter" class="form-control"
                                    value="{{ ($template_data!=null) ? $template_data['twitter'] : old('twitter')  }}">
                                @if ($errors->has('twitter'))
                                    <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="form-group">
                                <label class="sub-heading">Linkedin:</label>
                                <input type="url" name="linkedin" class="form-control"
                                    value="{{ ($template_data!=null) ? $template_data['linkedin'] : old('linkedin')  }}">
                                @if ($errors->has('linkedin'))
                                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-12 mt-4">
                            <div class="form-group">
                                <button class="primary-btn center-btn primary-bg" id="form-submit-btn" >
                                    Save Changes</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
    <style type="text/css">
        .sub-heading {
            font-size: 1.01rem !important;
            font-weight: 600 !important;
            text-transform: capitalize !important;
            margin-bottom: 0.5rem !important;
        }

        .heading {
            font-size: 2rem !important;
            font-weight: 700 !important;
            text-transform: capitalize !important;
            margin-bottom: 0.5rem !important;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        function image_show(input, targetId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#" + targetId).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        
        function validateForm() {
            var emailField = document.getElementById('receive_email');
            var emails = emailField.value.split(",");
            var counter = 0;
    
            for (var i = 0; i < emails.length; i++) {
                if (counter >= 3) {
                    alert("You can only provide a maximum of 3 email addresses.");
                    return false;
                }
    
                // Add more validation logic as needed
                if (emails[i].trim() === "") {
                    alert("Email address cannot be empty.");
                    return false;
                }
    
                // Add additional validation logic for email format if required
    
                counter++;
            }
    
            return true; // Submit the form if all validations pass
        }
        
    </script>
@endsection
