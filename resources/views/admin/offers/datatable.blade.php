<meta name="datatable_ajax_url" content="{{ URL::route('admin.offers_datable') }}">

{{-- Category Datatable --}}
<table id="offers-datatable" class="table table-striped table-hover" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
		<thead>
			<tr>
				<th>Add ID</th>
				<th>Ad Name</th>
				<th>Ad Owner</th>
				{{--
				<th>Add Posting Time</th>
				<th>Add Last Edit Time</th>
				--}}
				<th>Offer Sender</th>
				<th>Offered Price</th>
				<th>Offer Message</th>
				{{--
				<th>Offer Sent Time</th>
				<th>Offer Review Time</th>
				--}}
				<th>Offer Status</th>
				<th>Action</th>
			</tr>
		</thead>
</table>
