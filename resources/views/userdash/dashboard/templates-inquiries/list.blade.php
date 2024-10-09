@extends('userdash.layouts.dashboard.main')

@section('content')
 <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-booking-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Inquiries</h2>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-lg-right text-md-right">
                           
                        </div>
                    </div>
                </div>
                <div class="table-responsive-sm dashboard-table">
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                            <th>Order ID</th>
                  
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Created at</th>
                  <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ;?>
                @foreach($inquiries as $inquiry)
              
                <tr>
                  
                  <td>{{$i}}</td>
                  <td>{{$inquiry->full_name}}</td>
                  <td>{{$inquiry->email}}</td>
                  <td>{{$inquiry->phone}}</td>
                  <td>{{ date('d-M-Y' , strtotime($inquiry->created_at)) }}</td>
                  <td>
                    <div class="dropdown show action-dropdown">
                      <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="action-dropdown">
                      <a class="dropdown-item" href="{{route('dashboard.view_template_inquiry',$inquiry->id)}}"><i class="fa fa-eye"
                                            aria-hidden="true"></i>
                                        View</a>
                      
                        <a class="dropdown-item" href="{{route('dashboard.delete_template_inquiry',$inquiry->id)}}" onclick="return confirm('Are you sure?')"><i class="fa fa-pencil-square-o"
                            aria-hidden="true"></i>
                        Delete</a>
                        
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $i++;?>
               @endforeach
              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
   .ui-state-active{
      background: #212529 !important;
      color: #f8f9fa !important;
  }
</style>
@endsection
@section('js')
<script type="text/javascript">

    // $(document).ready(function() {
    //     $('#data-table').DataTable({
    //         order: [[0, 'desc']],
    //     });
    // });

(()=>{
    

})()
</script>
@endsection
