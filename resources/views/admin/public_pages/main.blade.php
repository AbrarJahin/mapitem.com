@extends('admin.master')

@section('page_title', 'Public Pages')
@section('meta_page_description', 'Content on this page are All Public Pages')
@section('meta_author', 'S. M. Abrar Jahin')

@section('header_styles')
	<link rel="stylesheet" type="text/css" href="https://raw.githubusercontent.com/jhollingworth/bootstrap-wysihtml5/master/src/bootstrap-wysihtml5.css">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin_popup_fix.css') }}">
@endsection

@section('ExtraJsLibraries')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wysihtml5/0.3.0/wysihtml5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.0/bootstrap3-wysihtml5.all.min.js"></script>
@endsection


@section('content')

	<meta name="view_detail" content="{{ URL::route('admin.public_page_view') }}">
	@include('admin.public_pages.datatable')
	@include('admin.public_pages.add')
	@include('admin.public_pages.edit')
	@include('admin.public_pages.delete')

@endsection