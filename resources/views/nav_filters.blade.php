<form id="search_add_from" action="{{ URL::route('listing') }}" class="top-search col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-12 no-padding">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding topcat">
		<div class="dropdown no-padding col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
				Category
				<span class="sr-only">Toggle Dropdown</span>
			</button>

			<ul class="dropdown-menu h-ctr h-ctr3">
				@foreach ($categories as $category)
					<li class="no-border">
						<a href="@if($current_page=="listing") # @else {{ URL::route('listing') }}#category_id={{ $category->id }} @endif" class="nav-category" category-id="{{ $category->id }}">
							<h4 class="no-margin">
								{{ $category->name }}
								@if($current_page=="Ad Listing")
									(<span categoryCount="{{ $category->id }}">{{ $category->total_advertisements }}</span>)
								@endif
							</h4>
						</a>
						<ul>
							@foreach($category->subCategory as $sub_cat)
								<li>
									<a href="@if($current_page=="listing") # @else {{ URL::route('listing') }}#sub_category_id={{ $sub_cat->id }} @endif" class="nav-sub-category" sub-category-id="{{ $sub_cat->id }}">
										{{ $sub_cat->name }}
										@if($current_page=="Ad Listing")
											(<span subCategoryCount="{{ $sub_cat->id }}">{{ $sub_cat->total_advertisements }}</span>)
										@endif
									</a>
								</li>
							@endforeach
						</ul>
					</li>
				@endforeach
			</ul>
		</div>

		<div class="no-padding col-lg-7 col-md-7 col-sm-7 col-xs-12">
			<input value="123" type="hidden" id="input_nav_subcategory" name="input_nav_subcategory">
			<meta name="input_nav_search_url" content="{{ isset($input_nav_search_url) ? $input_nav_search_url : URL::route('get_suggestion') }}">
			<input type="text" placeholder="Search" id="input_nav_search" class="ct form-control normal-input pull-left" autocomplete="off">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding topsearch">
		<input type="text" placeholder="Location" id="user_location" class="form-control normal-input">
		<input type="hidden" id="user_location_lat" name="user_location_lat">
		<input type="hidden" id="user_location_lon" name="user_location_lon">

		@if( isset($mapLatMin) && isset($mapLatMax) && isset($mapLonMin) && isset($mapLonMax) )
			<input type="hidden" id="map_lat_min" name="map_lat_min" value="{{ $mapLatMin }}">
			<input type="hidden" id="map_lat_max" name="map_lat_max" value="{{ $mapLatMax }}">
			<input type="hidden" id="map_lon_min" name="map_lon_min" value="{{ $mapLonMin }}">
			<input type="hidden" id="map_lon_max" name="map_lon_max" value="{{ $mapLonMax }}">
		@else
			<input type="hidden" id="map_lat_min" name="map_lat_min" value="-0.1268487">
			<input type="hidden" id="map_lat_max" name="map_lat_max" value="0.1268487">
			<input type="hidden" id="map_lon_min" name="map_lon_min" value="0.143270477">
			<input type="hidden" id="map_lon_max" name="map_lon_max" value="-0.1432704766">
		@endif

		<button class="btn dropdown-toggle" type="submit">
			<span class="fa fa-fw">&#xf002;</span>
		</button>
	</div>

</form>