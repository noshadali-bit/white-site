@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                @if($current_template != null && $template != null)
                <div class="primary-heading color-dark mc-b-3">
                    <h2>My Template</h2>
                </div>
                <div class="templates">
                    <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="templates-card">
            <a href="{{ asset($template->img_path) }}" class="templates-card__img" data-fancybox="gallery">
                <img loading="lazy" alt="image" class="img-fluid" src="{{ asset($template->img_path) }}">
            </a>
            <div class="btn-wrapper">
                <a href="{{ route('dashboard.edit_template', $template->id) }}" class="primary-btn primary-bg"> Edit Template</a>
                <a href="{{ route('view_template', $user->slug) }}" class="primary-btn primary-bg" target="_blank"> View Current Template</a>
            </div>
        </div>
    </div>
    @else
    <div class="primary-heading color-dark text-center">
                    <h2>You have not Used any Template yet</h2>
                </div>
    @endif

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')

    <style type="text/css">
      
        .btn-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
}

.btn-wrapper a {flex: 1;}
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
