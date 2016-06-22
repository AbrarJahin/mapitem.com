{{-- Everything in this page are different from any other page, so everything is redone for this page --}}

@include('public.listing.header')

{{-- Modal Close Button --}}
<a href="#" class="close-detail hide"><i class="fa fa-close"></i></a>
{{-- Navigation --}}
@include('public.listing.navigation')
{{--
@include('nav')
@section('nav_classes', 'navbar-fixed-top ip-adj2')
@section('nav_filter', "@include('nav_filters')")
--}}

{{-- Modal --}}
@include('post_free_add_modal')

{{-- If user is not logged in, then needed --}}
	{{--send offer login Modal --}}
	@include('public.listing.send_offer_login_modal')
	{{-- Send offer sign up Modal --}}
	@include('public.listing.send_offer_signup_modal')

{{-- Inner Body --}}
<div id="" class="container header-minus wraper no-padding">
	{{-- Map View --}}
	@include('public.listing.map_view')

	{{-- Listing View --}}
	<div class="listing-right">
		{{-- Ad Listing --}}
		<div class="ad-listing">
			{{-- Filter --}}
			@include('public.listing.filter')

			{{-- Results --}}
			@include('public.listing.results')
		</div>
		<div class="clearfix "></div>
		{{-- Ad detail --}}
		<div class="ad-detail">
			{{-- Ad Slider--}}
			@include('public.listing.slider_images')
			{{-- Result detail --}}
			@include('public.listing.add_detail')
			{{-- Ad Listing --}}
			<div class="clearfix "></div>
		</div>
		<div class="clearfix "></div>

		@include('footer_html')
	</div>

</div>

{{-- Footer Scripts - Start --}}
	@include('public.js')

	<script src="{{ URL::asset('js/jquery.loadie.js') }}"></script>
	<!-- range js -->
	<script src="{{ URL::asset('js/jquery.range.js') }}"></script>
	<!-- Truncate paragraph -->
	<script src="{{ URL::asset('js/jquery.dotdotdot.js') }}"></script>
	<script src="{{ URL::asset('js/jQuery.scrollSpeed.js') }}"></script>
	<script type='text/javascript' src="{{ URL::asset('js/jquery.mousewheel.js') }}"></script>
	<script src="{{ URL::asset('js/jquery.touchSwipe.js') }}"></script>
	<script src="{{ URL::asset('js/listing.js') }}"></script>
	<!-- Slick Js -->
	<script type="text/javascript" src="{{ URL::asset('slick/slick/slick.min.js') }}"></script>

	{{-- Clustered Map - Google map v3.20 --}}
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gmap3/6.1.0/gmap3.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/map.js') }}"></script>
	{{-- Pagination --}}
	<script type="text/javascript" src="http://botmonster.com/jquery-bootpag/jquery.bootpag.js"></script>

{{-- Footer Scripts - End --}}

</body>
</html>