@extends('user.master')

@section('page_title', 'My Adds')
@section('meta_page_description', 'Mapitem - All My Adds')
@section('meta_author', 'S. M. Abrar Jahin')

@section('footer_scripts')
	@parent
	<script type="text/javascript" src="{{ URL::asset('js/my_adds.js') }}"></script>
@endsection

@section('content')

	<meta name="add_status_update_ajax_url" content="{{ URL::route('user.update_add_status') }}">
	<meta name="add_view_ajax_url" content="{{ URL::route('user.add_detail') }}">
	<meta name="add_update_ajax_url" content="{{ URL::route('user.update_add') }}">

	@foreach ($my_adds as $my_add)
		@include('user.my_adds.advertisement')
	@endforeach

	<div id="show_paginator">
		{{ $my_adds->links() }}
	</div>

	@include('user.my_adds.add_edit')
@endsection