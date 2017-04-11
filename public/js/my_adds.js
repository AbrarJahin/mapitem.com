$(document).ready(function()
{
	$("#my_adds_image_edit_button").click(function(event)
	{
		$("meta[name='edited_add_id']").attr("content", $("#edit_add_id").val() );
	});

	//Dropzone
	//Dropzone File Upload in post free add modal
		var $editImageDropZone	=	$("div#add_image_edit_div").dropzone(
							{
								url					: $('meta[name=dropped_image_ajax_url]').attr("content"),
								method				: 'POST',
								acceptedFiles		: 'image/*',
								dictDefaultMessage	: 'Drop images here or click here to upload image',	//Default message shown in the drop div
								uploadMultiple		: false,
								//parallelUploads		: 10,									//No of perallel file upload - if uploadMultiple		: true
								paramName			: 'uploaded_image',							//Parameter will be received in Server Side
								headers				: {											//Pass extra variables on the time of processing
															'X-CSRF-TOKEN': $('meta[name=_token]').attr("content")
														},
								enqueueForUpload	: true,
								autoProcessQueue	: true, 								//Will process manually after all done
								maxFilesize			: 10, 									// In MB
								maxFiles			: 10,									//Max upload 10 files
								dictFileTooBig		: 'Bigger than 10 MB image is not allowed',
								addRemoveLinks		: true,									//Enabling remove Link
								dictRemoveFile		: 'Remove This Image',
								dictCancelUpload	: 'Cancel Upload this Image',
								dictInvalidFileType	: 'Only image uploading allowed',
								dictResponseError	: 'Server Error',
								dictFallbackMessage	: 'Your Browser is Not Supported, Please Update Your Browser',
								success: function (file, response)
								{
									var imgName = response;
									file.previewElement.classList.add("dz-success");
									console.log("Successfully uploaded :" + imgName);
								}
							});

		$editImageDropZone[0].dropzone.on('sending', function(file, xhr, formData)	//Sending Extra Parameters
		{
			formData.append('add_id', $('meta[name=edited_add_id]').attr("content"));
		});
});