@extends('admin.master')

@section('page_title', 'My Adds')
@section('meta_page_description', 'Content on this page are My Adds')

@section('footer_scripts')
	@parent
	<script src="{{ URL::asset('js/custom.js') }}"></script>
@endsection

@section('content')

@for ($i = 0; $i < 10; $i++)

    @include('admin.my_adds.active_add')

    @include('admin.my_adds.inactive_add')

@endfor

@endsection