@section('footer_scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	{{-- Geo Complete --}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.22&key={{ env('GOOGLE_MAP_API_KEY') }}&sensor=true&libraries=places"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.min.js"></script>

	<script src="{{ URL::asset('js/jquery.bootstrap.wizard.js') }}"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	@yield('ExtraJsLibraries')
	<script src="{{ URL::asset('js/custom.js') }}"></script>
	<script src="{{ URL::asset('js/classie.js') }}"></script>
@show