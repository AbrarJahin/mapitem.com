{{-- If user is not logged in, then needed --}}
@if (!Auth::check())
	{{--send offer login Modal --}}
	@include('public.not_logged_in_login_modal')
	{{-- Send offer sign up Modal --}}
	@include('public.not_logged_in_signup_modal')
@endif