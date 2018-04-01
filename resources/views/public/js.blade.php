@section('footer_scripts')
	{{-- jQuery,Bootstrap,Dropzone,Geocomplete,Wizard --}}
	<script src="https://cdn.jsdelivr.net/g/jquery@1.11.1,bootstrap@3.3.6,dropzone@4.0.1,jquery.geocomplete@1.7.0,bootstrap.wizard@1.2.0"></script>

	{{-- Typehead Plugin --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.0.1/typeahead.bundle.min.js" type="text/javascript" charset="utf-8"></script>

	{{-- Map Place API --}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.22&key={{ env('GOOGLE_MAP_API_KEY') }}&sensor=true&amp;libraries=places" type="text/javascript"></script>
	{{-- Custom JS --}}
	<script src="{{ URL::asset('js/custom.js') }}"></script>
    {{-- Push Menu --}}
@show