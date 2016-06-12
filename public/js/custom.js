//Global variables
var latitude=0, longitude=0;
var is_tab_opened_before =0;

//Global Congig
Dropzone.autoDiscover = false;		//Make dropzone accessable with forms elements for all dropzone

//Email Validate
function validateEmail(email)
{
	var re = /\S+@\S+\.\S+/;
	return re.test(email);
}

//Taking bootstrap modal to the center of the page
function centerModal()
{
	$(this).css('display', 'block');
	var $dialog  = $(this).find(".modal-dialog"),
	offset       = ($(window).height() - $dialog.height()) / 2,
	bottomMargin = parseInt($dialog.css('marginBottom'), 10);

	// Make sure you don't hide the top part of the modal w/ a negative margin if it's longer than the screen height, and keep the margin equal to the bottom margin of the modal
	if(offset < bottomMargin) offset = bottomMargin;
	$dialog.css("margin-top", offset);
}

//Get user's geo location
function getLocation()
{
	if(latitude===0 && longitude===0)		//not called before in the page
	{
		$.get("http://ipinfo.io", function (response)
		{
			var temp		= response.loc.split(",");
			latitude		= parseFloat(temp[0]);
			longitude		= parseFloat(temp[1]);
			//Input User Location in input
			$('#user_location').val(latitude+','+longitude);
			//Set Map Center to Current User Location
			var $mapDiv = $('#map');
			if ( $mapDiv.length)
			{
				$mapDiv.gmap3('get').setCenter(new google.maps.LatLng(latitude,longitude));
			}
		}, "jsonp");
	}
}

