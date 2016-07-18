<div class="col-lg-3 no-padding">
	<div class="contact-bar">
		<div class="sb-top">
			<img id="add_owner_image" height="86" width="86" class="pround" alt="Jesica" src="{{ URL::asset('images/empty-profile.jpg') }}">
			<h6 id="add_owner_name">Jesica Alben</h6>
			<div class="star">
				{{--
				<i class="fa fa-star green-text"></i>
				<i class="fa fa-star green-text"></i>
				<i class="fa fa-star green-text"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				--}}
			</div>
		</div>
		<div class="sb-middle">
			<span id="add_owner_phone">
				<i class="fa fa-phone"></i>
					123-456-789
			</span>
			<span id="add_owner_website">
				<i class="fa fa-globe"></i>
					<a #="" href="">www.jalben.com</a>
			</span>
			<span id="add_owner_email">
				<i class="fa fa-envelope"></i>
					<a #="" href="">example.mail.com</a>
			</span>
			<span id="add_owner_fb_id">
				<i class="fa fa-facebook"></i><i class="fa fa-check-circle p-adj"></i>
					<a #="" href="">Facebook Verified</a>
			</span>
			<span id="add_owner_credit_card_verification_status">
				<i class="fa fa-credit-card"></i>
					Accepts Credit Card
			</span>
		</div>
		<div class="sb-bottom dropdown">
			<a data-toggle="dropdown" type="submit" class="btn loginbtn green-large width-adj dropdown-toggl" href="#">Contact</a>
			@include('public.listing.send_message')
		</div>
	</div>
</div>