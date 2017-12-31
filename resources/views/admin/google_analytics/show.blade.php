<meta name="show_ajax_url" content="{{ URL::route('admin.google_analytics_view') }}">
{{-- Google Analyts table --}}
<table class="table table-striped table-hover dataTable no-footer" cellpadding="0" cellspacing="0" border="0" width="100%" role="grid" aria-describedby="public-pages-datatable_info" style="width: 100%;">
	<thead>
		<tr role="row">
			<th rowspan="1" colspan="1">Is Enabled</th>
			<th class="sorting_asc" rowspan="1" colspan="1">Route Name</th>
			<th rowspan="1" colspan="1">Url</th>
			<th rowspan="1" colspan="1">Details</th>
			<th rowspan="1" colspan="1">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($google_analytic as $analytic)
			<tr role="row" class="odd">
				<td>	{{ $analytic->is_enabled }}	</td>
				<td>	{{ $analytic->route_name }}	</td>
				<td>	{{ $analytic->url }}		</td>
				<td>	{{ $analytic->detail }}		</td>
				<td id="{{ $analytic->id }}">
					<button type="button" class="edit btn btn-warning btn-sm analytics_update">
						<span class="glyphicon glyphicon-edit"></span>
					</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
