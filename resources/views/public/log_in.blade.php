<a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown"> Login</a>
<ul class="dropdown-menu no-padding shadow loginpopup">
	<li>
		<form role="form" id="login-f" class="login" method="post" action="{{ URL::route('login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<input type="email" class="form-control normal-input" name="email" placeholder="Email" required>
			</div>
			<div class="form-group">
				<input type="password" id="login-password" name="password" class="form-control normal-input" placeholder="Password" required>
			</div>
			<div class="pos-adj1">
				<a class="fp" href="#" data-toggle="modal" data-target="#forgot-password" data-dismiss="modal" style="color: #23a500 !important; float: left; font-size: 9pt!important; padding: 0 !important; width: 50%;">Forgot Password ?</a>
				<div class="checkbox no-margin pull-right">
					<label class="pos-adj2">
						<input name="remember_me" type="checkbox"> Remember Me
					</label>
				</div>
			</div>
			<button type="submit" data-loading-text="Logging in.." id="login_submit" class="btn btn-default green-small3 margin-top-twenty">Login</button>
			<div class="pos-adj3">
				<span>Don't have an account ?</span>
				<a href="#" class="sup" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">Sign up</a>
			</div>
		</form>
{{--
		<script>
			$(document).ready(function()
			{
				$("#login_submit").click(function(e)
				{
					e.preventDefault();
					alert("Submitted");
				});
			});
		</script>
--}}
		<div class="clearfix"></div>

		<div class="for-pass" style="display:none">
			<div class="modal-header">
				<button data-dismiss="modal" class="close closefp" type="button">×</button>
				<h4 class="modal-title">Reset Password</h4>
			</div>
			<div class="modal-body">
				<form action="#" class="login no-border">
					<div class="form-group">
						<input type="email" class="form-control normal-input" name="email" placeholder="Email Address">
					</div>

					<button type="submit" class="btn btn-default green-small">Reset Password</button>
					<p class="small-text margin-top-ten">We will send password to your email address shortly</p>
				</form>
			</div>
		</div>

		<a href="#" class="facebook">Login with Facebook</a>
		<a href="#" class="googleplus">Login with Google Plus</a>

	</li>

</ul>