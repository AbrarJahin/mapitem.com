<div class="tab-pane active" id="c">
	<div class="s-box">
		<h4>Security Settings</h4>
		<p>Change Password</p>

		<form id="change_password_form" action="{{ URL::route('user.update_password') }}" method="POST">

			<div class="col-lg-3">
				<input type="password" class="form-control normal-input margin-adj" id="adtitle" name="old_password" placeholder="Old password">
			</div>
			<div class="col-lg-3">
				<input type="password" class="form-control normal-input margin-adj" id="adtitle" name="password" placeholder="New Password">
			</div>
			<div class="col-lg-3">
				<input type="password" class="form-control normal-input margin-adj" id="adtitle" name="password_confirmation" placeholder="Confirm Password">
			</div>
			<div class="col-lg-3">
				<div id="validation_error"></div>
			</div>
			<div class="clearfix"></div>
			<div class="col-lg-3">
				<button type="submit" class="green-small pull-left no-textdecor">Save</button>
			</div>

		</form>

	</div>
</div>