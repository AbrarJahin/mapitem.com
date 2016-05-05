@section('header')
	@include('user.header')
@show

@section('navbar')
	@include('user.navbar')
@show

@section('advertisement_add_modal')
	@include('user.advertisement_add_modal')
@show

@section('topbar')
	@include('user.topbar')
@show

@section('status_bar')
	@include('user.status_bar')
@show

	<div class="container">
		@yield('content')
	</div>

@include('user.footer')