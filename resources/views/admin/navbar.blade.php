{{-- Navigation --}}
<nav class="navbar navbar-inverse no-margin" role="navigation">
	<div class="container-fluid">
		{{-- Brand and toggle get grouped for better mobile display --}}
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html"><img src="{{ URL::asset('images/blockhunt-logo.png') }}" width="175"></a>
		</div>
		{{-- Collect the nav links, forms, and other content for toggling --}}
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-right ip-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle loginbtn" data-toggle="dropdown"><i class="glyphicon glyphicon-user round2"></i> Max Ezoory  <b class="glyphicon glyphicon-menu-down c-adj2"></b></a>
				<ul class="dropdown-menu dashboard">
					<li class="">
						<a href="#">Dashboard</a>
					</li>
					<li class="">
						<a href="#">Profile</a>
					</li>
					<li class="">
						<a href="#">Wishlist</a>
					</li>
					<li class="">
						<a href="#">Sign out</a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="#" class="" data-toggle="modal" data-target="#pfa">Post free ad </a>
			</li>
		</ul>
		</div>
		{{-- /.navbar-collapse --}}
	</div>
{{-- /.container --}}
</nav>