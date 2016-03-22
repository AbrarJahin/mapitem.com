<nav class="navbar dn" role="navigation">
	<div class="container">
	{{-- Collect the nav links, forms, and other content for toggling --}}
	<div class="" id="bs-example-navbar-collapse-2">
		<ul class="nav navbar-nav navbar-left">
			<li class="">
				<a href="{{ URL::to('dashboard')}}" class="selected" > Dashboard  </a>
			</li>
			<li>
				<a href="{{ URL::to('my_adds')}}" class="" > My Ads <span class="notification">3</span></a>
			</li>
			<li>
				<a href="{{ URL::to('offers')}}" class="" > Offers  <span class="notification">3</span></a>
			</li>
			<li class="">
				<a href="{{ URL::to('inbox')}}" class="" > Inbox  <span class="notification">3</span></a>
			</li>
			<li class="">
				<a href="{{ URL::to('my_profile')}}" class="" > My Profile  </a>
			</li>
			<li class="">
				<a href="{{ URL::to('account')}}" class="" > Account </a>
			</li>
		</ul>
	</div>
	{{-- /.navbar-collapse --}}
	</div>
{{-- /.container --}}
</nav>
