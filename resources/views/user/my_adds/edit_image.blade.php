<div class="col-lg-3 col-md-3 col-sm-5 no-padding">
	<img src="{{ asset('images/not-available_1.png') }}" id="add_title_image" class="pic-adj img-responsive"><br>
	<button type="button" class="btn btn-default green-small3" data-toggle="modal" data-target="#newpicture" id="my_adds_image_edit_button">
		Edit images
	</button>
	<!-- Modal -->
	<div class="modal fade" id="newpicture" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit images</h4>
			</div>
			<div class="modal-body">
				<div class="dropzone dropzone-previews" id="add_image_edit_div"></div>
				<meta name="existing_image_ajax_url" content="{{ URL::route('user.advertisement_images') }}">
				<meta name="edit_add_image_ajax_url" content="{{ URL::route('user.advertisement_images') }}">
				<meta name="edited_add_id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</div>

		</div>
	</div>
</div>