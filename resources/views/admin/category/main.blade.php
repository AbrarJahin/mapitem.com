@extends('admin.master')

@section('page_title', 'Category')
@section('meta_page_description', 'Content on this page are All Category content')
@section('meta_author', 'S. M. Abrar Jahin')

@section('content')

	<meta name="datatable_ajax_url" content="{{ URL::route('admin.category_datable') }}">
	<table id="category-datatable"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
			<thead>
				<tr>
					<th>Category Name</th>
					<th style="width: 70px;">Action</th>
				</tr>
			</thead>
	</table>

	{{-- Add Category Modal --}}
	<div class="modal fade" id="add_data_modal" role="dialog">
		<div class="modal-dialog">
			{{-- Modal content --}}
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Category</h4>
				</div>
				<div class="modal-body">
					<form role="form" action="" method="post">
						<div class="form-group">
							<label for="category">Category:</label>
							<input type="text" class="form-control" placeholder="Enter Category Name" name="category_name">
						</div>
				</div>
				<div class="modal-footer">
						<button type="submit" id="add_category_button" class="btn btn-info" data-dismiss="modal">Add Category</button>
					</form>
				</div>
			</div>
			
		</div>
	</div>

	{{-- Edit Category Modal --}}
	<div class="modal fade" id="edit_data_modal" role="dialog">
		<div class="modal-dialog">
			{{-- Modal content --}}
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Category</h4>
				</div>
				<div class="modal-body">
					<form role="form" action="" method="post">
						<div class="form-group">
							<label for="category">Category:</label>
							<input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" id="selected_category_name">
							<input type="hidden" name="category_id" id="selected_category_id">
						</div>
				</div>
				<div class="modal-footer">
						<button type="submit" id="update_category_button" class="btn btn-info" data-dismiss="modal">Update Category</button>
					</form>
				</div>
			</div>
			
		</div>
	</div>

@endsection