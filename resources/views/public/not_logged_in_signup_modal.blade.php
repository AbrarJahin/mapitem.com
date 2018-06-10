<div id="sgn-pup" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog width-adj10">
		{{-- Modal content--}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Please Sign Up</h4>
			</div>
			<div class="modal-body">
				<form  id="sign-up-fpop" method="post" action="{{ URL::route('register_user') }}">
					<div class="form-group" id="signup-first_name_pop-div">
						<input type="text" required placeholder="First Name" id="signup-first_name_pop" name="first_name" class="form-control normal-input">
					</div>
					<div class="form-group" id="signup-last_name_pop-div">
						<input type="text" required placeholder="Last Name" id="signup-last_name_pop" name="last_name" class="form-control normal-input">
					</div>
					<div class="form-group" id="signup-email-pop-div">
						<input type="email" required placeholder="Email" id="signup-email-pop" name="email" class="form-control normal-input">
					</div>
					<div class="form-group" id="signup-password-pop-div">
						<input type="password" name="password" required placeholder="Password" id="signup-password-pop" class="form-control normal-input">
					</div>
					<div class="pos-adj4">
						By signing up you accept Mapitem's <a target="_blank" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;" href="{{ URL::route('public_page', 'privacy') }}">Policy</a> and <a target="_blank" style="color:#23a500 !important; font-size: 10pt !important; padding: 0 !important;" href="{{ URL::route('public_page', 'terms_conditions') }}">Term of use</a>
					</div>
					{{-- Error Showing Div --}}
					<div class="form-group text-danger" id="sign_up_error_message_pop"></div>

					<button type="submit" id="sign_up_submit_pop" data-loading-text="Signing Up.." class="btn btn-default green-small3">Sign up</button>
					<div class="pos-adj3">
						<span>Already a member ? </span> <a data-target="#lgn-pup" data-toggle="modal" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;" href="#" class="si">Sign in</a>
					</div>
				</form>
			</div>
			<div class="clearfix margin-twenty"></div>
		</div>
	</div>
</div>