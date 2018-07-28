<meta name="datatable_ajax_url" content="{{ URL::route('admin.users_datable') }}">

{{-- Category Datatable --}}
<table id="user-datatable" class="table table-striped table-hover" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
		<thead>
			<tr>
				<th>Full Name</th>
				<th>Cell No.</th>
				<th>Email</th>
				<th>Registration Time</th>
				<th style="width: 70px;">Action</th>
			</tr>
		</thead>
</table>