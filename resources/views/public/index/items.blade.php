
<div class="clearfix"></div>
<div class="hd2"><h2>Community Postings</h2></div>
{{-- community posting start --}}

<meta name="add_wishlist_url" content="{{ URL::route('user.add_wishlist') }}">

<meta name="get_homepage_data" content="{{ URL::route('index_items') }}">

<meta name="filleds_heart_svg" content="{{ URL::asset('svg/filled.svg') }}">

<meta name="hearts_svg" content="{{ URL::asset('svg/normal.svg') }}">

<div class="row" id="home_page_element_container">
	{{-- Fallback Data Loop --}}
	@foreach ($advertisements as $advertisement)
		@include('public.index.single_item')
	@endforeach
</div>

<div class="clearfix"></div>

<div class="col-lg-12">
	{{-- <div id="show_paginator">
		{{ $advertisements->links() }}
	</div> --}}
	<a href="{{ URL::route('listing') }}">
		<button class="btn green-medium pull-right">
			View More
		</button>
	</a>
</div>

<div class="clearfix"></div>