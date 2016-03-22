@extends('admin.master')

@section('page_title', 'Dashboard')
@section('meta_page_description', 'Content on this page are dashboard content')

@section('content')

	<div class="db-body">
		@include('admin.dashboard.complete_profile')
		@include('admin.dashboard.verify_identity')
		@include('admin.dashboard.connect_fb')
		@include('admin.dashboard.help')
	</div>

@endsection