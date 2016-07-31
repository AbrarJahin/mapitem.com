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
		@yield('content')
	</div>

@include('footer_html')
@include('admin.js')

</body>
</html>