$(document).ready(function()
{
	//Create Custom Search Form submit to show pretty URL
	$("#search_add_from").submit(function(e)
	{
		e.preventDefault();
		if( $('#input_nav_search').val().trim().length<1 )
		{
			$('#input_nav_search').parent().addClass("has-error");
			return 0;
		}
		else
		{
			$('#input_nav_search').parent().removeClass("has-error");
		}
		var lat_input,lon_input;
		try
		{
			var lat_lon_parsed_data = $('#user_location').val().split(',');
			lat_input = parseFloat( lat_lon_parsed_data[0] );
			lon_input = parseFloat( lat_lon_parsed_data[1] );
			if(	isNaN(lat_input)	||	isNaN(lon_input)	)
			{
				$('#user_location').parent().addClass("has-error");
				return 0;
			}
			else			//Everything OK
			{
				var redirect_url	=	$('meta[name=base_url]').attr("content")
										+	'/listing/'
										+	$('#input_nav_subcategory').val()
										+	'/'
										+	lat_input
										+	'/'
										+	lon_input
										+	'/'
										+	$('#input_nav_search').val().trim();
				//window.location.replace(redirect_url);		//Remove History
				window.location.href	=	redirect_url;		//Keep history
			}
		}
		catch(err)
		{
			console.log('could not perse invalid data');
			$('#user_location').parent().addClass("has-error");
				return 0;
		}
	});

	//Making Bootstrap Modal centerize - Start
		$(document).on('show.bs.modal', '.modal', centerModal);
		$(window).on("resize", function (){ $('.modal:visible').each(centerModal); });
	//Making Bootstrap Modal centerize - End

	//Free add posting - tab 3 - Map - Start
		getLocation();
		$("#find_product_location").geocomplete(
		{
			map			: ".map-address",
			mapOptions	:
			{
				mapTypeId	: 'roadmap',		//roadmap, satellite,hybrid, terrain,
				scrollwheel	: true,
				zoom		: 8,
				//center		: new google.maps.LatLng( latitude, longitude ),
			},
			markerOptions:
			{
				draggable: true
			},
		})
		.bind("geocode:result", function(event, result)
			{	//Type Helper
				$('#product_location_lat').val( result.geometry.location.lat() );
				$('#product_location_lon').val( result.geometry.location.lng() );
			})
		.bind("geocode:dragged", function(event, latLng)
			{	//Dragging
				$('#find_product_location').val( $("#find_product_location").geocomplete( "find", latLng.lat() + "," + latLng.lng() ) );
				$('#product_location_lat').val( latLng.lat() );
				$('#product_location_lon').val( latLng.lng() );
			});

		//Reload Map after it is shown
		$('#pfa').on('shown.bs.tab', 'a[data-toggle="tab"]', function (e)
		{
			google.maps.event.trigger(
										$("#find_product_location").geocomplete("map"),
										'resize'
									);
			if(++is_tab_opened_before<3)		//No 1 load for page loading and no2 is for first time appear
			{
				//$("#find_product_location").geocomplete("find", $("#find_product_location").geocomplete( "find", latitude + "," + longitude ));

				var map = $("#find_product_location").geocomplete("map");
				map.setCenter( new google.maps.LatLng( latitude, longitude ) );
			}
		});
	//Free add posting - tab 3 - Map - End

	/* Submit button pressed - Login */
	$("#login-f").submit(function()
	{
		var isValidated = true;
		$("#login_submit").button('loading');		//Change button state to loggin in
		//Checking input for validation

		//email field
		if( !validateEmail( $('#login-email').val() ) )
		{
			isValidated = false;
			$('#login-email-div').addClass('has-error');
		}
		else
		{
			$('#login-email-div').removeClass('has-error');
		}

		//Password Field
		if( $('#login-password').val().length == 0 )
		{
			isValidated = false;
			$('#login-password-div').addClass('has-error');
		}
		else
		{
			$('#login-password-div').removeClass('has-error');
		}

		//Making AJAX check
		if(isValidated)
		{
			var responce = $.ajax(
									{
										headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
										method: "POST",
										url: $(this).attr('action'),
										dataType: "json",
										async: false,
										data: $("#login-f").serialize(),
									}).responseText;

			$.each($.parseJSON(responce),function(key,value)
			{
				if(key.localeCompare('status')==0)
				{
					if(value=='0')
					{
						console.log("Not Signed In");
					}
					else
					{
						console.log("Signed In Successfully");
						location.reload();
					}
				}
				if(key.localeCompare('message')==0)
				{
					$("#login_error_message").html(value);
				}
			});
		}
		$("#login_submit").button('reset');		//Reset button state
		return false;	//Form not submitted
	});

	/* Submit button pressed - Sign-up */
	$("#sign-up-f").submit(function()
	{
		var isValidated = true;
		$("#sign_up_submit").button('loading');		//Change button state to Signing Up
		//Checking input for validation

		//First Name
		if( $('#signup-first_name').val().length < 2 )
		{
			isValidated = false;
			$('#signup-first_name-div').addClass('has-error');
		}
		else
		{
			$('#signup-first_name-div').removeClass('has-error');
		}

		//Last Name
		if( $('#signup-last_name').val().length < 2 )
		{
			isValidated = false;
			$('#signup-last_name-div').addClass('has-error');
		}
		else
		{
			$('#signup-last_name-div').removeClass('has-error');
		}

		//email field
		if( !validateEmail( $('#signup-email').val() ) )
		{
			isValidated = false;
			$('#signup-email-div').addClass('has-error');
		}
		else
		{
			$('#signup-email-div').removeClass('has-error');
		}

		//Password Field
		if( $('#signup-password').val().length == 0 )
		{
			isValidated = false;
			$('#signup-password-div').addClass('has-error');
		}
		else
		{
			$('#signup-password-div').removeClass('has-error');
		}

		//Making AJAX check
		if(isValidated)
		{
			var responce = $.ajax(
									{
										headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
										method: "POST",
										url: $(this).attr('action'),
										dataType: "json",
										async: false,
										data: $("#sign-up-f").serialize(),
										/*{
											uuid	:	$('meta[name=_token]').attr("content"),
											user_id	:	3
										},*/
									}).responseText;

			$.each($.parseJSON(responce),function(key,value)
			{
				if(key.localeCompare('status')==0)
				{
					if(value=='0')
					{
						console.log("Sign Up Failed");
					}
					else
					{
						console.log("Signed Up Successfully");
						location.reload();
					}
				}

				if(key.localeCompare('messages')==0)
				{
					$("#sign_up_error_message").html("Given e-mail already in use !");
					console.log(value);
				}
			});
		}
		$("#sign_up_submit").button('reset');		//Reset button state
		return false;	//Form not submitted
	});

	//Add free post - category select AJAX call on sub-category
	$("#category_select").change(function()
	{
		$("#category_select		option[value='0']").remove();	//Removing the dummy elements
		$('#sub_category_select').empty();						//Cleaning terget select

		var responce = $.ajax(
								{
									headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
									method: "POST",
									url: $('meta[name=sub_category_ajax_url]').attr("content"),
									dataType: "json",
									async: false,
									data:
									{
										category_id	:	$( "#category_select" ).val()
									},
								}).responseText;

		$.each($.parseJSON(responce),function(key,data)
		{
			var last_id;
			$.each(data,function(id,value)
			{
				if(id.localeCompare('id')==0)
				{
					last_id=value;
				}
				else
				{
					$('#sub_category_select').append($('<option>',
					{
						value	: last_id,
						text	: value
					}));
				}
			});
		});
	});

	//Free Add Posting - Start
		//Dropzone File Upload in post free add modal
		var $myDropZone	=	$("div#drag_drop_image_upload_div").dropzone(
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
								autoProcessQueue	: false, 								//Will process manually after all done
								maxFilesize			: 5, 									// In MB
								maxFiles			: 10,									//Max upload 10 files
								dictFileTooBig		: 'Bigger than 5 MB image is not allowed',
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

		$myDropZone[0].dropzone.on('sending', function(file, xhr, formData)	//Sending Extra Parameters
		{
			formData.append('add_id', $('meta[name=uploaded_add_id]').attr("content"));
		});

		$myDropZone[0].dropzone.on('processing', function()					//Process all data after click one
		{
			this.options.autoProcessQueue = true;
		});

		$myDropZone[0].dropzone.on('queuecomplete', function()				//Reset the status
		{
			this.options.autoProcessQueue = false;
		});

		$myDropZone[0].dropzone.on("complete", function (file)
		{
			if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0)	//All Upload Done
			{
				//alert('Your action, Refresh your page here. ');
				//location.reload();
				window.location.replace($("meta[name='ridirect_url_after_successful_post']").attr("content"));
			}
		});

		//Submitting the free add posting form with AJAX
		$("#post_free_add_form").submit(function(e)
		{
			e.preventDefault(e);

			var responce = $.ajax(
									{
										headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
										method: "POST",
										url: $(this).attr('action'),
										dataType: "json",
										async: false,
										data: $("#post_free_add_form").serialize(),
										/*{
											uuid	:	$('meta[name=_token]').attr("content"),
											user_id	:	3
										},*/
									}).responseText;

			console.log(responce);

			$('meta[name=uploaded_add_id]').attr('content', responce);		//Setting from AJAX responce

			    //Process of upload should start after successfull advertisement upload - Will do later

			$myDropZone[0].dropzone.processQueue();								//Uploading files
		});
	//Free Add Posting  - End

	//Listing Page - Start
		//Open add
		$('.showonmap9').click(function()
		{
			$('.ad-detail').show("slow");
			$('.ad-listing').hide("slow");
			$('.close-detail').toggleClass("show");
			//alert("I am an alert box!");
		});

		//Close add
		$('.close-detail').click(function()
		{
			$('.ad-detail').hide("slow");
			$('.close-detail').toggleClass("show");
			$('.ad-listing').show("slow");
			//alert("I am an alert box!");
		});
	//Listing Page - End

	/*review box open*/
	$('.review').on('click',function()
	{
		$('.write-review').toggleClass('show');
		$('.write-review').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
															function()
															{
																$(this).removeClass('animated fadeIn');
															});
	});

	$('.loginbtn').on('click',function()
	{
		$('.loginpopup').addClass('animated pulse').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
														function()
														{
															$(this).removeClass('animated pulse');
														});
	});

	/*button animation*/
	$('.accept-offer').on('click',function()
	{
		$('.location').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
														function()
														{
															$(this).removeClass('animated fadeIn');
														});
		$(this).closest('.accept-offer').toggleClass('hide');
	});

	/*button animation*/

	$('.grey-small').on('click',function()
	{
		$('.title').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
		function()
													{
														$(this).removeClass('animated fadeIn');
													});
		$(this).prev().toggleClass('hide');
	});

	$('.carousel').carousel({
								interval: 5000 //changes the speed
							});

	$(".sup").click(function()
	{
		$("#dt").toggleClass('open');
		$("#su").toggleClass('open');
	});

	$(".si").click(function()
	{
		$("#su").toggleClass('open');
		$("#dt").toggleClass('open');
	});

	$(".offer-si").click(function()
	{
		$("#dt").addClass('open');
		$("#su").removeClass('open', 'collapsed');
	});

	$(".offer-su").click(function()
	{
		$("#su").addClass('open');
		$("#dt").removeClass('open');
	});

	//to use modal in a dropdown
	$('.dropdown-menu').click(function(e)
	{
		e.stopPropagation();
		if ($(e.target).is('[data-toggle=modal]'))
		{
			$($(e.target).data('target')).modal()
		}
	});

	//to close modal on btn click
	$('.si').click(function()
	{
		$('#sgn-pup').modal('hide');
	});

	//to close modal on btn click
	$('.sup').click(function()
	{
		$('#lgn-pup').modal('hide');
	});

	$("input.ct").focus(function()
	{
		$("div.ct-list").fadeIn("");
	});

	$("input.ct").focusout(function()
	{
		$("div.ct-list").fadeOut("");
	});

	/*inbox page*/ 
	$(".hd-detail").hide();
	$(".glyphicon-circle-arrow-up").hide();
	$(".hd, .inbox-short").click(function()
	{
		$(this).next(".hd-detail").slideToggle(500);
		$(this).find(".glyphicon-circle-arrow-up, .glyphicon-circle-arrow-down").toggle();
	});

	/*Avoide scroll up on clicking*/
	$('a.mhd, a.relist, a.edit1').click(function(e)
	{
		e.preventDefault();
	});

	/*My Ads page*/
	$('.edit1').on('click',function()
	{
		$(".db-body").toggleClass('edit-on')
	});

	$('.save').on('click',function()
	{
		$(".db-body").toggleClass('edit-on')
	});

	$('.relist').on('click', function()
	{
		$(this).closest('.inative-list').fadeOut("slow");
	});

	/*Profile page*/
	$(".pdisplay").click(function()
	{
		$(this).parent().next().removeClass("edit-on");
		$(this).parent().addClass("edit-on");
	});

	$(".pedit").click(function()
	{
		$(this).parent().prev().removeClass("edit-on");
		$(this).parent().addClass("edit-on");
	});

	$('[data-toggle="tooltip"]').tooltip(); 

	$(".ad-detail").hide();    

	/*Post free ad modal - location tab checkbox*/    
	$(".loc-info-edit").hide();
	$('#infocheckbox').click(function()
	{
		if( $(this).is(':checked'))
		{
			$(".loc-info").hide();
			$(".loc-info-edit").show();
		}
		else
		{
			$(".loc-info-edit").hide();
			$(".loc-info").show();
		}
	});

	/*review box close*/

	$('.review-submit').on('click',function()
	{
		$('.write-review').toggleClass('show');
		$('.write-review').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
														function()
														{
															$(this).removeClass('animated fadeIn ');
														});
	});
	$('#rootwizard').bootstrapWizard();
	window.prettyPrint && prettyPrint();
});

