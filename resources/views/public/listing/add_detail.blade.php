<div class="results-det">
	<div class="col-lg-9">
		<div class="col-lg-12 no-padding rd-top-row">
			<h4 class="pull-left" id="selected_add_title"></h4>
		</div>

		<div class="clearfix"></div>

		<div class="col-lg-12 no-padding rd-top-row2">
			<h5 class="pull-left">Price: <span  id="selected_add_price">$1000</span></h5>
			<div class="pull-right popups">
				<a data-original-title="Add to Wishlist" href="#" class="add_to_wishlist wsh-lst-adpage grey-tooltip" data-toggle="tooltip" data-placement="top" add_id="1">
					<img type="image/svg+xml" class="add_detail" src="{{ URL::asset('svg/normal.svg') }}"></img>
				</a>

				<a data-placement="top" data-toggle="tooltip" class="fa fa-comment-o grey-tooltip" href="#" data-original-title="Reviews"></a>

				<a data-placement="top" data-toggle="tooltip" class="fa fa-eye grey-tooltip" href="#" id="selected_add_view_count" data-original-title="157"></a>

				<a data-placement="top" data-toggle="tooltip" class="fa fa-location-arrow grey-tooltip" href="#" data-original-title="Directions" target="_blank" id="selected_add_direction" address='' location_lat='' location_lon=''></a>

			</div>
		</div>

		<div class="clearfix"></div>

		@include('public.listing.place_offer')

		<div class="clearfix"></div>
		<div class="col-lg-12 no-padding description rd-top-row">
			<div class="message" id="selected_add_description"></div>
			<div class="cleafix"></div>

			@include('public.listing.write_review')

			<div class="share">
				<span>Share on </span>
				<a class="sm fa fa-facebook"	id="fb_share" 	href="#" target="_blank"></a>
				<meta name="fb_share_url" content="https://www.facebook.com/sharer/sharer.php?u={{ URL::route('listing') }}">
				<a class="sm fa fa-twitter"		id="tw_share"	href="#" target="_blank"></a>
				<meta name="tw_share_url" content="https://twitter.com/share?text=Check%20out%20this%20product!%20-%20&url={{ URL::route('listing') }}">
				<a class="sm fa fa-google-plus"	id="gp_share"	href="#" target="_blank"></a>
				<meta name="gp_share_url" content="https://plus.google.com/share?url={{ URL::route('listing') }}">
			</div>
		</div>

		@include('public.listing.reviews')

	</div>

	@include('public.listing.add_owner_profile')

</div>