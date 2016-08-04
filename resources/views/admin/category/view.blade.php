<meta name="view_detail" content="{{ URL::route('admin.category_view') }}">

{{-- Add Category Modal --}}
<div class="modal fade" id="view_data_modal" role="dialog">
	<div class="modal-dialog">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Category Detail</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="{{ URL::route('admin.category_add') }}">
					<div class="form-group">
						<label for="category">Category Name : </label>
						<span id="category_name">Category</span>
					</div>
			</div>
			<div class="modal-footer">
					<button type="button" id="add_category_button" class="btn btn-info"{{-- data-dismiss="modal" --}}>Add Category</button>
				</form>
			</div>
		</div>
		
	</div>
</div>