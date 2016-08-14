<div class="clearfix"></div>
<div class="hd2"><h2>Community Postings</h2></div>
<!-- community posting start -->
<div class="row">
	@foreach ($advertisements as $advertisement)
		@include('public.index.single_item')
	@endforeach
</div>

<div class="clearfix"></div>

<div class="col-lg-12">
	<div id="show_paginator">
		{{ $advertisements->links() }}
	</div>
	<a href="{{ URL::route('listing') }}">
		<button class="btn green-medium pull-right">
			View More
		</button>
	</a>
</div>

<div class="clearfix"></div>