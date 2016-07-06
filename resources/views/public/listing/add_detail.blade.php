<div class="results-det">
	<div class="col-lg-9">
		<div class="col-lg-12 no-padding rd-top-row">
			<h4 class="pull-left" id="selected_add_title">Iphone</h4>
			<a class="direction pull-right" id="selected_add_direction" href="#" location_lat='' location_lon=''>
				<i class="fa fa-location-arrow"></i>Directions
			</a>
		</div>

		<div class="clearfix"></div>

		<div class="col-lg-12 no-padding rd-top-row2">
			<h5 class="pull-left">Price: <span  id="selected_add_price">$1000</span></h5>
			<div class="pull-right popups">
				<a data-original-title="Add to Wishlist" href="#" class="wsh-lst-adpage grey-tooltip" data-toggle="tooltip" data-placement="top">
					<object type="image/svg+xml" width="14px" data="{{ URL::asset('svg/normal.svg') }}"></object>
				</a>
				<a data-placement="top" data-toggle="tooltip" class="fa fa-comment-o grey-tooltip" href="#" data-original-title="Reviews"></a>

				<a data-placement="top" data-toggle="tooltip" class="fa fa-eye grey-tooltip" href="#" id="selected_add_view_count" data-original-title="157"></a>

				<a data-placement="top" data-toggle="tooltip" class="fa fa-thumbs-o-up grey-tooltip" href="#" data-original-title="Like"></a>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="col-lg-12 no-padding">
			<div class="dropdown">
				<a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#"><i class="fa fa-gavel"></i>Send Offer
				</a>

				{{-- If user is logged in --}}
				@if (Auth::check())
					<ul class="dropdown-menu no-padding loginpopup col-lg-4">
						<li>
							<form class="offer" action="#">
								<div class="form-group">
									<span class="text-adj1">Name : Jonathan Kaneer </span>
								</div>
								<div class="form-group">
								<span class="text-adj1">Email : jk@yahoo.com </span>
								</div>
								<div class="form-group">
								<span class="text-adj1">Cell : 123-456-789 </span>
								</div>
								<div class="form-group">
									<input type="text" onkeypress="return numbersonly(this, event)" placeholder="Your Offer in $" id="InputPasswords" class="form-control normal-input">
								</div>
								<div class="form-group">
									<textarea class="form-control medium-textarea no-margin" rows="3" placeholder="Message"></textarea>
								</div>
								<button class="btn btn-default green-small" type="submit">Place Offer</button>
							</form>
						</li>
					</ul>
				@else	{{-- If user is not logged in --}}
					<ul class="dropdown-menu">
						<li>
							<div class="pos-adj03">
								<span>Please </span><a href="#" class="def" data-toggle="modal" data-target="#lgn-pup" href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">LOGIN</a>
								or
								<a data-toggle="modal" data-target="#sgn-pup" class="" href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">SIGN UP</a> to continue
							</div>
						</li>
					</ul>
				@endif
			</div>
		</div>

		<div class="clearfix"></div>
		<div class="col-lg-12 no-padding description rd-top-row">
			<div id="selected_add_description">
				{{--  - Complet accesseries are available<br>
				 - Out Standing Condition.<br>
				 - 2 months warenty remaining <br><br>

				Iphone 4s with complete accesseries for sale. Original Box is also with iPhone Iphone 4s with complete 
				accesseries for sale. Original Box is also with iPhone. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
				sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat. --}}
			</div>
			<div class="cleafix"></div>

			@include('public.listing.write_review')

			<div class="share">
				<span>Share on </span>
				<a class="sm fa fa-facebook " href="#"></a>
				<a class="sm fa fa-twitter " href="#"></a>
				<a class="sm fa  fa-google-plus" href="#"></a>
			</div>
		</div>

		@include('public.listing.reviews')

	</div>

	@include('public.listing.add_owner_profile')

</div>