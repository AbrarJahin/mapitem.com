<div class="results">
	<div class="r-hdr col-lg-12">
		<h6 class="pull-left">Found (12) Records</h6>
		<div class="pull-right">
			<a href="#" title="box" class="blocks fa fa-fw pos-adj6 grid selected-view">&#xf00a;</a>
			<a href="#" title="list" class="list fa fa-fw pos-adj7">&#xf0ca;</a>
		</div>
	</div>
	<div class="clearfix"></div>
	<div id="box" class="box-posting">
		{{-- community posting start --}}
		@for ($i = 0; $i < 12; $i++)
		 	@include('public.listing.single_item')
		@endfor
	</div>
</div>

{{-- Paginator Settings --}}
<meta name="total_no_of_pages"	content="153">
<meta name="current_page_no"	content="2">
<meta name="max_visible"		content="10">

<div id="show_paginator"></div>