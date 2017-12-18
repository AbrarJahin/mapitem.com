<a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown">
	<img class="glyphicon-user round2" src="@if (strlen(Auth::user()->profile_picture) > 4)
							{{ URL::asset('uploads') }}/{{ Auth::user()->profile_picture }}
							@else
								{{ URL::asset('images/empty-profile.jpg') }}
						@endif">
	{{ Auth::user()->first_name }}
	<b class="glyphicon glyphicon-menu-down c-adj2"></b>
</a>
<ul class="dropdown-menu dashboard">
	<li class="">
		<a href="{{ URL::route('user.dashboard') }}">Dashboard</a>
	</li>
	<li class="">
		<a href="{{ URL::route('user.my_adds') }}">My Ads</a>
	</li>
	<li class="">
		<a href="{{ URL::route('user.profile') }}">Profile</a>
	</li>
	<li class="">
		<a href="{{ URL::route('user.wishlist') }}">Wishlist</a>
	</li>
	<li class="">
		<a href="{{ URL::route('logout') }}">Sign out</a>
	</li>
</ul>