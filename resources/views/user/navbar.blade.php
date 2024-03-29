{{-- Navigation --}}
<nav class="navbar navbar-inverse no-margin" role="navigation">
	<div class="container-fluid">
		{{-- Brand and toggle get grouped for better mobile display --}}
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" id="showRightPush" data-target="#bs-example-navbar-collapse-1" >
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand ipl" href="{{ URL::route('index') }}"><img src="{{ URL::asset('images/blockhunt-logo-minified.png') }}"></a>
            <div href="#" class="nf-placeholder">Category, Search, Location <i class="fa fa-angle-down d-arrow"></i></div>
		</div>
        <div class="nf-block"><a class="fa fa-close nf-close"></a>@include('nav_filters')</div>
		{{-- Collect the nav links, forms, and other content for toggling --}}
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			

			<div class="clearfix visible-xs-block"></div>


            <ul class="nav navbar-nav navbar-right ip-nav">
				@if (!Auth::check())
					<li id="dt" class="dropdown">
						@include('public.log_in')
					</li>
					<li id="su" class="dropdown">
						@include('public.sign_up')
					</li>
					<li class="dropdown">
						<a href="#" class="def" data-toggle="modal" data-target="#lgn-pup">Post free ad</a>
					</li>
				@elseif (Auth::user()->user_type == "normal_user")
					<li class="dropdown">
						@include('user_menu')
					</li>
					<li class="dropdown">
						<a href="#" class="def" data-toggle="modal" data-target="#pfa">Post free ad </a>
					</li>
				@elseif (Auth::user()->user_type == "admin")
					<li class="dropdown">
						@include('admin_menu')
					</li>
				@endif
			</ul>

		</div>
		{{-- /.navbar-collapse --}}
	</div>
	{{-- /.container --}}
</nav>