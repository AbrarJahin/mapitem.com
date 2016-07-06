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