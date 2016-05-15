{{-- Everything in this page are different from any other page, so everything is redone for this page --}}

@include('user.listing.header')

{{-- Modal Close Button --}}
<a href="#" class="close-detail hide"><i class="fa fa-close"></i></a>
{{-- Navigation --}}
@include('user.listing.navigation')

{{-- Modal --}}
@include('user.advertisement_add_modal')

{{-- If user is not logged in, then needed --}}
	{{--send offer login Modal --}}
	@include('user.listing.send_offer_login_modal')
	{{-- Send offer sign up Modal --}}
	@include('user.listing.send_offer_signup_modal')

{{-- Inner Body --}}
<div id="" class="container header-minus wraper no-padding">
	{{-- Map View --}}
	@include('user.listing.map_view')

	{{-- Listing View --}}
	<div class="listing-right">
		{{-- Ad Listing --}}
		<div class="ad-listing">
			{{-- Filter --}}
			@include('user.listing.filter')

			{{-- Results --}}
			@include('user.listing.results')
		</div>
		<div class="clearfix "></div>
		{{-- Ad detail --}}
		<div class="ad-detail">
			{{-- Ad Slider--}}
			@include('user.listing.slider_images')
			{{-- Result detail --}}
			@include('user.listing.add_detail')
			{{-- Ad Listing --}}
			<div class="clearfix "></div>
		</div>
		<div class="clearfix "></div>

		@include('user.listing.footer')
	</div>

</div>

@include('user.listing.footer_scripts')