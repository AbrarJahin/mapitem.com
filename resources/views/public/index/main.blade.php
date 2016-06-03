<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Block Hunt - {{ $current_page }}</title>
		@include('meta_data')
		@include('css')

		<link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{ URL::asset('css/jquery.maximage.css') }}" type="text/css" media="screen" title="CSS" charset="utf-8" />
	</head>

	<body>
		<div class="loader"></div>
		{{-- Navigation --}}
		@include('public.index.nav')
		{{--
		@include('nav')
		@section('nav_classes', 'navbar-fixed-top')
		--}}
		{{-- Modal --}}
		@include('post_free_add_modal')
		<div class="container-fluid no-padding height-adj1">
			@include('public.index.banner')
			@include('public.index.search_bar')
			{{-- Inner Body --}}
			<div class="container">
				@include('public.index.items')
				@include('public.index.how_it_works')
			</div>
			{{-- Footer --}}
			@include('footer_html')
		</div>
	{{-- Footer Scripts - Start --}}
		@include('public.js')

		<script src="{{ URL::asset('js/jquery.cycle.all.js') }}" type="text/javascript"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
		<script src="{{ URL::asset('js/jquery.maximage.js') }}" type="text/javascript"></script>
		{{-- Truncate paragraph --}}
		<script src="{{ URL::asset('js/jquery.dotdotdot.js') }}"></script>
		{{-- Scroll Speed --}}
		<script src="{{ URL::asset('js/jQuery.scrollSpeed.js') }}"></script>

		{{-- Pages JS --}}
		<script src="{{ URL::asset('js/page.js') }}"></script>
	{{-- Footer Scripts - End --}}
	</body>
</html>