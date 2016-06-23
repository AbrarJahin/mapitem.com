<div class="results">
	<div class="r-hdr col-lg-12">
		<h6 class="pull-left">Found (<span id='total_match_found'>12</span>) Records</h6>
		<div class="pull-right">
			<a href="#" title="box" class="blocks fa fa-fw pos-adj6 grid selected-view">&#xf00a;</a>
			<a href="#" title="list" class="list fa fa-fw pos-adj7">&#xf0ca;</a>
		</div>
	</div>
	<div class="clearfix"></div>
	{{-- community posting start --}}
	<div id="box" class="box-posting">
{{--
		@for ($i = 0; $i < 12; $i++)
		 	@include('public.listing.single_item')
		@endfor
--}}
	</div>
</div>

{{-- Paginator Settings --}}
{{-- Paginator Settings --}}
<meta name="total_no_of_pages"	content="13">	{{-- Total no of pages in paginator --}}
<meta name="current_page_no"	content="2">	{{-- Current active page - default value = 1 --}}
<meta name="content_per_page"	content="3">	{{-- No of elements per paginated page --}}
<meta name="max_visible"		content="10">	{{-- Max no of paginator elements per page --}}

<meta name="svg_hearts"			content="{{ URL::asset('svg/normal.svg') }}">
<meta name="info_window_img"	content="{{ URL::asset('images/sb-i.jpg') }}">

<div id="show_paginator"></div>