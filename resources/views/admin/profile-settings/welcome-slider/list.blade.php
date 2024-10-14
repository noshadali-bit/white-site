@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="chart-wrapper">


                <div class="user-wrapper">
                    <div class="row align-items-center mc-b-3 resp-pb">
                        <div class="col-lg-6 col-12">
                            <div class="primary-heading color-dark">
                                <h2>Banner Management</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="text-right">
                                <a href="{{ route('admin.profile.addwelcomeSlider') }}" class="primary-btn primary-bg">Add
                                    New</a>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="user-table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Profile</th>
                                    <th>Sub Heading</th>
                                    <th>Heading</th>
                                    <th>Description</th>
                                    <th>Banner</th>
                                    <th>Button Text</th>
                                    <th>Button Link</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($welcome_slider as $slider)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            {{ $slider->get_profiles->username }}
                                        </td>
                                        <td>{{ $slider->subHeading }}</td>
                                        <td>{{ $slider->headings }}</td>
                                        <td>{{ $slider->long_desc }}</td>
                                        <td>
                                            <img src="{{ asset($slider->img_path) }}" class="list-img">
                                        </td>
                                        <td>
                                            {{ $slider->btn_text }}
                                        </td>
                                        <td>
                                            {{ $slider->btn_link }}
                                        </td>
                                        <td>{{ date('d-M-Y', strtotime($slider->created_at)) }}</td>


                                        <td>{{ $slider->is_active_img == 1 ? 'Active' : 'Non-Active' }}</td>
                                        <td>
                                            <div class="dropdown show action-dropdown">
                                                <a class=" dropdown-toggle" href="#" role="button"
                                                    id="action-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="action-dropdown">

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.profile.editwelcomeSlider', $slider->id) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.profile.deletewelcomeSlider', $slider->id) }}"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Delete</a>

                                                    @if ($slider->is_active_img == 1)
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.profile.suspendwelcomeSlider', $slider->id) }}"><i
                                                                class="fa fa-ban" aria-hidden="true"></i> In Active</a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.profile.suspendwelcomeSlider', $slider->id) }}"><i
                                                                class="fa fa-ban" aria-hidden="true"></i> Activate</a>
                                                    @endif

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
        <script type="text/javascript">
            (() => {

                /*in page css here*/
            })()
        </script>
    @endsection
