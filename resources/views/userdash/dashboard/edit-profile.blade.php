@extends('userdash.layouts.dashboard.main')

@section('content')
  <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Edit Profile</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-md-right">
                            <a href="{{route('dashboard.myProfile')}}" class="primary-btn primary-bg mc-r-2"><i class="fa fa-user"></i> My Profile</a>
                           
                        </div>
                    </div>
                </div>
                    <form action="{{ route('dashboard.submitProfile') }}" method="POST" enctype="multipart/form-data"  class="main-form">
                        	@csrf	
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="profile-img">
                              
                                @if(null !== $user->profile_img && !empty($user->profile_img))
                                <figure><img src="{{asset($user->profile_img)}}" id="logo_img_my" alt="user-img"></figure>
                                @else
                                 <figure><img src="{{asset('admin/images/placeholder.png')}}" id="logo_img_my" alt="user-img"></figure>
                                @endif
                                 <input type="file" id="profile-user-img" name="avatar" class="d-none"  onchange="readURL(this);" accept="image/jpeg, image/png">
                                <label for="profile-user-img"><i class="fa fa-pencil"></i></label>
                           
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> Full Name <span>*</span></label>
                               <input type="text" name="full_name" required class="form-control" value="{{$user->full_name}}" >
                               @if ($errors->has('full_name'))
                                        <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                    @endif
                            </div>
                        </div>
                       
                            
                            <input type="hidden" name="id"  class="form-control" value="{{$user->id}}" >
                             <input type="hidden" name="email"  class="form-control" value="{{$user->email}}" >
                          
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-phone"></i> Phone <span>*</span></label>
                               <input type="tel" name="phone" required class="form-control" value="{{$user->phone}}" >
                               @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-home"></i> Address <span>*</span></label>
                                <input type="text" name="address" required class="form-control" value="{{$user->address}}" >
                                @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-building"></i> City <span>*</span></label>
                               <input type="text" name="city" required class="form-control" value="{{$user->city}}" >
                               @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Country <span>*</span></label>
                                   <input type="text" required name="country" class="form-control" value="{{$user->country}}" >
                                   @if ($errors->has('country'))
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 text-center mt-4">
                    <button type="submit" class="primary-btn primary-bg text-center">Update Profile</button>
</div>
                </form>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
  function readURL(input) {
        if (input.files && input.files[0]) {
            console.log('sad');
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#logo_img_my')
                    .attr('src', e.target.result);
                    console.log(e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
(()=>{
  /*in page css here*/
})()
</script>
@endsection
