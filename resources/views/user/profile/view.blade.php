{{-- <form action="view_submit" method="get" class="p-display"> --}}
<div class="p-display">
	<a class="grey-small pull-left no-textdecor pdisplay" href="#">Edit</a>
	<div class="clearfix margin-twenty"></div>
	<div class="">
		<img src="	@if( strlen($current_user->profile_picture)>4 )
						{{ url('uploads').'/'.$current_user->profile_picture }}
					@else
						{{ url('images/empty-profile.jpg') }}
					@endif" width="144" height="144">
	</div>
	<div class="clearfix margin-twenty">
		<progress value="0" max="100" id="uploadProgress" style="display:none;"></progress>
	</div>
	<div class="p-left">Full Name</div>
	<div class="p-right">{{ $current_user->first_name.' '.$current_user->last_name }}</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Cell Number</div>
	<div class="p-right">{{ $current_user->cell_no }}</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Email</div>
	<div class="p-right">{{ $current_user->email }}</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Website</div>
	<div class="p-right">{{ $current_user->website }}</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Date of Birth</div>
	<div class="p-right">
		{{ $current_user->date_of_birth }}
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Social Security</div>
	<div class="p-right">
		<div class="pull-left width-adj04">{{ $current_user->social_security_number_p1 }}</div>
		<span class="pull-left">-</span>
		<div class="pull-left width-adj04">{{ $current_user->social_security_number_p2 }}</div>
		<span class="pull-left">-</span>
		<div class="pull-left width-adj04">{{ $current_user->social_security_number_p3 }}</div>
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Address</div>
	<div class="p-right">{{ $current_user->address }}</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">&nbsp;</div>
	<div id="profile_location"></div>
	<div class="clearfix margin-twenty"></div>
</div>
{{-- </form> --}}