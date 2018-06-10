<div class="col-lg-12 no-padding">
	<div class="dropdown">

		@if (!Auth::check())
			<a data-target="#lgn-pup" data-toggle="modal" class="direction dropdown-toggle loginbtn pull-left" href="#">
				<i class="fa fa-gavel"></i>
				Send Offer
			</a>
		@else
			<a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#">
				<i class="fa fa-gavel"></i>
				Send Offer
			</a>
		@endif

		{{-- If user is logged in --}}
		@if (Auth::check())
			<ul class="dropdown-menu no-padding loginpopup col-lg-4">
				<li>
					<form id="offer_send_form" class="offer" action="{{ URL::route('user.send_offer') }}">
						<div class="form-group">
							<span class="text-adj1">
								Name :
								<span id="offer_add_owner_name">
									Jonathan Kaneer
								</span>
							</span>
						</div>
						<div class="form-group">
							<span class="text-adj1">
								Email :
								<span id="offer_add_owner_email"></span>
							</span>
						</div>
						<div class="form-group">
							<span class="text-adj1">
								Cell :
								<span id="offer_add_owner_cell">
									123456
								</span>
							</span>
						</div>
						<div class="form-group">
							<input type="number" placeholder="Your Offer in $" class="form-control normal-input" name="price" min="0">
						</div>
						<div class="form-group">
							<textarea class="form-control medium-textarea no-margin" rows="3" placeholder="Message" name="message"></textarea>
						</div>
						<input type="hidden" name="add_id" id="offer_selected_add_id">
						<input type="hidden" name="add_owner_id" id="offer_add_owner_id">
						<div class="alert alert-danger" id="offer_send_warning">
							<strong>Offer already sent !</strong>
							if you send again, your previous offer will be replaced by this offer
						</div>
						<button class="btn btn-default green-small" type="button" id="offer_submit_button">Place Offer</button>
					</form>
				</li>
			</ul>
		@else	{{-- If user is not logged in --}}
			<ul class="dropdown-menu">
				<li>
					<div class="pos-adj03">
						<span>Please </span><a href="#" class="def" data-toggle="modal" data-target="#lgn-pup" href="#" class="link_text">LOGIN</a>
						or
						<a data-toggle="modal" data-target="#sgn-pup" class="" href="#" class="link_text">SIGN UP</a> to continue
					</div>
				</li>
			</ul>
		@endif
	</div>
</div>
