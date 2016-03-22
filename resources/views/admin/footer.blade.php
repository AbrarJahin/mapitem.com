		{{-- Footer --}}
		<footer>
			<div class="first-strip">
				<div class="container">
					<a href="{{ URL::to('blog')}}">Blog</a> |
					<a href="{{ URL::to('site_map')}}">Site Map</a> |
					<a href="{{ URL::to('privacy')}}">Privacy</a> |
					<a href="{{ URL::to('about_us')}}">About Us</a> |
					<a href="{{ URL::to('contact_us')}}">Contact Us</a> |
					<a href="{{ URL::to('help')}}">Help</a> |
					<a href="{{ URL::to('t&c')}}">Terms & Conditions</a>
				</div>    
			</div>
			<div class="second-strip">
			<div class="container">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<button type="submit" class="btn adj  green-large adj12">Post Free Ad</button>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a href="#" class="round fa fa-fw">&#xf099;</a>
				<a href="#" class="round fa fa-fw">&#xf09a;</a>
				<a href="#" class="round fa fa-fw">&#xf0e1;</a>
			</div>
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			</div>
			</div>
			<div class="third-strip">
			<div class="container">
			© Copyright BlockHunt 2015
			</div>
			</div>
		</footer>
		{{-- jQuery --}}
		<script src="{{ URL::asset('js/jquery.js') }}"></script>
		{{-- Bootstrap Core JavaScript --}}
		<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	</body>
</html>
