<div class="col-lg-3 no-padding">
	<div class="contact-bar">
		<div class="sb-top">
			<img class="pround" alt="Jesica" src="{{ URL::asset('images/pp-1.jpg') }}">
			<h6>Jesica Alben</h6>
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
				<i class="fa fa-phone"></i>123-456-789
			</span>
			<span>
				<i class="fa fa-globe"></i><a #="" href="">www.jalben.com</a>
			</span>
			<span>
				<i class="fa fa-envelope"></i>info@jablen.com
			</span>
			<span>
				<i class="fa fa-facebook"></i><i class="fa fa-check-circle p-adj"></i>Facebook Verified
			</span>
			<span>
				<i class="fa fa-credit-card"></i>Accepts Credit Card
			</span>
		</div>
		<div class="sb-bottom dropdown">
			<a data-toggle="dropdown" type="submit" class="btn loginbtn green-large width-adj dropdown-toggl" href="#">Contact</a>
			@include('public.listing.send_message')
		</div>
	</div>
</div>