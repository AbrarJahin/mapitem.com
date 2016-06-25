@section('footer_scripts')
	{{-- jQuery,Bootstrap,Dropzone,Geocomplete,Wizard --}}
	<script src="https://cdn.jsdelivr.net/g/jquery@1.11.1,bootstrap@3.3.6,dropzone@4.0.1,jquery.geocomplete@1.7.0,bootstrap.wizard@1.2.0"></script>
	{{-- Map Place API --}}
	<script src="http://maps.googleapis.com/maps/api/js?sensor=true&amp;libraries=places"></script>
	{{-- Custom JS --}}
	<script src="{{ URL::asset('js/custom.js') }}"></script>
@show