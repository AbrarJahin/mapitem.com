@extends('user.master')

@section('page_title', $public_page->small_title)
@section('meta_page_description', 'Mapitem - '.$public_page->small_title)
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	<div class="db-body">
		<h3>{{ $public_page->big_title }}</h3>
		<div class="db-b">
			{{ $public_page->description }}
		</div>
	</div>
@endsection