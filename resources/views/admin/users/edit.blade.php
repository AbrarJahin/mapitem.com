{{-- Edit Category Modal --}}
<div class="modal fade" id="edit_data_modal" role="dialog">
	<div class="modal-dialog">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit User</h4>
			</div>
			<form role="form" method="post" id="update_user" action="{{ URL::route('admin.user_update') }}">
				<div class="modal-body">
					<div class="form-group">
						<label for="name">User Name:</label>
						<input type="text" required class="form-control" placeholder="User Name Not Entered" name="user_name" id="selected_user_name" disabled>

						<label for="email">Email:</label>
						<input type="text" required class="form-control" placeholder="Email Not Entered" name="email" id="selected_email" disabled>

						<label for="cell_no">Cell No:</label>
						<input type="text" required class="form-control" placeholder="Cell No. Not Entered" name="cell_no" id="selected_cell_no" disabled>

						<label for="socil_security_no">SSN:</label>
						<input type="text" required class="form-control" placeholder="SSN Not Entered" name="ssn" id="selected_ssn" disabled>

						<label for="address">Address:</label>
						<input type="text" required class="form-control" placeholder="Address Not Entered" name="address" id="selected_address" disabled>

						<label for="website">Website:</label>
						<input type="text" required class="form-control" placeholder="Website Not Entered" name="website" id="selected_website" disabled>

						<label for="date_of_birth">Date of Birth:</label>
						<input type="text" required class="form-control" placeholder="DOB not Entered" name="date_of_birth" id="selected_date_of_birth" disabled>

						<label for="is_enabled">User Status:</label>
						<select required class="form-control" name="is_enabled" id="selected_is_enabled">
							<option value="enabled">Enabled</option>
							<option value="disabled">Disabled</option>
						</select>

						<input type="hidden" name="id" id="selected_id">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="update_button" class="btn btn-info">Update User</button>
				</div>
			</form>
		</div>
	</div>
</div>