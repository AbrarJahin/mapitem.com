<meta name="datatable_ajax_url" content="{{ URL::route('admin.messages_datable') }}">

{{-- Category Datatable --}}
<table id="messages-datatable" class="table table-striped table-hover" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
		<thead>
			<tr>
				<th>Ad ID</th>
				<th>Ad Name</th>
				<th>Ad Owner</th>
				<th>Sender</th>
				<th>Receiver</th>
				<th>Message</th>
				<th>Sent time</th>
				<th>Read Time</th>
				<th style="width: 70px;">Action</th>
			</tr>
		</thead>
</table>
