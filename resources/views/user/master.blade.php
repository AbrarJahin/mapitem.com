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

{{-- Templrary payment support message popup - Started --}}
<div class="modal fade" id="not_available" role="dialog">
	<div class="modal-dialog">
		{{-- Modal content--}}
		<div class="modal-content" >
			<div class="modal-header modal-header-warning">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="glyphicon glyphicon-warning-sign"></i> Please Be Patient</h4>
			</div>
			<div class="modal-body">
				<p>This feature is not completed yet when it will be completed, we will let you know!</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
{{-- Templrary payment support message popup - END --}}

</body>
{!! $google_analytics_script or '' !!}
</html>