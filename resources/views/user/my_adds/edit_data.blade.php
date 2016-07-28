<form class="col-lg-9 col-md-9 col-sm-7 dleft" action="{{ URL::route('user.update_add') }}" id="edit_add_detail">
	<h3>
		<div class="form-group">
			<input type="text" name="title" placeholder="Title of the Advertisement" id="edit_add_title" class="form-control normal-input small-input">
		</div>
	</h3>
	<div class="pull-right">
		<span class="lh-adj">Price : </span>
		<span class="p-edit">
			<div>
				<input type="number" name="price" id="edit_add_price" placeholder="Price (in USD)" class="form-control normal-input smaller-input">
			</div>
		</span>  
	</div>

	<div class="clearfix"></div>

	<p>
		<textarea name="description" id="edit_add_description" class="form-control" rows="5" placeholder="Description"></textarea>
	</p>

	<input name="address" id="edit_add_address" type="text" placeholder="Please enter your address here" class="form-control normal-input small-input margin-adj3">

	<input type="hidden" id="edit_add_location_lat" name="location_lat">

	<input type="hidden" id="edit_add_location_lon" name="location_lon">

	<a class="green-small pull-right save no-textdecor" id="edit_add_submit" href="#">Save</a>
</form>