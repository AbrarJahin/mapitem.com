{{-- Navigation --}}
<nav class="navbar navbar-inverse @yield('nav_classes')" role="navigation">
	<div class="container-fluid">
		{{-- Brand and toggle get grouped for better mobile display --}}
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ URL::route('index') }}"><img src="@yield('nav_logo_img_src')"></a>
		</div>
		{{-- Collect the nav links, forms, and other content for toggling --}}
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			@yield('nav_filter')

			<div class="clearfix visible-xs-block"></div>
			<ul class="nav navbar-nav navbar-right @yield('nav_list_class')">
				@if (Auth::check())
					<li class="dropdown">
						@include('profile_menu')
					</li>
				@else
					<li id="dt" class="dropdown">
						@include('public.log_in')
					</li>

					<li id="su" class="dropdown">
						@include('public.sign_up')
					</li>
				@endif

				<li class="dropdown">
					<a href="#" class="def" data-toggle="modal" data-target="#pfa">Post free ad </a>
				</li>
			</ul>

		</div>
		{{-- /.navbar-collapse --}}
	</div>
	{{-- /.container --}}
</nav>