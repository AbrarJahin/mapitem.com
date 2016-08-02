{{-- Add Category Modal --}}
<div class="modal fade" id="add_data_modal" role="dialog">
	<div class="modal-dialog">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New SubCategory</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="{{ URL::route('admin.category_add') }}">
					<div class="form-group">
						<label for="category">SubCategory:</label>
						<input type="text" required class="form-control" placeholder="Enter Category Name" name="category_name">
					</div>
			</div>
			<div class="modal-footer">
					<button type="button" id="add_category_button" class="btn btn-info"{{-- data-dismiss="modal" --}}>Add SubCategory</button>
				</form>
			</div>
		</div>
		
	</div>
</div>