@extends('admin.master')

@section('page_title', 'Category')
@section('meta_page_description', 'Content on this page are All Category content')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	<meta name="view_detail" content="{{ URL::route('admin.category_view') }}">

	@include('admin.category.datatable')
	@include('admin.category.add')
	{{--	@include('admin.category.view')	--}}
	@include('admin.category.edit')
	@include('admin.category.delete')

@endsection