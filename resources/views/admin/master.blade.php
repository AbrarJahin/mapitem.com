@section('header')
	@include('admin.header')
@show

@section('navbar')
	@include('admin.navbar')
@show

@section('topbar')
	@include('admin.topbar')
@show

	<div class="container">
		<br/><br/>
		@yield('content')
	</div>

@include('footer_html')
@include('admin.js')

</body>
{!! $google_analytics_script or '' !!}
</html>