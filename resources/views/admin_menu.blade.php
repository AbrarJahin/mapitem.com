<a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown"><i class="glyphicon glyphicon-user round2"></i> {{ Auth::user()->first_name }}  <b class="glyphicon glyphicon-menu-down c-adj2"></b></a>
<ul class="dropdown-menu dashboard">
	<li class="">
		<a href="{{ URL::route('admin.category') }}">Category</a>
	</li>
	<li class="">
		<a href="{{ URL::route('admin.sub_category') }}">Sub-Category</a>
	</li>
	<li class="">
		<a href="{{ URL::route('admin.show_users') }}">Users</a>
	</li>
	<li class="">
		<a href="{{ URL::route('admin.adds') }}">Adds</a>
	</li>
	<li class="">
		<a href="{{ URL::route('admin.messages') }}">Messages</a>
	</li>
	<li class="">
		<a href="{{ URL::route('admin.offers') }}">Offers</a>
	</li>
	<li class="">
		<a href="{{ URL::route('admin.transactions') }}">Transactions</a>
	</li>
	<li class="">
		<a href="{{ URL::route('logout') }}">Sign out</a>
	</li>
</ul>