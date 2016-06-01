@section('footer_scripts')
	{{-- jQuery --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	{{-- Dropzone - JS --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
	{{-- Bootstrap Core JavaScript --}}
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="{{ URL::asset('js/jquery.cycle.all.js') }}" type="text/javascript"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
	<script src="{{ URL::asset('js/jquery.maximage.js') }}" type="text/javascript"></script>
	{{-- Truncate paragraph --}}
	<script src="{{ URL::asset('js/jquery.dotdotdot.js') }}"></script>
	{{-- Scroll Speed --}}
	<script src="{{ URL::asset('js/jQuery.scrollSpeed.js') }}"></script>
	{{-- Post Free ad JS --}}
	<script src="{{ URL::asset('js/jquery.bootstrap.wizard.js') }}"></script>
	{{-- Pages JS --}}
	<script src="{{ URL::asset('js/page.js') }}"></script>
	{{-- Map Place API --}}
	<script src="http://maps.googleapis.com/maps/api/js?sensor=true&amp;libraries=places"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.min.js"></script>
	{{-- Custom JS --}}
	<script src="{{ URL::asset('js/custom.js') }}"></script>
@show