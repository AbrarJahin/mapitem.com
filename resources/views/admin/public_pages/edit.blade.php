{{-- Edit Category Modal --}}
<div class="modal fade" id="edit_data_modal" role="dialog">
	<div class="modal-dialog modal-admin-public">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Public Page</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="{{ URL::route('admin.public_pages_update') }}" id="update_data">
					<input type="hidden" name="id" id="public_page_id">
					<div class="form-group">
						<label for="category">Url:</label>
						<input type="text" required class="form-control" placeholder="local_url or https://example.com/sub_directory" name="url">
					</div>
					<div class="form-group">
						<label for="category">Small Title:</label>
						<input type="text" required class="form-control" placeholder="Title to show in page footer" name="small_title">
					</div>
					<div class="form-group">
						<label for="category">Big Title:</label>
						<input type="text" class="form-control" placeholder="Title showing on public page top (Optional)" name="big_title">
					</div>
					<div class="form-group">
						<label for="category">Description:</label>
						<textarea rows="18" class="form-control wysihtml5" placeholder="Description of the content (Optional)" name="description"></textarea>
					</div>
					<div class="form-group">
						<label for="category">Page Order:</label>
						<input type="number" min="0" max="255" class="form-control" placeholder="Order of the content (Optional) [min=0, max=255]" name="page_order">
					</div>
					<div class="form-group">
						<label for="category">Is Enabled:</label>
						<select class="form-control" name="is_enabled">
							<option value="enabled" selected>Enabled</option>
							<option value="disabled">Disabled</option>
						</select>
					</div>
			</div>
			<div class="modal-footer">
					<button type="button" id="update_public-page_button" class="btn btn-info">Update Public Page</button>
				</form>
			</div>
		</div>
		
	</div>
</div>