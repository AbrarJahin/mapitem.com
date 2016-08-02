{{-- Edit Category Modal --}}
<div class="modal fade" id="edit_data_modal" role="dialog">
	<div class="modal-dialog">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit SubCategory</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="{{ URL::route('admin.category_update') }}">
					<div class="form-group">
						<label for="category">SubCategory:</label>
						<input type="text" required class="form-control" placeholder="Enter Category Name" name="category_name" id="selected_category_name">
						<input type="hidden" name="category_id" id="selected_category_id">
					</div>
			</div>
			<div class="modal-footer">
					<button type="button" id="update_category_button" class="btn btn-info"{{-- data-dismiss="modal" --}}>Update SubCategory</button>
				</form>
			</div>
		</div>
		
	</div>
</div>