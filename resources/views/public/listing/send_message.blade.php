<ul class="dropdown-menu no-padding loginpopup col-lg-4 contact">
	<li>
		<form id="send_message_to_owner" role="form" class="offer" method="post" action="{{ URL::route('user.create_message_thread') }}">
			<div class="form-group">
				<input type="hidden" name="add_owner_id" id="add_owner_id">
				<input type="hidden" name="add_id" id="selected_add_id">
				<textarea name="message" rows="3" placeholder="Any Question" class="form-control tarea"></textarea>
			</div>
			<button class="btn btn-default green-small width-adj" type="submit">
				Send Message
			</button>
		</form>
	</li>
</ul>