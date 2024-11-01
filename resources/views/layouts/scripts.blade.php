{{-- -----------------------------------Links to Change----------------------------------- --}}
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.js') }}"></script>
<script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
{{-- -----------------------------------Links to Change----------------------------------- --}}

<script src="{{ asset('dash/js/jquery.toast.js') }}"></script>
@if (Auth::guard('admin'))
    <script src="//cdn.ckeditor.com/4.25.0-lts/standard/ckeditor.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    
    <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}" type="text/javascript"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script src="{{ asset('admin/js/content-management.js') }}"></script>
@endif
