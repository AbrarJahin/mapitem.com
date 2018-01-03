@extends('admin.master')

@section('page_title', 'Category')
@section('meta_page_description', 'Content on this page are All Category content')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')

	<meta name="view_detail" content="{{ URL::route('admin.sub_category_view') }}">
	@include('admin.sub_category.datatable')
	@include('admin.sub_category.add')
	@include('admin.sub_category.edit')
	@include('admin.sub_category.edit_success')
	@include('admin.sub_category.delete')

@endsection