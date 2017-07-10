<meta name="datatable_ajax_url" content="{{ URL::route('admin.messages_datable') }}">

{{-- Category Datatable --}}
<table id="messages-datatable" class="table table-striped table-hover" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
		<thead>
			<tr>
				<th>Seller Name</th>
				<th>Buyer Name</th>
				<th>Ad. Title</th>
				<th>Message Title</th>
				<th>Creation Time</th>
				<th>Description</th>
				<th>Address</th>
				<th style="width: 70px;">Action</th>
			</tr>
		</thead>
</table>
