<div class="filter padding-adj1">
	<h4>Filter Your Search Results</h4>
	<a href="#" class="glyphicon glyphicon-minus minimize">&nbsp;</a>

	<form action="#" class="fl" id="map_item_filter">

		<div class="row margin-ten">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-padding">
				<label>Sort :</label>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-9 col-xs-8 ">
				<select class="form-control" name="sort_ordering" id="sort_ordering">
					@foreach ($sort_distance_options as $key => $sort)
						<option  value="{{ $key }}">{{ $sort }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row margin-ten">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-padding">
				<label>Categories :</label>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-9 col-xs-8">

				<button aria-expanded="false" aria-haspopup="false" data-toggle="dropdown" class="btn l-cat-btn dropdown-toggle" type="button">Category Filter<i class="glyphicon glyphicon-menu-down arrow-adj"></i></button>

				<ul class="dropdown-menu h-ctr h-ctr2 col-md-12 col-sm-12" id="category_filter">
					@foreach ($categories as $category)
						@if ($category->total_advertisements > 0)
							<li class="no-border">
								<label class="pull-left">
									<input type="checkbox" name="category[]" category_id={{ $category->id }} sub_category_id="not_available" checked value="{{ $category->id }}">
									<strong>
										{{ $category->name }}
										{{--
										(<span id="category_{{ $category->id }}">{{ $category->total_advertisements }}</span>)
										--}}
										(<span id="category_{{ $category->id }}">0</span>)
									</strong>
								</label>
								<ul>
									@foreach($category->subCategory as $sub_cat)
										@if ($sub_cat->total_advertisements > 0)
											<li>
												<label class="pull-left">
													<input name="sub_category[]" category_id={{ $category->id }} sub_category_id={{ $sub_cat->id }} type="checkbox" checked value="{{ $sub_cat->id }}">
													{{ $sub_cat->name }}
													{{--
													(<span id="sub_category_{{ $sub_cat->id }}">{{ $sub_cat->total_advertisements }}</span>)
													--}}
													(<span id="sub_category_{{ $sub_cat->id }}">0</span>)
												</label>
											</li>
										@endif
									@endforeach
								</ul>
							</li>
						@endif
					@endforeach
				</ul>

			</div>

		</div>

		<div class="row margin-ten">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-padding">
				<label>Price Range :</label>
			</div>
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-8 height-adj">
				<input type="hidden" name="price_range" id="price_range" class="slider-input range-slider" value="0,1000" />
			</div>
		</div>
	</form>

</div>