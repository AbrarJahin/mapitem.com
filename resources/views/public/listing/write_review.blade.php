<a class="review" href="#">Write Review</a>
<div class="write-review hide">
	<form id="write_review" class="offer" method="post" action="{{ URL::route('user.write_review') }}">
		<div class="form-group">
			<textarea name="review" class="form-control tarea" placeholder="Write your Reviews" rows="3"></textarea>

			<div class="col-lg-12 margin-top-twenty margin-bottom-twenty">
				<span class="pull-left margin-right-twenty">Please rate your experience</span>
				<input type="number" class="rating" name="rating" data-min="1" data-max="5" value="0">
				<input type="hidden" name="add_id">
				<input type="hidden" name="add_owner_id">
			</div>
		</div>
		<button type="submit" class="btn btn-default green-small review-submit show">Post Your Review</button>
	</form>
</div>