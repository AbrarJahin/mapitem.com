@extends('user.master')

@section('page_title', 'My Profile')
@section('meta_page_description', 'Mapitem - My Profile')
@section('meta_author', 'S. M. Abrar Jahin')

@section('header_styles')
	@parent
	{{-- Datepicker v1.6.1 --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
@endsection

@section('footer_scripts')
	@parent
	{{-- Datepicker v1.6.1 --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
	{{-- Clustered Map - Google map v3.20 --}}
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gmap3/6.1.0/gmap3.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/profile.js') }}"></script>
@endsection

@section('content')
	<div class="db-body">
		<div class="profile">
			@include('user.profile.view')
			@include('user.profile.edit')
		</div>
	</div>
@endsection