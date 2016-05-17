<a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown">Sign Up</a>
<ul class="dropdown-menu no-padding shadow loginpopup">
	<li>
	<form class="login" method="post" action="{{ URL::route('register_user') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<input type="text" class="form-control normal-input" name="first_name" placeholder="First Name" required>
		</div>

		<div class="form-group">
			<input type="text" class="form-control normal-input" name="last_name" placeholder="Last Name" required>
		</div>

		<div class="form-group">
			<input type="email" class="form-control normal-input" name="email" placeholder="Email" required>
		</div>

		<div class="form-group">
			<input type="password" class="form-control normal-input" name="password" placeholder="Password" required>
		</div>

		<div class="pos-adj4">
			By signing up you accept Mapitem's <a href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">Policy</a> and <a href="#" style="color:#23a500 !important; font-size: 10pt !important; padding: 0 !important;">Term of use</a>
		</div>

		<button type="submit" class="btn btn-default green-small3">Sign up</button>

		<div class="pos-adj3">
			<span>Already a member ? </span> <a class="si" href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">Sign in</a>
		</div>

	</form>

	</li>
</ul>