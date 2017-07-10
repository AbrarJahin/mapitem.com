{{-- Delete SubCategory Modal --}}
<div class="modal fade" id="delete_confirmation_modal" role="dialog">
	<div class="modal-dialog">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Do you really want to delete this Sub-Category?</h4>
			</div>
			<form role="form" method="post" action="{{ URL::route('admin.sub_category_delete') }}" id="delete_data">
				<input type="hidden" id="delete_item_id" name="id">
				<div class="modal-footer">
					<button type="button" id="confirm_delete" class="btn btn-danger">Yes</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
				</div>
			</form>
		</div>

	</div>
</div>
