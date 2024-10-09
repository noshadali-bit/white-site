@extends('userdash.layouts.dashboard.main')

@section('content')
  <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Add Request</h2>
                        </div>
                    </div>
                    
                </div>
                    <form action="{{ route('dashboard.submitrequest') }}" method="POST" enctype="multipart/form-data"  class="main-form">
                        	@csrf	
                    <div class="row">
                       
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Request to <span>*</span></label>
                            
                                <select class="form-control" name="request_type">
                                <option value="1">Request a return</option>
                              
                                </select>
                               @if ($errors->has('request_type'))
                                        <span class="text-danger">{{ $errors->first('request_type') }}</span>
                                    @endif
                            </div>
                        </div>
                        <?php
$orders = App\Models\Orders::where(['pay_status' => 1 , 'user_id' => Auth::id()])->orderBy('id', 'DESC')->with('orderHasDetail')->get();
$user = App\Models\User::where('id', Auth::id())->first();
// dd($user);

?>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                            <label>Order Number<span>*</span></label>

                            <select class="form-control" name="order_id" id="">
                                @foreach($orders as $order )
                                <option value="{{$order->id}}"> Order # {{ $order->id }}</option>
                                @endforeach
                            </select>
                               @if ($errors->has('order_id'))
                                        <span class="text-danger">{{ $errors->first('order_id') }}</span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>First Name<span>*</span></label>
                            
                                <input type="text" class="form-control" name="firstname"  placeholder="First Name">
                               @if ($errors->has('firstname'))
                                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                            <label>Last  Name<span>*</span></label>
                            <input type="text" class="form-control"  name="lastname"  placeholder="Last Name">
                               @if ($errors->has('lastname'))
                                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                    @endif
                            </div>
                        </div>
                       
                         <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                            <label>Email<span>*</span></label>

                            <input type="email" name="email"   class="form-control"  placeholder="Email">
                               @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                            </div>
                        </div>
                       

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                            <label>Phone<span>*</span></label>

                            <input type="tel" name="phone"  class="form-control"  placeholder="Phone">
                               @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                            </div>
                        </div>

                        


                       
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                            <label>Reason<span>*</span></label>
<textarea name="reason"   class="form-control"   id="" cols="30" rows="10"></textarea>
                              @if ($errors->has('reason'))
                                        <span class="text-danger">{{ $errors->first('reason') }}</span>
                                    @endif
                              
                            </div>
                        </div>
                       

                           
                       
                       
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 text-center">
                    <button type="submit" class="primary-btn primary-bg text-center">Submit</button>
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
