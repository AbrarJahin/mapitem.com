<div id="pfa" class="modal fade" role="dialog">	{{-- data-backdrop="static" data-keyboard="false" --}} {{-- Can't use this because of using autocomplete of location --}}
	<div class="modal-dialog">
		{{-- Modal content--}}
		<div class="modal-content">
			<div class="modal-header">
				<button onclick="alert('I am an alert box!');" type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Post Free Ad</h4>
			</div>
			<div class="modal-body">
				<div id="rootwizard">
					<ul class="nav nav-tabs nav-tabs-top pf-modal" role="tablist">
						<li class="ta"><a href="#tab1" data-toggle="tab">1. Title - Description</a></li>
						<li class="ta"><a href="#tab2" data-toggle="tab">2. Upload Images</a></li>
						<li class="ta"><a href="#tab3" data-toggle="tab">3. Location</a></li>
					</ul>

					<form role="form" class="tab-content adj1" method="post" action="{{ URL::route('login') }}">
						{{--
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						--}}
						<div id="tab1" class="tab-pane">
							<select class="form-control medium-select" id="sel1">
								<option id="selected">Coumminty</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
							<select class="form-control medium-select" id="sel1">
								<option id="selected">Events</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
							<div class="row">
								<div class="col-lg-8">
									<input type="text" class="form-control normal-input margin-adj" id="adtitle" placeholder="Ad Title">
								</div>
								<div class="col-lg-4">
									<input type="text" class="form-control normal-input margin-adj" id="price" placeholder="Price">  
								</div>
							</div>
							<textarea class="form-control medium-textarea" rows="4" placeholder="Ad Description"></textarea>
						</div>

						<div id="tab2" class="tab-pane">
							<div class="image_upload_div">
								<div id="dropzoneimage" class="dropzone dz-clickable">
									<div class="dz-default dz-message"><span>Drop files here to upload</span></div>
								</div>
							</div>
						</div>

						<div id="tab3" class="tab-pane">
							<input autocomplete="off" type="text" class="form-control normal-input margin-adj" id="find_product_location" placeholder="Ad Address">
							<input type="hidden" id="product_geo_location" name="product_geo_location">
							<div class="map-address"></div>
							<button type="submit" class="green-small2 no-textdecor">Post Free Add</button>
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
			{{--
			<div class="clearfix margin-twenty"></div>
			<div class="modal-footer">
				<!--
				<ul class="nav nav-tabs nav-tabs-bottom pf-modal" role="tablist"XXXX>
					<li class="ta active"><a href="#title" class="bs-overwrite" aria-controls="home" role="tab" data-toggle="tab">Step 1</a></li>
					<li class="ta"><a href="#image" class="bs-overwrite" aria-controls="profile" role="tab" data-toggle="tab">Step 2</a></li>
					<li class="ta"><a class="bs-overwrite" href="#location" aria-controls="profile" role="tab" data-toggle="tab">Step 3</a></li>
				</ul> -->

				<!-- <a href="#" class="grey-small pull-left no-textdecor" >Previous</a>
				<a href="#" class="green-small pull-left no-textdecor">Next</a>
				<a href="#" class="done-small green-small hide pull-left no-textdecor">Done</a> -->

				<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				
			</div>
			--}}
		</div>
	</div>
</div>