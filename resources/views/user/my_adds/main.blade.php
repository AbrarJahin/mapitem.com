@extends('user.master')

@section('page_title', 'My Adds')
@section('meta_page_description', 'Mapitem - All My Adds')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	@for ($i = 0; $i < 1; $i++)
	    @include('user.my_adds.active_add')
	    @include('user.my_adds.inactive_add')
	@endfor
	@include('user.my_adds.add_edit')
@endsection