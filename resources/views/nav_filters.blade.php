<form action="#" class="top-search col-lg-offset-1 col-md-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-12 no-padding">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding topcat">
		<div class="dropdown no-padding ">
			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
				Category
				<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu h-ctr h-ctr3">
				@foreach ($categories as $category)
					<li class="no-border">
						<h4 class="no-margin">{{ $category->name }}</h4>
						<ul>
							@foreach($category->subCategory as $sub_cat)
								<li>
									<a href="#{{ $sub_cat->id }}">{{ $sub_cat->name }}</a>
								</li>
							@endforeach
						</ul>
					</li>
				@endforeach
			</ul>
		</div>
		<input type="text" placeholder="Search" id="input_nav_search" class="ct form-control normal-input pull-left">
		<div class="ct-list ct-list2" style="display: none;">
			<ul id="search_hint">
				<li><a href="#">This is one</a></li>
				<li><a href="#">This is two</a></li>
			</ul> 
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding topsearch">
		<input type="text" placeholder="Location" id="user_location" class="form-control normal-input">
		<button class="btn dropdown-toggle" type="button"><span class="fa fa-fw">&#xf002;</span></button>
	</div>

</form>