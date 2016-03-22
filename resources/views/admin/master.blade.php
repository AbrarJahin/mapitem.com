@section('header')
    @include('admin.header')
@show

@section('navbar')
    @include('admin.navbar')
@show

@section('advertisement_add_modal')
    @include('admin.advertisement_add_modal')
@show

@section('topbar')
    @include('admin.topbar')
@show

@section('status_bar')
    @include('admin.status_bar')
@show

	<div class="container">
		@yield('content')
	</div>

@section('footer')
    @include('admin.footer')
@show
