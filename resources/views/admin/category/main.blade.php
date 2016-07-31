@extends('admin.master')

@section('page_title', 'Category')
@section('meta_page_description', 'Content on this page are All Category content')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')

	<meta name="datatable_ajax_url" content="{{ URL::route('admin.category_datable') }}">
	<table id="category-datatable"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
			<thead>
				<tr>
					<th>Employee name</th>
					<th>Salary</th>
					<th>Age</th>
					<th  style="width: 70px;">Action</th>
				</tr>
			</thead>
	</table>

@endsection