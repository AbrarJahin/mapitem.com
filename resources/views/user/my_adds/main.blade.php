@extends('user.master')

@section('page_title', 'My Adds')
@section('meta_page_description', 'Mapitem - All My Adds')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')

	<meta name="add_status_update_ajax_url" content="{{ URL::route('user.update_add_status') }}">


	@foreach ($my_adds as $my_add)
		@include('user.my_adds.advertisement')
	@endforeach

	<div id="show_paginator">
		{{ $my_adds->links() }}
	</div>

	@include('user.my_adds.add_edit')
@endsection