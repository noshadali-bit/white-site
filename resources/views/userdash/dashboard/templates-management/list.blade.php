@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="primary-heading color-dark mc-b-3">
                    <h2>All Templates</h2>
                </div>
                <div class="templates">
                    <div class="row">
                      @foreach ($templates as $template)
    <div class="col-md-6">
        <div class="templates-card">
            <a href="{{ asset($template->img_path) }}" class="templates-card__img" data-fancybox="gallery">
                <img loading="lazy" alt="image" class="img-fluid" src="{{ asset($template->img_path) }}">
            </a>
            @if($used_template && $template->id == $used_template->template_id)
            <a href="{{ route('dashboard.edit_template', $template->id) }}" class="primary-btn primary-bg"> Edit Template</a>
            @else
            <a href="{{ route('dashboard.use_template', $template->id) }}" class="primary-btn primary-bg"> Use this Template</a>
            @endif
        </div>
    </div>
@endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')

    <style type="text/css">
        .primary-btn{
                display: block;
                margin: auto;
    width: fit-content;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                console.log('sad');
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#logo_img_my')
                        .attr('src', e.target.result);
                    console.log(e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        (() => {
            /*in page css here*/
        })()
    </script>
@endsection
