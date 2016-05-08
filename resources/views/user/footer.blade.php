	{{-- Footer --}}
	<footer>
	    <div class="first-strip">
	        <div class="container">
	            <a href="#">Blog</a>
	            |
	            <a href="#">Site Map</a>
	            |
	            <a href="#">Privacy</a>
	            |
	            <a href="#">About Us</a>
	            |
	            <a href="#">Contact Us</a>
	            |
	            <a href="#">Help</a>
	            |
	            <a href="#">Terms & Conditions</a>
	        </div>    
	    </div>
	    <div class="second-strip">
	        <div class="container">
	            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
	            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	                <button class="btn adj  green-large adj12" data-toggle="modal" data-target="#pfa">Post Free Ad</button>
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
	            © Copyright MapItem 2016
	        </div>
	    </div> 
	</footer>

	@section('footer_scripts')
		{{-- jQuery
		<script src="js/jquery.js"></script>
		--}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
		{{-- Bootstrap Core JavaScript
		<script src="js/bootstrap.min.js"></script>
		--}}
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		{{--
		<script src="js/jquery.bootstrap.wizard.js"></script>
		--}}
		<script src="{{ URL::asset('js/jquery.bootstrap.wizard.js') }}"></script>
		<script src="{{ URL::asset('js/custom.js') }}"></script>
	@show

    </body>
</html>