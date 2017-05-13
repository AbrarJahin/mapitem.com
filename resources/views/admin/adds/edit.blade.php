{{-- Edit Category Modal --}}
<meta name="view_detail" content="{{ URL::route('admin.add_view') }}">

<div class="modal fade" id="edit_data_modal" role="dialog">
	<div class="modal-dialog">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Add</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="{{ URL::route('admin.add_update') }}" id="edit_add_form">
					<div class="form-group">
						<label for="category">Title</label>
						<input type="text" required class="form-control" placeholder="Title of the add" name="title" id="add-title">
					</div>
					<div class="form-group">
						<label for="sub-category">Description</label>
						<textarea rows="10" class="form-control" placeholder="Description of the content (Optional)" name="description" id="add-description"></textarea>
					</div>
					<div class="form-group">
						<label for="sub-category">Price</label>
						<input type="text" required class="form-control" placeholder="Enter Category Name" name="price" id="add-price">
					</div>

					{{-- Disabled Items - Start --}}
					<div class="form-group">
						<label for="sub-category">Owner Name</label>
						<input type="text" required class="form-control" placeholder="Enter Category Name" disabled id="add-owner-name">
					</div>
					<div class="form-group">
						<label for="sub-category">Category Name</label>
						<input type="text" required class="form-control" placeholder="Enter Category Name" disabled id="add-category-name">
					</div>
					<div class="form-group">
						<label for="sub-category">Sub-Category Name</label>
						<input type="text" required class="form-control" placeholder="Enter Category Name" disabled  id="add-subcategory-name">
					</div>
					<div class="form-group">
						<label for="sub-category">Address</label>
						<input type="text" required class="form-control" placeholder="Enter Category Name" disabled id="add-address">
					</div>
					{{-- Disabled Items - End --}}

					<div class="form-group">
						<label for="category">Is Active:</label>
						<select class="form-control" name="is_active" id="add-enable-state">
							<option value="active" selected>Active</option>
							<option value="inactive">Inactive</option>
						</select>
					</div>
			</div>
			<div class="modal-footer">
					<input type="hidden" name="id" id="selected_add_id">
					<button type="button" id="update_add_button" class="btn btn-info"{{-- data-dismiss="modal" --}}>Update Add</button>
				</form>
			</div>
		</div>
		
	</div>
</div>