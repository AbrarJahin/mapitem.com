<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Block Hunt - {{ $current_page }}</title>
		@include('meta_data')
		@include('css')
		{{-- MaxImage CDN Not Found in the latest vertion which is used --}}
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

		{{-- Truncate paragraph --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.dotdotdot/1.7.4/jquery.dotdotdot.min.js"></script>
		{{-- Pages JS --}}
		<script src="{{ URL::asset('js/page.js') }}"></script>
	{{-- Footer Scripts - End --}}
	</body>
</html>