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
			<th>Sent Time</th>
			<th>Read Time</th>
			<th>Action</th>
		</tr>
		<tr>
			<th><input type="text" id="0" placeholder="Search Ad ID" class="form-control messages-search-input"></th>
			<th><input type="text" id="1" placeholder="Search Ad Name" class="messages-search-input form-control"></th>
			<th><input type="text" id="2" placeholder="Search Ad Owner" class="messages-search-input form-control"></th>
			<th><input type="text" id="3" placeholder="Search Sender" class="messages-search-input form-control"></th>
			<th><input type="text" id="4" placeholder="Search Receiver" class="messages-search-input form-control"></th>
			<th><input type="text" id="5" placeholder="Search Message" class="messages-search-input form-control"></th>
			<th><input type="text" id="6" placeholder="Set Sent Date" class="messages-search-input form-control datepicker"></th>
			<th><input type="text" id="7" placeholder="Set Read Date" class="messages-search-input form-control datepicker"></th>
			<th><input type="hidden"></th>
		</tr>
	</thead>
</table>

<font color="red">* All showes time here are server time</font>
