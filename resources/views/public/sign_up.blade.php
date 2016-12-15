<a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown">Sign Up</a>
<ul class="dropdown-menu no-padding shadow loginpopup">
	<li>
		<form  id="sign-up-f" class="login" method="post" action="{{ URL::route('register_user') }}">

			<div class="form-group" id="signup-first_name-div">
				<input type="text" class="form-control normal-input" id="signup-first_name" name="first_name" placeholder="First Name">
			</div>

			<div class="form-group" id="signup-last_name-div">
				<input type="text" class="form-control normal-input" id="signup-last_name" name="last_name" placeholder="Last Name">
			</div>

			<div class="form-group" id="signup-email-div">
				<input type="email" class="form-control normal-input" id="signup-email" name="email" placeholder="Email">
			</div>

			<div class="form-group" id="signup-password-div">
				<input type="password" class="form-control normal-input" id="signup-password" name="password" placeholder="Password">
			</div>

			<div class="pos-adj4">
				By signing up you accept Mapitem's <a href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">Policy</a> and <a href="#" style="color:#23a500 !important; font-size: 10pt !important; padding: 0 !important;">Term of use</a>
			</div>

			{{-- Error Showing Div --}}
			<div class="form-group text-danger" id="sign_up_error_message"></div>

			<button type="submit" id="sign_up_submit" data-loading-text="Signing Up.." class="btn btn-default green-small3">Sign up</button>

			<div class="pos-adj3">
				<span>Already a member ? </span> <a class="si" href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">Sign in</a>
			</div>

		</form>

	</li>
</ul>