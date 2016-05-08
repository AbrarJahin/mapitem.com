@extends('user.master')

@section('page_title', 'Offers')
@section('meta_page_description', 'Mapitem Offers')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	<div class="db-body">
		@for ($i = 1; $i < 6; $i++)
			@include('user.offers.item')
		@endfor
	</div>
@endsection