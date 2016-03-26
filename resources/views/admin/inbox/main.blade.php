@extends('admin.master')

@section('page_title', 'Inbox')
@section('meta_page_description', 'Content on this page are inbox content')

@section('footer_scripts')
	@parent
	<script src="{{ URL::asset('js/custom.js') }}"></script>
@endsection

@section('content')

	<div class="db-body">
		<div class="inbox">
			<h6>You have <span>(1)</span> New Email</h6>
			@for ($i = 0; $i < 5; $i++)
				@include('admin.inbox.message')
			@endfor
		</div>
	</div>

@endsection