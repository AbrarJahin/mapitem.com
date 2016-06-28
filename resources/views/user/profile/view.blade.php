<form action="view_submit" method="get" class="p-display">
	<a class="grey-small pull-left no-textdecor pdisplay" href="#">Edit</a>
	<div class="clearfix margin-twenty"></div>
	<div class="">
		<img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRc7SeD-2c7vYXottsMsVug6andcK2iwDrXzDXt7OggtbiLDDLB_A" width="144" height="144">
	</div>
	<div class="clearfix margin-twenty"></div>
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
		{{--
		<div class="pull-left width-adj04">20</div>
		<span class="pull-left">/</span>
		<div class="pull-left width-adj04">12</div>
		<span class="pull-left">/</span>
		<div class="pull-left width-adj04">1980</div>
		--}}
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Social Security</div>
	<div class="p-right">
		{{ $current_user->social_security_number }}
		{{--
		<div class="pull-left width-adj04">000</div>
		<span class="pull-left">-</span>
		<div class="pull-left width-adj04">00</div>
		<span class="pull-left">-</span>
		<div class="pull-left width-adj04">0000</div>
		--}}
	</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">Address</div>
	<div class="p-right">{{ $current_user->address }}</div>
	<div class="clearfix margin-twenty"></div>
	<div class="p-left">&nbsp;</div>
	<div class="p-right">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14096983.143811712!2d69.35229575!3d30.389400749999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38db52d2f8fd751f%3A0x46b7a1f7e614925c!2sPakistan!5e0!3m2!1sen!2s!4v1438623364123" width="400" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<div class="clearfix margin-twenty"></div>
</form>