@extends('user.master')

@section('page_title', 'Dashboard')
@section('meta_page_description', 'Mapitem Dashboard')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	<div class="db-body">
		@include('user.dashboard.complete_profile')
		@include('user.dashboard.verify_identity')
		@include('user.dashboard.connect_fb')
		@include('user.dashboard.help')
	</div>
@endsection