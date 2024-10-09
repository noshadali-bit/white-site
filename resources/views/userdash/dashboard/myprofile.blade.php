@extends('userdash.layouts.dashboard.main')

@section('content')
 <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>My Profile</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-md-right">
                            <a href="{{route('dashboard.editProfile')}}" class="primary-btn primary-bg mc-r-2"><i class="fa fa-pencil"></i> Edit Profile</a>
                       
                        </div>
                    </div>
                </div>
                <form   class="main-form">
                        	@csrf	
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="profile-img">
                                <!--<figure><img src="{{-- asset('images/user-img.jpg') --}}" alt="user-img"></figure>-->
                                <!--<input type="file" name="avatar" id="profile-user-img" class="d-none">-->
                                <!--<label for="profile-user-img"><i class="fa fa-pencil"></i></label>-->
                              
                                @if(null !== $user->profile_img && !empty($user->profile_img))
                                <figure><img src="{{asset($user->profile_img)}}" id="logo_img_my" alt="user-img"></figure>
                                @else
                                 <figure><img src="{{asset('admin/images/placeholder.png')}}" id="logo_img_my" alt="user-img"></figure>
                                @endif
                                 <input type="file" id="profile-user-img" name="avatar" class="d-none"  onchange="readURL(this);" accept="image/jpeg, image/png">
                                
                           
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> Full Name <span>*</span></label>
                               <input type="text" name="fname" readonly class="form-control" value="{{$user->full_name}}" >
                            </div>
                        </div>
                       
                            
                            <input type="hidden" name="id"  class="form-control" value="{{$user->id}}" >
                             <input type="hidden" name="email" readonly class="form-control" value="{{$user->email}}" >
                          
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-phone"></i> Phone <span>*</span></label>
                               <input type="tel" name="phone" readonly class="form-control" value="{{$user->phone}}" >
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-home"></i> Address <span>*</span></label>
                                <input type="text" name="address" readonly class="form-control" value="{{$user->address}}" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-building"></i> City <span>*</span></label>
                               <input type="text" name="city" readonly class="form-control" value="{{$user->city}}" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label><i class="fa fa-map"></i> Country <span>*</span></label>
                                   <input type="text" readonly name="country" class="form-control" value="{{$user->country}}" >
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
  /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
