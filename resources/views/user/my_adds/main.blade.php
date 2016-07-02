@extends('user.master')

@section('page_title', 'My Adds')
@section('meta_page_description', 'Mapitem - All My Adds')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')

	@foreach ($my_adds as $my_add)
		@if($my_add->is_active=='active')
			@include('user.my_adds.active_add')
		@else
			@include('user.my_adds.inactive_add')
		@endif
	@endforeach

	<div id="show_paginator">
		{{ $my_adds->links() }}
	</div>

{{-- 	@for ($i = 0; $i < 1; $i++)
		@include('user.my_adds.active_add')
		@include('user.my_adds.inactive_add')
	@endfor --}}
	@include('user.my_adds.add_edit')
@endsection