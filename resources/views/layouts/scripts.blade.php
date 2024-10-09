{{-- -----------------------------------Links to Change----------------------------------- --}}
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.js') }}"></script>
<script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="{{ asset('assets/js/makisu.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
{{-- -----------------------------------Links to Change----------------------------------- --}}


<script src="{{ asset('dash/js/jquery.toast.js') }}"></script>
@if (Auth::guard('admin'))
    <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/content-management.js') }}"></script>
@endif
