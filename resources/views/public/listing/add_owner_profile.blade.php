<div class="col-lg-3 no-padding">
	<div class="contact-bar">
		<div class="sb-top">
			<img id="add_owner_image" height="86" width="86" class="pround" alt="Jesica" src="{{ URL::asset('images/empty-profile.jpg') }}">
			<h6 id="add_owner_name">Jesica Alben</h6>
			<div class="star">
				<i class="fa fa-star green-text"></i>
				<i class="fa fa-star green-text"></i>
				<i class="fa fa-star green-text"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
			</div>
		</div>
		<div class="sb-middle">
			<span>
				<i class="fa fa-phone"></i>
				<span id="add_owner_phone">
					123-456-789
				</span>
			</span>
			<span>
				<i class="fa fa-globe"></i>
				<span id="add_owner_website">
					<a #="" href="">www.jalben.com</a>
				</span>
			</span>
			<span>
				<i class="fa fa-envelope"></i>
				<span id="add_owner_email">
					<a #="" href="">example.mail.com</a>
				</span>
			</span>
			<span>
				<i class="fa fa-facebook"></i><i class="fa fa-check-circle p-adj"></i>
				<span id="add_owner_fb_id">
					<a #="" href="">Facebook Verified</a>
				</span>
				Facebook Verified
			</span>
			<span>
				<i class="fa fa-credit-card"></i>
				<span id="add_owner_credit_card_verification_status">
					Accepts Credit Card
				</span>
				Accepts Credit Card
			</span>
		</div>
		<div class="sb-bottom dropdown">
			<a data-toggle="dropdown" type="submit" class="btn loginbtn green-large width-adj dropdown-toggl" href="#">Contact</a>
			@include('public.listing.send_message')
		</div>
	</div>
</div>