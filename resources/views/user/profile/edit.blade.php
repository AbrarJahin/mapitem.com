<form action="{{ URL::route('user.profile_update') }}" method="post" id="edit_profile" enctype="multipart/form-data" class="p-edit edit-on">
	<button class="pull-left no-textdecor pedit done" type="submit" form="edit_profile" id="profile_update" value="Submit">Done</button>
	<div class="clearfix margin-twenty"></div>
	<div class="">
		<img id="profile_img_preview" src="	@if( strlen($current_user->profile_picture)>4 )
						{{ url('uploads').'/'.$current_user->profile_picture }}
					@else
						{{ url('images/empty-profile.jpg') }}
					@endif" width="144" height="144">
		<input type="file" name="profile_image" onchange="document.getElementById('profile_img_preview').src = window.URL.createObjectURL(this.files[0])">
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left l-adj">Name</div>
	<div class="p-right">
		<input type="text" value="{{ $current_user->first_name }}" placeholder="First Name" name="first_name" class="form-control width-adj07 pull-left normal-input">
		<span class="separater">&nbsp;</span>
		<input type="text" value="{{ $current_user->last_name }}" placeholder="Last Name" name="last_name" class="form-control width-adj07 pull-left normal-input">
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Cell number</div>
	<div class="p-right">
		<input type="text" value="{{ $current_user->cell_no }}" placeholder="Enter cell number" name="cell_no" class="width-adj9 form-control normal-input"/>
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Email</div>
	<div class="p-right">
		<input type="email" value="{{ $current_user->email }}" placeholder="Email" name="email" class="form-control width-adj8 normal-input">
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Website</div>
	<div class="p-right">
		<input type="text" value="{{ $current_user->website }}" placeholder="Website" name="website" class="width-adj8 form-control normal-input">
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Date of Birth</div>
	<div class="p-right">
		<input value="{{ $current_user->date_of_birth }}" class="form-control width-adj8 normal-input pull-left" type="text" placeholder="mm/dd/yyyy" name="date_of_birth" id="date_of_birth">
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Social Security</div>
	<div class="p-right">
		<input type="text" value="{{ $current_user->social_security_number_p1 }}" placeholder="" name="social_security_1" class="width-adj7 normal-input pull-left">
		<span class="separater">-</span>
		<input type="text" value="{{ $current_user->social_security_number_p2 }}" placeholder="" name="social_security_2" class="width-adj7 normal-input pull-left">
		<span class="separater">-</span>
		<input type="text" value="{{ $current_user->social_security_number_p3 }}" placeholder="" name="social_security_3" class="width-adj7 normal-input pull-left">
		<span class="separater1">Last four digits or whole SSN</span>
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Address</div>
	<div class="p-right">
		<input type="text" value="{{ $current_user->address }}" placeholder="Address" name="address" id="user_address" class="width-adj9 form-control normal-input">
		<input type="hidden" value="{{ $current_user->location_latitude }}" name="location_latitude" id="location_lat_profile">
		<input type="hidden" value="{{ $current_user->location_longitude }}" name="location_longitude" id="location_lon_profile">
		<br/>
		<div id="user_address_map"></div>
	</div>
	<div class="clearfix margin-twenty"></div>
</form>