<meta name="view_ajax_url" content="{{ URL::route('admin.message_view') }}">

{{-- Edit Category Modal --}}
<div class="modal fade" id="view_data_modal" role="dialog">
	<div class="modal-dialog">
		{{-- Modal content --}}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">View Message Detail</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="category">Add Name:</label>
					<input type="text" class="form-control" id="message_ad_name" disabled>
				</div>
				<div class="form-group">
					<label for="category">Add Owner Name:</label>
					<input type="text" class="form-control" id="message_ad_owner" disabled>
				</div>
				<div class="form-group">
					<label for="category">Add Posting Time:</label>
					<input type="text" class="form-control" id="message_ad_posting_time" disabled>
				</div>
				<div class="form-group">
					<label for="category">Add Last Edited time:</label>
					<input type="text" class="form-control" id="message_ad_last_edited_time" disabled>
				</div>
				<div class="form-group">
					<label for="category">Message Sender Name:</label>
					<input type="text" class="form-control" id="message_ad_sender_name" disabled>
				</div>
				<div class="form-group">
					<label for="category">Message Sender Email:</label>
					<input type="text" class="form-control" id="message_ad_sender_email" disabled>
				</div>
				<div class="form-group">
					<label for="category">Message Receiver Name:</label>
					<input type="text" class="form-control" id="message_ad_receiver_name" disabled>
				</div>
				<div class="form-group">
					<label for="category">Message Receiver Email:</label>
					<input type="text" class="form-control" id="message_ad_receiver_email" disabled>
				</div>
				<div class="form-group">
					<label for="category">Message Text:</label>
					<textarea class="form-control" rows="5" id="message_ad_message_text" disabled></textarea>
				</div>
				<div class="form-group">
					<label for="category">Message Sent Time:</label>
					<input type="text" class="form-control" id="message_ad_message_sent_time" disabled>
				</div>
				<div class="form-group">
					<label for="category">Message Receive Time:</label>
					<input type="text" class="form-control" id="message_ad_receive_time" disabled>
				</div>
			</div>

		</div>
		
	</div>
</div>