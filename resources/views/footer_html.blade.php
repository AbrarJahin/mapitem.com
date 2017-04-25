<footer id="page_footer">
	<div class="first-strip">
		<div class="@if ($current_page === 'Add Listing')
				container-fluid
				@else
				container
				@endif">
			@php ($i = 0)
			@foreach ($public_pages as $page)
				@if($i>0)
					|
				@endif
				<a href="{{ strpos($page->url, '/') !== false ? $page->url : route('public_page', ['url' => $page->url]) }}">{{ $page->small_title }}</a>
				@php ($i++) 
			@endforeach
		</div>
	</div>
	<div class="second-strip">
		<div class="container">

			<div class="@if ($current_page === 'Add Listing')
						hidden-lg hidden-md-1 hidden-sm hidden-xs
						@else
						col-lg-3 col-md-3 hidden-sm hidden-xs
						@endif"></div>

			<div class="col-lg-3 col-md-3
						@if ($current_page === 'Add Listing')
						col-sm-3
						@else
						col-sm-6
						@endif
						col-xs-12">

			@if (!Auth::check())
				<button data-target="#lgn-pup" data-toggle="modal" class="btn adj  green-large adj12" type="submit">Post Free Ad</button>
			@elseif (Auth::user()->user_type == "normal_user")
				<button data-target="#pfa" data-toggle="modal" class="btn adj  green-large adj12" type="submit">Post Free Ad</button>
			@endif

			</div>

			<div class="col-lg-3 col-md-3
						@if ($current_page === 'Add Listing')
						col-sm-4
						@else
						col-sm-6
						@endif
						col-xs-12">

				<a class="round fa fa-fw" href="#"></a>

				<a class="round fa fa-fw" href="#"></a>

				<a class="round fa fa-fw" href="#"></a>

			</div>

			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
		</div>
	</div>
	<div class="third-strip">
		<div class="@if ($current_page === 'Add Listing')
				container-fluid
				@else
				container
				@endif">
			© Copyright Mapitems {{ date("Y") }}
		</div>
	</div> 
</footer>