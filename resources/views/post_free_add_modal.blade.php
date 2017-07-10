@if (Auth::check())
	<meta name="ridirect_url_after_successful_post" content="{{ URL::route('user.my_adds') }}">
	<div id="pfa" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			{{-- Modal content--}}
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Post Free Ad</h4>
				</div>
				<div class="modal-body">
					<div id="rootwizard">
						<ul class="nav nav-tabs nav-tabs-top pf-modal" role="tablist">
							<li class="ta"><a href="#tab1" data-toggle="tab">1. Title - Description</a></li>
							<li class="ta"><a href="#tab2" data-toggle="tab">2. Upload Images</a></li>
							<li class="ta"><a href="#tab3" data-toggle="tab">3. Location</a></li>
						</ul>

						<form id="post_free_add_form" role="form" class="tab-content adj1" method="post" action="{{ URL::route('user.post_add') }}">
							<div id="tab1" class="tab-pane">
								<div>
									<select name="category_id" class="form-control medium-select" id="category_select">
										<option value='0'>Please Select a Category</option>
										@foreach ($categories as $data)
											<option value="{{ $data->id }}">{{ $data->name }}</option>
										@endforeach
									</select>
								</div>

								<meta name="sub_category_ajax_url" content="{{ URL::route('find_subcategory') }}" />

								<div>
									<select name="sub_category_id" class="form-control medium-select" id="sub_category_select">
										<option value='0'>Please Select Category First</option>
									</select>
								</div>

								<div class="row">
									<div class="col-lg-8">
										<input name="title" type="text" class="form-control normal-input margin-adj" id="adtitle" placeholder="Ad. Title">
									</div>
									<div class="col-lg-4">
										<input name="price" type="text" class="form-control normal-input margin-adj" id="price" placeholder="Price">  
									</div>
								</div>

								<div>
									<textarea id="description" name="description" class="form-control medium-textarea" rows="4" placeholder="Ad. Description"></textarea>
								</div>

							</div>

							<div id="tab2" class="tab-pane">
								<meta name="dropped_image_ajax_url" content="{{ URL::route('user.advertisement_images') }}">
								<meta name="uploaded_add_id">
								<div class="dropzone dropzone-previews" id="drag_drop_image_upload_div"></div>
							</div>

							<div id="tab3" class="tab-pane">
								{{-- Zoom in and drag and drop pointer on map for getting more accurate location --}}
								<input name="address" autocomplete="off" type="text" class="form-control normal-input margin-adj" id="find_product_location" placeholder="Ad. Address">
								<input type="hidden" id="product_location_lat" name="product_geo_location_lat">
								<input type="hidden" id="product_location_lon" name="product_geo_location_lon">
								<div class="map-address"></div>
								<button type="submit" class="green-small2 no-textdecor">Post Free Ad.</button>
							</div>

						</form>

						<ul class="pager wizard">
							<li class="previous first" style="display:none;"><a href="#">First</a></li>
							<li class="previous"><a href="#">Previous</a></li>
							<li class="next last" style="display:none;"><a href="#">Last</a></li>
							<li class="next"><a href="#">Next</a></li>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>
@endif

<div id="wait">
	<img id="wait_image" src="{{ URL::asset('images/content_loader.gif') }}"/>
</div>