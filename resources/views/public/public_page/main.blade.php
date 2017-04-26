@extends('user.master')

@section('page_title', $public_page->small_title)
@section('meta_page_description', 'Mapitem - '.$public_page->small_title)
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	<div class="db-body">
		<h1>{{ $public_page->big_title }}</h1>
		<div class="db-b">
		    <p>
		        {!! $public_page->description !!}
		    </p>
		</div>
	</div>
@endsection