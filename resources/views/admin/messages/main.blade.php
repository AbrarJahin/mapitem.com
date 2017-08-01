@extends('admin.master')

@section('page_title', 'Category')
@section('meta_page_description', 'Content on this page are All Category content')
@section('meta_author', 'S. M. Abrar Jahin')

@section('header_styles')
	@parent
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
@endsection

@section('ExtraJsLibraries')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>
@endsection

@section('content')

	@include('admin.messages.datatable')
	@include('admin.messages.view')

@endsection