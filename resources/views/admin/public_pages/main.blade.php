@extends('admin.master')

@section('page_title', 'Public Pages')
@section('meta_page_description', 'Content on this page are All Public Pages')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')

	<meta name="view_detail" content="{{ URL::route('admin.public_page_view') }}">
	@include('admin.public_pages.datatable')
	@include('admin.public_pages.add')
	@include('admin.public_pages.edit')
	@include('admin.public_pages.delete')

@endsection