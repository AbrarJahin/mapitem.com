<meta name="datatable_ajax_url" content="{{ URL::route('admin.public_pages_datable') }}">

{{-- Category Datatable --}}
<table id="public-pages-datatable" class="table table-striped table-hover" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
		<thead>
			<tr>
				<th>Is Enabled</th>
				<th>Show Order</th>
				<th>Url</th>
				<th>Small Title</th>
				<th>Big Title</th>
				<th style="width: 70px;">Action</th>
			</tr>
		</thead>
</table>
