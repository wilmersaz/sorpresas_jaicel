<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8" />
	<title>
		@yield("titulo")
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link href="{{ asset('css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="{{ url('imagenes/favicon.ico') }}" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body  class="m--skin- m-page--loading-enabled m-page--loading m-content--skin-light m-header--fixed m-header--fixed-mobile m-aside-left--offcanvas-default m-aside-left--enabled m-aside-left--fixed m-aside-left--skin-dark m-aside--offcanvas-default">
	<div class="m-grid m-grid--hor m-grid--root m-page">
		@include('layouts.partials.header')
		<br>
		<br>
		<br>
		<div class="content">
			@yield('content')
		</div>
	</div>
	<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
		<div class="m-quick-sidebar__content m--hide">
			<span id="m_quick_sidebar_close" class="m-quick-sidebar__close">
				<i class="la la-close"></i>
			</span>
		</div>
	</div>
	<div id="m_scroll_top" class="m-scroll-top">
		<i class="la la-arrow-up"></i>
	</div>
	<script src="{{ asset('js/vendors.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/dashboard.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/datatables.bundle.js') }}"></script>
	@stack('scripts')
	<script type="text/javascript">
		var baseUrl='{{url('/')}}';
	</script>
	<script>
		$('.blockNums').on('keydown', function(e){
			if(e.which == 38 || e.which == 40) {
				return false;
			}
		});
		$(window).on('load', function() {
			$('body').removeClass('m-page--loading');         
		});
	</script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
</body>
@yield('scripts')
</html>
