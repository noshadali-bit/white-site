@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="chart-wrapper">
                <div class="user-wrapper">
                    <div class="row align-items-center ">
                        <div class="col-lg-6 col-12 p-0 mc-b-3">
                            <div class="primary-heading color-dark">
                                <h2>Users Management</h2>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table id="user-table" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Registration Date</th>

                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $user->full_name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>

                                            <td>{{ $user->is_active == 1 ? 'Active' : 'Non-Active' }}</td>
                                            <td>
                                                <div class="dropdown show action-dropdown">
                                                    <a class=" dropdown-toggle" href="#" role="button"
                                                        id="action-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                             


                                                        @if ($user->is_active == 1)
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.suspend_user', $user->id) }}"><i
                                                                    class="fa fa-ban" aria-hidden="true"></i> Suspend</a>
                                                        @else
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.suspend_user', $user->id) }}"><i
                                                                    class="fa fa-ban" aria-hidden="true"></i> Activate</a>
                                                        @endif
                                                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete')"
                                                            href="{{ route('admin.delete_user', $user->id) }}"><i
                                                                class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript"></script>
@endsection
