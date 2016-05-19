<a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown"><i class="glyphicon glyphicon-user round2"></i> {{ Auth::user()->first_name }}  <b class="glyphicon glyphicon-menu-down c-adj2"></b></a>
<ul class="dropdown-menu dashboard">
	<li class="">
		<a href="{{ URL::route('user.dashboard') }}">Dashboard</a>
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