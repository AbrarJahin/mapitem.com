{{-- Edit Category Modal --}}
<div class="modal fade" id="edit_data_modal" role="dialog">
	<div class="modal-dialog modal-admin-public">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Google Analytics</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="{{ URL::route('admin.google_analytics_update') }}" id="update_analytics_data">
					<input type="hidden" name="id">
					<div class="form-group">
						<label for="category">Route Name:</label>
						<input type="text" required class="form-control" placeholder="local_url or https://example.com/sub_directory" name="route_name" readonly>
					</div>
					<div class="form-group">
						<label for="category">Url:</label>
						<input type="text" required class="form-control" placeholder="Title to show in page footer" name="url" readonly>
					</div>
					<div class="form-group">
						<label for="category">Detail:</label>
						<input type="text" class="form-control" placeholder="Title showing on public page top (Optional)" name="detail">
					</div>
					<div class="form-group">
						<label for="category">Analytics Script:</label>
						<textarea rows="18" class="form-control wysihtml5" placeholder="Put your google analytics scripts here for this page" name="analytics_script" style="font-family:monospace;"></textarea>
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
					<button type="button" id="update_analytics_button" class="btn btn-info">Update Google Analytics</button>
				</form>
			</div>
		</div>
		
	</div>
</div>