@section('header')
	@include('user.header')
@show

@section('navbar')
	@include('user.navbar')
@show

{{--
@section('navbar')
	@include('nav')
@show
<!-- Making Nav to user Nav -->
@section('nav_classes', 'no-margin')
@section('nav_logo_img_src', "{{ URL::asset('images/blockhunt-logo-normal.png') }}")
@section('nav_filter')
	@include('nav_filters')
@show
@section('nav_list_class', 'ip-nav')
--}}

@if (Auth::check() && Auth::user()->user_type=="normal_user")
	@section('advertisement_add_modal')
		{{-- @include('user.advertisement_add_modal') --}}
		@include('post_free_add_modal')
	@show
	@section('topbar')
		@include('user.topbar')
	@show
	@section('status_bar')
		@include('user.status_bar')
	@show

@elseif (!Auth::check())
	@include('public.not_logged_in_modal')
@endif

	<div class="container">
		@yield('content')
	</div>

@include('footer_html')
@include('user.js')

</body>
{!! $google_analytics_script or '' !!}
</html>