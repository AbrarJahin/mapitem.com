<div class="col-lg-3 col-md-3 col-sm-5 no-padding">
	<img src="images/db-img1.jpg" id="add_title_image" class="pic-adj img-responsive"><br>
	<button type="button" class="btn btn-default green-small3" data-toggle="modal" data-target="#newpicture">
		Edit images
	</button>
	 <!-- Modal -->
	  <div class="modal fade" id="newpicture" role="dialog">
		<div class="modal-dialog">
		
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Edit images</h4>
			</div>
			<div class="modal-body">
			  <form action="/upload-target" class="dropzone"></form>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		
		</div>
	  </div>
</div>