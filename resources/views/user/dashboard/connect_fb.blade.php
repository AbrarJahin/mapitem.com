<div class="db-b">
	<h3>Connect your account to facebook</h3>
	<p>
		Make your buyers feel more at ease with added confidence that you are friendly and safe to deal with.
	</p>
	<div class="clearfix"></div>
	@if (Auth::user()->is_fb_verified == 'not_verified')
		<a href="{{ URL::route('facebook.login') }}" class="btn green-medium pull-right blue-medium">Facebook Connect</a>
    @else
		<a href="#" class="btn green-medium pull-right">Facebook Connected</a>
    @endif
</div>