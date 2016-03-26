@extends('admin.master')

@section('page_title', 'Profile')
@section('meta_page_description', 'Content on this page are profile content')

@section('footer_scripts')
	@parent
	<script src="{{ URL::asset('js/custom.js') }}"></script>
@endsection

@section('content')

	<div class="db-body">
		<div class="profile">
			@include('admin.profile.profile_view')
			@include('admin.profile.profile_edit')
		</div>
	</div>

@endsection