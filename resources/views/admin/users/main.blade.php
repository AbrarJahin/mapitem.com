@extends('admin.master')

@section('page_title', 'Category')
@section('meta_page_description', 'Content on this page are All Category content')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')
	<meta name="view_detail" content="{{ URL::route('admin.user_view') }}">

	@include('admin.users.datatable')
	@include('admin.users.edit')
	@include('admin.users.edit_success')
	@include('admin.users.delete')

@endsection