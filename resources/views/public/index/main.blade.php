<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MapItem - {{ $current_page }}</title>
		@section('meta_page_description', 'MapItem - A Social Marketplace')
		@include('meta_data')
		@include('css')
		{{-- MaxImage CDN Not Found in the latest vertion which is used --}}
		<link rel="stylesheet" href="{{ URL::asset('css/jquery.maximage.css') }}" type="text/css" media="screen" title="CSS" charset="utf-8" />
	</head>

	<body>

		<div id="site-wrapper">
			<div class="pbar">
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</div>
		<div class="loader"></div>

		{{-- Navigation --}}
		@include('public.index.nav')
		{{--
		@include('nav')
		@section('nav_classes', 'navbar-fixed-top')
		--}}
		{{-- Modal --}}
		@include('post_free_add_modal')
		@include('public.not_logged_in_modal')

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
	</div>

	</body>
	{!! $google_analytics_script or '' !!}
</html>