<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
	<div class="container-fluid">
		{{-- Brand and toggle get grouped for better mobile display --}}
		<div class="navbar-header">
			<button type="button" id="showRightPush" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand logo-push" href="{{ URL::route('index') }}"><img src="{{ URL::asset('images/blockhunt-logo-inverse.png') }}"></a>
		</div>
		{{-- Collect the nav links, forms, and other content for toggling --}}
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="clearfix visible-xs-block"></div>

                <ul class="nav navbar-nav navbar-right hp-nav">
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
                            <a href="#" class="def" data-toggle="modal" data-target="#pfa">Post free ad</a>
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