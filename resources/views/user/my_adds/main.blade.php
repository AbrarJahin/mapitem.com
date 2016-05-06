@extends('user.master')

@section('page_title', 'Inbox')
@section('meta_page_description', 'Mapitem Inbox')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	@for ($i = 0; $i < 5; $i++)
	    @include('user.my_adds.active_add')
	    @include('user.my_adds.inactive_add')
	@endfor
@endsection