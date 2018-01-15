<div class="col-lg-3 no-padding">
	<div class="contact-bar">
		<div class="sb-top">
			<img id="add_owner_image" height="86" width="86" class="pround" alt="Jesica" src="{{ URL::asset('images/empty-profile.jpg') }}">
			<h6 id="add_owner_name"></h6>
			<div class="star" id="add_owner_rating">
			</div>
		</div>
		<div class="sb-middle">
			<span id="add_owner_phone"></span>
			<span id="add_owner_website"></span>
			<span id="add_owner_email"></span>
			<span id="add_owner_fb_status"></span>
		</div>
		<div class="sb-bottom dropdown">
			@if (!Auth::check())
				<a data-target="#lgn-pup" data-toggle="modal" type="submit" class="btn loginbtn green-large width-adj dropdown-toggl" href="#">Contact</a>
			@else
				<a data-toggle="dropdown" type="submit" class="btn loginbtn green-large width-adj dropdown-toggl" href="#">Contact</a>
				@include('public.listing.send_message')
			@endif
		</div>
	</div>
</div>