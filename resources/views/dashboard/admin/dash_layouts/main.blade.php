<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Any config settings you want to fetch you will get in $config array, -->
    <?php //echo $config['COMPANY']; ?>
    <title>{{isset($title)?$title:''}}</title>
    <link rel="icon" type="image/png" href="{{asset(isset($favicon)?$favicon:'')}}">
    <link rel="icon" type="image/jpg" href="{{asset(isset($favicon)?$favicon:'')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.dash_layouts.links')
    @yield('css')
  </head>
  <body class="responsive">
    <input type="hidden" id="web_base_url" value="{{url('/')}}"/>
    @include('admin.dash_layouts.header')
    @yield('content')
    @include('admin.dash_layouts.footer')
    @include('admin.dash_layouts.scripts')
    @yield('js')
    <script type="text/javascript">
(()=>{

		@if (session('notify_success'))
		$.toast({
				heading: 'Success!',
				position: 'bottom-right',
				text:  '{{session('notify_success')}}',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 2000,
				stack: 6
			});
      @elseif (session('notify_error'))
      $.toast({
						heading: 'Error!',
						position: 'bottom-right',
						text:  '{{session('notify_error')}}',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 2000,
						stack: 6
					});
        @endif

})()
    </script>
  
   
  </body>
  <div id="preloader" style="display:none;">  
    <div class="loading">
        <!--<span>Loading...</span>-->
    </div>
</div>
</html>