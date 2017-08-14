<nav class="navbar navbar-inverse navbar-fixed-top ip-adj2 cbp-spmenu-push" role="navigation">
	<div class="container-fluid">
		{{-- Brand and toggle get grouped for better mobile display --}}
		<div class="navbar-header">
			<button id="showRightPush" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand ipl" href="{{ URL::route('index') }}"><img src="{{ URL::asset('images/blockhunt-logo-minified.png') }}"></a>
		</div>
		{{-- Collect the nav links, forms, and other content for toggling --}}
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			@include('nav_filters')
			<div class="clearfix visible-xs-block"></div>
            <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
                <ul class="nav navbar-nav navbar-right ip-nav">
                    @if (Auth::check())
                        <li class="dropdown">
                            @include('user_menu')
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
                        <a href="#" class="def" data-toggle="modal" data-target="@if (Auth::check())#pfa @else #lgn-pup @endif">Post free ad</a>
                    </li>
                </ul>
             </div>
		</div>
		{{-- /.navbar-collapse --}}
	</div>
	{{-- /.container --}}
</nav>