/*===========================================================================================================================================*/
/*===========================================================================================================================================*/
/*===========================================================================================================================================*/

/*Minimize Search filter*/
$('.minimize').click(function()
{
	$('.fl').slideToggle();
});

/*Hide Add Detail*/
$('.fp').click(function()
{
	$('.for-pass').slideDown("slow");
});

$('.closefp').click(function()
{
	$('.for-pass').slideUp("slow");
});

$("a.close-detail").click(function(event)
{
	event.preventDefault();
});

$('.p-min').click(function()
{
	$(this).parent().next('.p-bottom').slideToggle();
	$(".zindex").removeClass("zindex");
	$(this).parent().parent().parent().toggleClass('zindex');
});

$('.p-close').click(function()
{
	$(this).closest('.triangle-isosceles').fadeOut();
});

/*Show ads on map static code*/

$('.showonmap9').hover(function()
{
	$( ".listing-left" ).find(".show9").slideToggle();
	$( ".listing-left" ).find(".pos-adj9").toggleClass('zup');
});

$('.showonmap10').hover(function()
{
	$( ".listing-left" ).find(".show10").slideToggle();
	$( ".listing-left" ).find(".pos-adj10").toggleClass('zup');
});

$('.showonmap10').click(function()
{
	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').toggleClass("show");
});

