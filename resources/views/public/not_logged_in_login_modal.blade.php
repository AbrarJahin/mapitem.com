<div id="lgn-pup" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog width-adj10">
		{{-- Modal content--}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Please Login</h4>
			</div>
			<div class="modal-body">

				<form role="form" id="login-fpop" class="login" method="post" action="{{ URL::route('login') }}">
					<div class="form-group" id="login-email-div-pop">
						<input type="email" name="email" required placeholder="Email" id="login-email-pop" class="form-control normal-input">
					</div>
					<div class="form-group" id="login-password-div-pop">
						<input type="password" name="password" required placeholder="Password" class="form-control normal-input" name="login-password" id="login-password-pop">
					</div>
					<div class="pos-adj1">
						<a style="color: #23a500 !important; float: left; font-size: 9pt!important; padding: 0 !important; width: 50%;" data-target="#forgot-password" data-toggle="modal" href="#" class="fp">Forgot Password ?</a>
						<div class="checkbox no-margin pull-right">
							<label class="pos-adj2">
								<input name="remember_me" type="checkbox"/> Remember Me
							</label>
						</div>
					</div>
					<div class="form-group text-danger" id="login_error_message_pop"></div>
					<button type="submit" data-loading-text="Logging in.." id="login_submit_pop" class="btn btn-default green-small3 margin-top-twenty">Login</button>
					<div class="pos-adj3">
						<span>Don't have an account ?</span>
						<a data-target="#sgn-pup" data-toggle="modal" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;" class="sup" href="#">Sign up</a>
					</div>
					<div class="clearfix"></div>
					<div style="display:none" class="for-pass">
						<div class="modal-header">
							<button type="button" class="close closefp" data-dismiss="modal">×</button>
							<h4 class="modal-title">Reset Password</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<input type="email" placeholder="Email Address" id="InputEmail1" class="form-control normal-input">
							</div>
							<button class="btn btn-default green-small" type="submit">Reset Password</button>
							<p class="small-text margin-top-ten">We will send password to your email address shortly</p>
						</div>
					</div>
				</form>

				<a class="facebook butt-adj1" href="{{ URL::route('facebook.login') }}">
					<i class="fa fa-facebook fa-fw pull-left"></i>
					Sign in with Facebook
				</a>

				<div class="googleplus g-signin2" data-onsuccess="onSignIn" data-theme="light" data-longtitle="true" data-width="248" data-height="33">Sign in with Google</div>
				<meta name="google_login_url" content="{{ URL::route('google.login') }}">

			</div>
			<div class="clearfix margin-twenty"></div>

		</div>
	</div>
</div>