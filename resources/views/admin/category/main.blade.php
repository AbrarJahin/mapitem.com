@extends('admin.master')

@section('page_title', 'Category')
@section('meta_page_description', 'Content on this page are All Category content')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')

	@include('admin.category.datatable')
	@include('admin.category.add')
	@include('admin.category.view')
	@include('admin.category.edit')

@endsection