$('.showonmap11').hover(function()
{
	$( ".listing-left" ).find(".show11").slideToggle();
	$( ".listing-left" ).find(".pos-adj11").toggleClass('zup');
});

$('.showonmap11').click(function()
{
	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').toggleClass("show");
});

$('.showonmap12').hover(function()
{
	$( ".listing-left" ).find(".show12").slideToggle();
	$( ".listing-left" ).find(".pos-adj12").toggleClass('zup');
});

$('.showonmap12').click(function()
{
	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').toggleClass("show");
});

$('.showonmap13').hover(function()
{
	$( ".listing-left" ).find(".show13").slideToggle();
	$( ".listing-left" ).find(".pos-adj13").toggleClass('zup');
});

$('.showonmap13').click(function()
{
	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').toggleClass("show");
});

$('.showonmap14').hover(function()
{
	$( ".listing-left" ).find(".show14").slideToggle();
	$( ".listing-left" ).find(".pos-adj14").toggleClass('zup');
});

$('.showonmap14').click(function()
{
	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').toggleClass("show");
});

/*List View and Box View toggle*/
$('.list').click(function()
{
	$(this).addClass("disabled selected-view");
	$(this).prev().removeClass("disabled selected-view");
	$('.box-posting').children().removeClass("col-lg-4 col-sm-6");
	$('.box-posting').addClass('list-view');
});

$('.grid').click(function()
{
	$(this).addClass("disabled selected-view");
	$(this).next().removeClass("disabled selected-view");
	$('.box-posting').children().addClass("col-lg-4 col-sm-6");
	$('.box-posting').removeClass('list-view');
});

$('.nav-tabs-top a[data-toggle="tab"]').on('click', function()
{
	$('.nav-tabs-bottom li.active').removeClass('active')
	$('.nav-tabs-bottom a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
});

$('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function()
{
	$('.nav-tabs-top li.active').removeClass('active')
	$('.nav-tabs-top a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
});