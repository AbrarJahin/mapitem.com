{{-- Add SubCategory Modal --}}
<div class="modal fade" id="add_data_modal" role="dialog">
	<div class="modal-dialog">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New SubCategory</h4>
			</div>
			<form id="add_data" role="form" method="post" action="{{ URL::route('admin.sub_category_add') }}">
				<div class="modal-body">
					<div class="form-group">
						<label for="category">Category:</label>
						<select class="form-control" name="category_id">
							@foreach ($categories as $category)
								<option value='{{ $category->id }}'>
									{{ $category->name }}
								</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="category">SubCategory:</label>
						<input type="text" required class="form-control" placeholder="Enter Sub-Category Name" name="sub_category_name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="add_button" class="btn btn-info"{{-- data-dismiss="modal" --}}>Add SubCategory</button>
				</div>
			</form>
		</div>
	</div>
</div>