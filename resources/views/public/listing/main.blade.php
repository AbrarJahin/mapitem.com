{{-- Everything in this page are different from any other page, so everything is redone for this page --}}
<div id="site-wrapper">
@include('public.listing.header')

{{-- Modal Close Button --}}
<a href="#" class="close-detail hide"><i class="fa fa-close"></i></a>
{{-- Navigation --}}
@include('public.listing.navigation')

{{-- Modal --}}
@include('post_free_add_modal')
@include('public.not_logged_in_modal')

{{-- Inner Body --}}
<div class="container header-minus wraper no-padding">
	{{-- Map View --}}
	@include('public.listing.map_view')

	{{-- Listing View --}}
	<div class="listing-right">
		{{-- ad Listing --}}
		<div class="ad-listing">
			{{-- Filter --}}
			@include('public.listing.filter')

			{{-- Results --}}
			@include('public.listing.results')
		</div>
		<div class="clearfix "></div>
		{{-- ad detail --}}
		<div class="ad-detail">
			{{-- ad Slider--}}
			@include('public.listing.slider_images')
			{{-- Result detail --}}
			@include('public.listing.add_detail')
			{{-- ad Listing --}}
			<div class="clearfix "></div>
		</div>
		<div class="clearfix "></div>

		@include('footer_html')
	</div>

</div>

{{-- Footer Scripts - Start --}}

<script>
	@if(isset($search_location))
		var searchLocationName	= "{{ $search_location }}";
	@endif
	@if( isset($search_data) )
		var searchValue			= "{{ $search_data }}";
	@endif
	@if( isset($latitude) )
		var latitude			= {{ $latitude }};
	@endif
	@if( isset($longitude) )
		var longitude			= {{ $longitude }};
	@endif
</script>
	@include('public.js')
	<script src="{{ URL::asset('js/jquery.loadie.js') }}"></script>
	{{-- range js --}}
	<script src="{{ URL::asset('js/jquery.range.js') }}"></script>
	{{-- Truncate paragraph --}}
	<script src="https://cdn.jsdelivr.net/jquery.dotdotdot/1.7.4/jquery.dotdotdot.min.js"></script>
	<script src="{{ URL::asset('js/jQuery.scrollSpeed.js') }}"></script>
	<script type='text/javascript' src="{{ URL::asset('js/jquery.mousewheel.js') }}"></script>
	{{-- Swiper Slider 4.2.0 JS --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/js/swiper.min.js"></script>
	{{-- Clustered Map - Google map v3.20 --}}
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gmap3/6.1.0/gmap3.min.js"></script>
	{{-- Info Bubble for replacing infowindow --}}
	<script src="https://googlemaps.github.io/js-store-locator/examples/infobubble-compiled.js"></script>
	{{-- Listing page Map Functionalities --}}
	<script type="text/javascript" src="{{ URL::asset('js/map.js') }}"></script>
	{{-- Pagination --}}
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootpag/1.0.7/jquery.bootpag.min.js"></script>
{{-- Footer Scripts - End --}}
</div>

</body>
{!! $google_analytics_script or '' !!}
</html>