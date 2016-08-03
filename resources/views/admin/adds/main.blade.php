@extends('admin.master')

@section('page_title', 'Category')
@section('meta_page_description', 'Content on this page are All Category content')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')

	@include('admin.adds.datatable')
	@include('admin.adds.add')
	@include('admin.adds.edit')

@endsection