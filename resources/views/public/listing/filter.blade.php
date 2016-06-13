<div class="filter padding-adj1">
	<h4>Filter Your Search Results</h4>
	<a href="#" class="glyphicon glyphicon-minus minimize">&nbsp;</a>
	<form action="#" class="fl" id="map_item_filter">

		<div class="row margin-ten">
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-padding">
				<label>Sort :</label>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-9 col-xs-8 ">
				<select class="form-control" name="sort_disance" id="sort_disance">
					@foreach ($sort_distance_options as $key => $sort)
						<option  value="{{ $key }}">{{ $sort }}</option>
					@endforeach
				</select>
			</div>
{{-- 
			<div class="clearfix visible-xs visible-sm"></div>

			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-padding">
				<label>Within :</label>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-9 col-xs-8">
				<select class="form-control" name="disance_range" id="disance_range">
					@foreach ($distance_range_options as $distance)
						<option  value="{{ $distance }}">{{ $distance }}</option>
					@endforeach
				</select>
			</div>
--}}
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
						<li class="no-border">
							<label class="pull-left">
								<input type="checkbox" name="category[]" category_id={{ $category->id }} checked value="{{ $category->id }}">
								<strong> {{ $category->name }} (21)</strong>
							</label>
							<ul>
								@foreach($category->subCategory as $sub_cat)
									<li>
										<label class="pull-left">
											<input name="sub_category[]" category_id={{ $category->id }} sub_category_id={{ $sub_cat->id }} type="checkbox" checked value="{{ $sub_cat->id }}"> {{ $sub_cat->name }} (7)
										</label>
									</li>
								@endforeach
							</ul>
						</li>
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
