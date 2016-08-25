//Global variables
var latitude=0, longitude=0;
var is_tab_opened_before =0;
//var debug_variable;
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
	var location = {};
	if(latitude===0 && longitude===0)		//not called before in the page
	{
		$.get("http://ipinfo.io", function (response)
		{
			//Input User Location in input
			$('#user_location').val( response.city /*+', '+response.country*/ );
			var temp		= response.loc.split(",");
			latitude		= parseFloat(temp[0]);
			longitude		= parseFloat(temp[1]);
			$('#user_location_lat').val(latitude);
			$('#user_location_lon').val(longitude);
			//Set Map Center to Current User Location
			var $mapDiv = $('#map');
			if ($mapDiv.length)
			{
				$mapDiv.gmap3('get').setCenter(new google.maps.LatLng(latitude,longitude));
			}
			//Home Page Element Loading according to current ocation
			var element_container = $('#home_page_element_container');
			if (element_container.length)
			{
				var half_redious = 50/2/111.23;
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $('meta[name=get_homepage_data]').attr("content"),
					dataType: "json",
					data:
					{
						lat_min	:	latitude-half_redious,
						lat_max	:	latitude+half_redious,
						lon_min	:	longitude-half_redious,
						lon_max	:	longitude+half_redious
					},
					success:function(responce_data)
					{
						var hearts_svg		=	$('meta[name="hearts_svg"]').attr('content');
						var upload_folder	=	$('meta[name="upload_folder_url"]').attr('content');
						element_container.empty();
						//console.log(responce_data);
						$.each(responce_data,function(key_index,single_data)
						{
							var data_to_append	=	'<div class="col-lg-3 col-md-3 col-sm-6">'
														+'<a href="#" class="wsh-lst2">'
															+'<object type="image/svg+xml" data="'+hearts_svg+'"></object>'
														+'</a>'
														+'<div class="box">'
															+'<div class="img-box">'
																+'<img src="'+upload_folder+single_data.advertisement_image+'" height="226" width="314" alt="'+single_data.description+'">'
															+'</div>'
															+'<div class="box-content">'
																+'<h5>'+single_data.title+'</h5>'
																+'<h6>$'+single_data.price+'</h6>'
																+'<div class="clearfix margin-bottom-ten"></div>'
																+'<img src="'+upload_folder+single_data.user_image+'" class="pull-left width-adj2" height="46" width="46">'
																+'<div class="pull-left margin-left-ten width-adj3">'
																	+'<p class="pull-left dot1 home_page_description">'
																		+single_data.description
																	+'</p>'
																+'</div>'
															+'</div>'
														+'</div>'
													+'</div>';
							element_container.append(data_to_append);
						});
					}
				});
			}
		}, "jsonp");
	}
	location.latitude	=	latitude;
	location.longitude	=	longitude;
	return location;
}

function getCurrentDate()
{
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	if(dd<10)
	{
		dd='0'+dd
	}
	if(mm<10)
	{
		mm='0'+mm
	}
	today = mm+'/'+dd+'/'+yyyy;
	return today;
}

function AddNewData()
{
	$('#add_data_modal').modal('show');
}

function showMessageDetail()
{
	if(window.matchMedia( "(max-width: 768px)" ).matches)
	{
		$('#message_details').hide();
		//$('#message_menu_close_button').show();
	}
	else
	{
		$('#message_threades').show();
		$('#message_details').show();
		$('#message_menu_close_button').hide();
	}
}

$(window).resize(function()
{
	if(!(window.matchMedia( "(max-width: 768px)" ).matches))
	{
		//alert("Show Message Detail called on resize");
		showMessageDetail();
	}
});

$(document).ready(function()
{
	if($("#date_of_birth").length != 0)	//If datepicker exists
	{
		$('#date_of_birth').datepicker({
			format: "mm/dd/yyyy",
			startDate: "01/01/1925",
			endDate: getCurrentDate(),
			weekStart:0,
			autoclose:true
		});
	}

	//Update hidden input field data ASAP
	$("#user_location").geocomplete().bind("geocode:result", function(event, result)
	{
		$('#user_location_lat').val( result.geometry.location.lat() );
		$('#user_location_lon').val( result.geometry.location.lng() );
	});

	//Create Custom Search Form submit to show pretty URL
	$("form#search_add_from").submit(function(e)
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
			//var lat_lon_parsed_data = $('#user_location').val().split(',');
			lat_input = parseFloat( $('#user_location_lat').val() );
			lon_input = parseFloat( $('#user_location_lon').val() );
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
			if(++is_tab_opened_before<3)		//No 1 load for page loading and no2 is for first time appear
			{
				//$("#find_product_location").geocomplete("find", $("#find_product_location").geocomplete( "find", latitude + "," + longitude ));

				var map = $("#find_product_location").geocomplete("map");
				map.setCenter( new google.maps.LatLng( latitude+1, longitude-1 ) );
			}
			google.maps.event.trigger(
										$("#find_product_location").geocomplete("map"),
										'resize'
									);
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
	$("form#sign-up-f").submit(function(e)
	{
		e.preventDefault();
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
	if ( $('div#drag_drop_image_upload_div').length)
	{
		//Global Congig
		Dropzone.autoDiscover = false;		//Make dropzone accessable with forms elements for all dropzone
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
			$("#wait").css("display", "block");
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
				$("#wait").css("display", "none");
				window.location.replace($("meta[name='ridirect_url_after_successful_post']").attr("content"));
			}
		});

		//Submitting the free add posting form with AJAX
		$("#post_free_add_form").on('submit', function(e)
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
	}
	//Free Add Posting  - End

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

	//Login Popup Showing
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

	$('.save').on('click',function()
	{
		$(".db-body").toggleClass('edit-on')
	});

	$('.relist').on('click', function()
	{
		var advertisement_id = $(this).closest('div.db-body').attr('advertisement_id');

		//Make AJAX request to update status
		$.ajax(
		{
			headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
			method: "POST",
			url: $('meta[name=add_status_update_ajax_url]').attr("content"),
			dataType: "json",
			data:
			{
				advertisement_id	:	advertisement_id,
				status				:	'active'	//1 for making it active and 0 for making it inactive
			},
			success:function(responce_data)
			{
				console.log(responce_data);
			}
		});
		$(this).closest('.inative-list').fadeOut("slow");
	});

	$('li.end_listing_button').on('click', function()
	{
		var advertisement_id = $(this).closest('div.db-body').attr('advertisement_id');

		//Make AJAX request to update status
		$.ajax(
		{
			headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
			method: "POST",
			url: $('meta[name=add_status_update_ajax_url]').attr("content"),
			dataType: "json",
			data:
			{
				advertisement_id	:	advertisement_id,
				status				:	'inactive'	//1 for making it active and 0 for making it inactive
			},
			success:function(responce_data)
			{
				//$(this).closest('.inative-list').fadeIn("slow");
				console.log(responce_data);
				window.location.reload();
			}
		});
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

	$('#rootwizard').bootstrapWizard();

	window.prettyPrint && prettyPrint();

	//Global AJAX Config - Start
	$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
	});

	$(document).ajaxComplete(function(){
		$("#wait").css("display", "none");
	});
	//Global AJAX Config - END
	
	//My Ads page - Edit Add
	$('.edit1').on('click',function()
	{
		//Loading the contents with AJAX
		$.ajax(
		{
			headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
			method: "POST",
			url: $('meta[name=add_view_ajax_url]').attr("content"),
			dataType: "json",
			data:
			{
				advertisement_id	:	this.id
			},
			success:function(responce_data)
			{
				$.each(responce_data,function(key_index,single_data)
				{
					$('#edit_add_id').val(single_data.id);
					$('#edit_add_title').val(single_data.title);
					$('#edit_add_price').val(single_data.price);
					$('#edit_add_description').val(single_data.description);
					$('#edit_add_address').val(single_data.address);
					$('#edit_add_location_lat').val(single_data.location_lat);
					$('#edit_add_location_lon').val(single_data.location_lon);
					$('#add_title_image').attr(	"src",
												$('meta[name=upload_folder_url]').attr("content")
												+
												single_data.advertisement_images[0].image_name
												);
				});
			}
		});
		//Showing the contents
		$(".db-body").toggleClass('edit-on');
	});

	$("#edit_add_address").geocomplete({})
	.bind("geocode:result", function(event, result)
		{	//Type Helper
			$('#edit_add_location_lat').val( result.geometry.location.lat() );
			$('#edit_add_location_lon').val( result.geometry.location.lng() );
		});

	$("#edit_add_submit").on('click', function(event)
	{
		event.preventDefault();
		$.ajax(
		{
			headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
			method: "POST",
			url: $('meta[name=add_update_ajax_url]').attr("content"),
			dataType: "json",
			data: $("#edit_add_detail").serialize(),
			success:function(responce_data)
			{
				alert('Updated Succesfully');
				location.reload();
			}
		});
	});

	//Admin - Datatable Start
		if ($('#category-datatable').length)			//Category Datatable
		{
			var categoryDataTable = $('#category-datatable').DataTable(
			{
				"processing": true,
				"serverSide": true,
				"ajax":
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					url : $('meta[name=datatable_ajax_url]').attr("content"), // json AJAX URL - datasource
					type: "post",  // method  , by default get
					error: function()
					{  // error handling
						$(".category-datatable-error").html("");
						$("#category-datatable").append('<tbody class="category-datatable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#category-datatable_processing").css("display","none");
					}
				},
				"columns":	[				//Name should be same as PHP file JSON NAmes and ordering should be as in the HTML file
								{	"data": "category_name"			},
								{	"data": null			}
							],
				//"pagingType": "full_numbers",	//Adding Last and First in Pagination
				stateSave: true,
				"columnDefs":	[								//For Action Buttons (Edit and Delete button) adding in the Action Column
									{
										"orderable": false,		//Turn off ordering
										"searchable": false,	//Turn off searching
										"targets": [1],			//Going to last column - 3 is the last column index because o is starting index
										"data": null,			//Not receiving any data
										"defaultContent": '<div style="min-width:70px" class="btn-group" role="group"><button type="button" class="edit btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button><button type="button" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div>'
									}
								],
				dom: 'l<"toolbar">Bfrtip',	//"Bfrtip" is for column visiblity - B F and R become visible
				initComplete:	function()	//Adding Custom button in Tools
								{
									$("div.toolbar").html('<button onclick="AddNewData()" type="button" class="btn btn-info btn-sm" style="float:right;">Add New Data</button>');
								}
			});
			//Add Category
			$('#add_category_button').on('click', function(event)
			{
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $("#add_data").attr('action'),
					dataType: "json",
					data: $("#add_data").serialize(),
					success:function(responce_data)
					{
						$('#add_data_modal').modal('hide');
						categoryDataTable.ajax.reload( null, false );
						alert('Added Succesfully');
					}
				});
			});
			//Edit Category
			$('#category-datatable tbody').on( 'click', 'button.edit', function ()	//Handeling Edit Button Click
			{
				var data = categoryDataTable.row( $(this).parents('tr') ).data();
				//alert('Edit - '+data['id']);	//id = index of ID sent from server
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $('meta[name=view_detail]').attr("content"),
					dataType: "json",
					data: 	{	'category_id'	:	data['id']	},
					success:function(responce_data)
					{
						$('#selected_category_id').val(data['id']);
						$('#selected_category_name').val(responce_data.name);
						$('#edit_data_modal').modal('show');
					}
				});
			});
			//Delete Category
			$('#category-datatable tbody').on( 'click', 'button.delete', function ()	//Handeling Delete Button Click
			{
				var data = categoryDataTable.row( $(this).parents('tr') ).data();
				$("#delete_item_id").val(data['id']);
				$('#delete_confirmation_modal').modal('show');
			});
			//Update/Edit Category
			$('#update_category_button').on('click', function(event)
			{
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $("#update_data").attr('action'),
					dataType: "json",
					data: $("#update_data").serialize(),
					success:function(responce_data)
					{
						alert('Updated Succesfully');
						categoryDataTable.ajax.reload( null, false );
					}
				});
				$('#edit_data_modal').modal('hide');
			});
			//Delete Category
			$('#confirm_delete').on('click', function(event)
			{
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $("#delete_data").attr('action'),
					dataType: "json",
					data: $("#delete_data").serialize(),
					success:function(responce_data)
					{
						$('#delete_confirmation_modal').modal('hide');
						categoryDataTable.ajax.reload( null, false );
						alert('Succesfully Deleted Category');
					}
				});
			});
		}
		else if ($('#sub-category-datatable').length)	//Sub-Category Datatable
		{
			var subCategoryDataTable = $('#sub-category-datatable').DataTable(
			{
				"processing": true,
				"serverSide": true,
				"ajax":
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					url : $('meta[name=datatable_ajax_url]').attr("content"), // json AJAX URL - datasource
					type: "post",  // method  , by default get
					error: function()
					{  // error handling
						$(".sub-category-datatable-error").html("");
						$("#sub-category-datatable").append('<tbody class="sub-category-datatable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#sub-category-datatable_processing").css("display","none");
					}
				},
				"columns":	[				//Name should be same as PHP file JSON NAmes and ordering should be as in the HTML file
								{	"data": "category_name"			},
								{	"data": "sub_category_name"			},
								{	"data": null			}
							],
				//"pagingType": "full_numbers",	//Adding Last and First in Pagination
				stateSave: true,
				"columnDefs":	[								//For Action Buttons (Edit and Delete button) adding in the Action Column
									{
										"orderable": false,		//Turn off ordering
										"searchable": false,	//Turn off searching
										"targets": [2],			//Going to last column - 3 is the last column index because o is starting index
										"data": null,			//Not receiving any data
										"defaultContent": '<div style="min-width:70px" class="btn-group" role="group"><button type="button" class="edit btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button><button type="button" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div>'
									}
								],
				dom: 'l<"toolbar">Bfrtip',	//"Bfrtip" is for column visiblity - B F and R become visible
				initComplete:	function()	//Adding Custom button in Tools
								{
									$("div.toolbar").html('<button onclick="AddNewData()" type="button" class="btn btn-info btn-sm" style="float:right;">Add New Data</button>');
								}
			});
			//Add sub-Category
			$('#add_button').on('click', function(event)
			{
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $("#add_data").attr('action'),
					dataType: "json",
					data: $("#add_data").serialize(),
					success:function(responce_data)
					{
						$('#add_data_modal').modal('hide');
						subCategoryDataTable.ajax.reload( null, false );
						alert('Added Succesfully');
					}
				});
			});
			//Edit SubCategory
			$('#sub-category-datatable tbody').on( 'click', 'button.edit', function ()	//Handeling Edit Button Click
			{
				var data = subCategoryDataTable.row( $(this).parents('tr') ).data();
				//alert('Edit - '+data['id']);	//id = index of ID sent from server
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $('meta[name=view_detail]').attr("content"),
					dataType: "json",
					data: 	{	'sub_category_id'	:	data['id']	},
					success:function(responce_data)
					{
						console.log(responce_data[0].id);
						$('#selected_sub-category_id').val(data['id']);

						$('#selected_sub-category_name').val(responce_data[0].name);
						$('#selected_category_id').val(responce_data[0].category_id);

						$('#edit_data_modal').modal('show');
					}
				});
			});
			//Update Sub-Category
			$('#update_sub-category_button').on('click', function(event)
			{
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $("#update_sub-category").attr('action'),
					dataType: "json",
					data: $("#update_sub-category").serialize(),
					success:function(responce_data)
					{
						$('#edit_data_modal').modal('hide');
						subCategoryDataTable.ajax.reload( null, false );
						$('#edit_success').modal('show');
					}
				});
			});
			//Sub-ategory delete
			$('#sub-category-datatable tbody').on( 'click', 'button.delete', function ()	//Handeling Delete Button Click
			{
				var data = subCategoryDataTable.row( $(this).parents('tr') ).data();
				$("#delete_item_id").val(data['id']);
				$('#delete_confirmation_modal').modal('show');
			});
			//Delete SUb-Category - Confirmation
			$('#confirm_delete').on('click', function(event)
			{
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $("#delete_data").attr('action'),
					dataType: "json",
					data: $("#delete_data").serialize(),
					success:function(responce_data)
					{
						$('#delete_confirmation_modal').modal('hide');
						subCategoryDataTable.ajax.reload( null, false );
						alert('Succesfully Deleted Sub-Category');
					}
				});
			});
		}
		else if ($('#user-datatable').length)	//User Datatable
		{
			var userDataTable = $('#user-datatable').DataTable(
			{
				"processing": true,
				"serverSide": true,
				"ajax":
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					url : $('meta[name=datatable_ajax_url]').attr("content"), // json AJAX URL - datasource
					type: "post",  // method  , by default get
					error: function()
					{  // error handling
						$(".user-datatable-error").html("");
						$("#user-datatable").append('<tbody class="user-datatable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#user-datatable_processing").css("display","none");
					}
				},
				"columns":	[				//Name should be same as PHP file JSON NAmes and ordering should be as in the HTML file
								{	"data": "full_name"					},
								{	"data": "cell_no"					},
								{	"data": "email"						},/*
								{	"data": "website"					},
								{	"data": "date_of_birth"				},
								{	"data": "social_security_number"	},
								{	"data": "address"					},*/
								{	"data": null						}
							],
				//"pagingType": "full_numbers",	//Adding Last and First in Pagination
				stateSave: true,
				"columnDefs":	[								//For Action Buttons (Edit and Delete button) adding in the Action Column
									{
										"orderable": false,		//Turn off ordering
										"searchable": false,	//Turn off searching
										"targets": [3],			//Going to last column - 3 is the last column index because o is starting index
										"data": null,			//Not receiving any data
										"defaultContent": '<div style="min-width:70px" class="btn-group" role="group"><button type="button" class="edit btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button><button type="button" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div>'
										//"defaultContent": '<div style="min-width:70px" class="btn-group" role="group"><button type="button" class="show btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button><button type="button" class="edit btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></div>'
									}
								]
			});
			//User Edit
			$('#user-datatable tbody').on( 'click', 'button.edit', function ()	//Handeling Edit Button Click
			{
				var data = userDataTable.row( $(this).parents('tr') ).data();

				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $('meta[name=view_detail]').attr("content"),
					dataType: "json",
					data: 	{	'id'	:	data['id']	},
					success:function(responce_data)
					{
						console.log(responce_data[0]);
						$('#selected_id').val(data['id']);

						$('#selected_user_name').val(responce_data[0].full_name);
						$('#selected_email').val(responce_data[0].email);
						$('#selected_cell_no').val(responce_data[0].cell_no);
						$('#selected_ssn').val(responce_data[0].social_security_number);
						$('#selected_address').val(responce_data[0].address);
						$('#selected_gps').val(responce_data[0].user_location);
						$('#selected_website').val(responce_data[0].website);
						$('#date_of_birth').val(responce_data[0].date_of_birth);
						$('#selected_is_enabled').val(responce_data[0].is_enabled);

						$('#edit_data_modal').modal('show');
					}
				});
			});
			//Update Sub-Category
			$('#update_button').on('click', function(event)
			{
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $("#update_user").attr('action'),
					dataType: "json",
					data: $("#update_user").serialize(),
					success:function(responce_data)
					{
						$('#edit_data_modal').modal('hide');
						userDataTable.ajax.reload( null, false );
						$('#edit_success').modal('show');
					}
				});
			});
			//User Delete
			$('#user-datatable tbody').on( 'click', 'button.delete', function ()	//Handeling Delete Button Click
			{
				var data = userDataTable.row( $(this).parents('tr') ).data();

				$("#delete_item_id").val(data['id']);
				$('#delete_confirmation_modal').modal('show');
			});
			//Delete User - Confirmation
			$('#confirm_delete').on('click', function(event)
			{
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $("#delete_data").attr('action'),
					dataType: "json",
					data: $("#delete_data").serialize(),
					success:function(responce_data)
					{
						$('#delete_confirmation_modal').modal('hide');
						userDataTable.ajax.reload( null, false );
						alert('Succesfully Deleted User');
					}
				});
			});
		}
		else if ($('#adds-datatable').length)	//Adds Datatable
		{
			var addsDataTable = $('#adds-datatable').DataTable(
			{
				"processing": true,
				"serverSide": true,
				"ajax":
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					url : $('meta[name=datatable_ajax_url]').attr("content"), // json AJAX URL - datasource
					type: "post",  // method  , by default get
					error: function()
					{  // error handling
						$(".adds-datatable-error").html("");
						$("#adds-datatable").append('<tbody class="adds-datatable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#adds-datatable_processing").css("display","none");
					}
				},
				"columns":	[				//Name should be same as PHP file JSON NAmes and ordering should be as in the HTML file
								{	"data": "category"		},
								{	"data": "sub_category"	},
								{	"data": "owner"			},
								{	"data": "title"			},
								{	"data": "price"			},/*
								{	"data": "description"	},
								{	"data": "address"		},*/
								{	"data": null			}
							],
				//"pagingType": "full_numbers",	//Adding Last and First in Pagination
				stateSave: true,
				"columnDefs":	[								//For Action Buttons (Edit and Delete button) adding in the Action Column
									{
										"orderable": false,		//Turn off ordering
										"searchable": false,	//Turn off searching
										"targets": [5],			//Going to last column - 3 is the last column index because o is starting index
										"data": null,			//Not receiving any data
										"defaultContent": '<div style="min-width:70px" class="btn-group" role="group"><button type="button" class="edit btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button><button type="button" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div>'
									}
								],
				dom: 'l<"toolbar">Bfrtip',	//"Bfrtip" is for column visiblity - B F and R become visible
				initComplete:	function()	//Adding Custom button in Tools
								{
									$("div.toolbar").html('<button onclick="AddNewData()" type="button" class="btn btn-info btn-sm" style="float:right;">Add New Data</button>');
								}
			});

			$('#adds-datatable tbody').on( 'click', 'button.edit', function ()	//Handeling Edit Button Click
			{
				var data = addsDataTable.row( $(this).parents('tr') ).data();
				//alert('Edit - '+data['id']);	//id = index of ID sent from server
				$('#edit_data_modal').modal('show');
			});

			$('#adds-datatable tbody').on( 'click', 'button.delete', function ()	//Handeling Delete Button Click
			{
				var data = addsDataTable.row( $(this).parents('tr') ).data();
				alert('Delete - '+data['id']);	//id = index of ID sent from server
			});
		}
		else if ($('#messages-datatable').length)	//Messages Datatable
		{
			var messageDataTable = $('#messages-datatable').DataTable(
			{
				"processing": true,
				"serverSide": true,
				"ajax":
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					url : $('meta[name=datatable_ajax_url]').attr("content"), // json AJAX URL - datasource
					type: "post",  // method  , by default get
					error: function()
					{  // error handling
						$(".messages-datatable-error").html("");
						$("#messages-datatable").append('<tbody class="messages-datatable-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
						$("#messages-datatable_processing").css("display","none");
					}
				},
				"columns":	[				//Name should be same as PHP file JSON NAmes and ordering should be as in the HTML file
								{	"data": "category"		},
								{	"data": "sub_category"	},
								{	"data": "owner"			},
								{	"data": "title"			},
								{	"data": "price"			},
								{	"data": "description"	},
								{	"data": "address"		},
								{	"data": null			}
							],
				//"pagingType": "full_numbers",	//Adding Last and First in Pagination
				stateSave: true,
				"columnDefs":	[								//For Action Buttons (Edit and Delete button) adding in the Action Column
									{
										"orderable": false,		//Turn off ordering
										"searchable": false,	//Turn off searching
										"targets": [7],			//Going to last column - 3 is the last column index because o is starting index
										"data": null,			//Not receiving any data
										"defaultContent": '<div style="min-width:70px" class="btn-group" role="group"><button type="button" class="edit btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button><button type="button" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></div>'
									}
								],
				dom: 'l<"toolbar">Bfrtip',	//"Bfrtip" is for column visiblity - B F and R become visible
				initComplete:	function()	//Adding Custom button in Tools
								{
									$("div.toolbar").html('<button onclick="AddNewData()" type="button" class="btn btn-info btn-sm" style="float:right;">Add New Data</button>');
								}
			});

			$('#messages-datatable tbody').on( 'click', 'button.edit', function ()	//Handeling Edit Button Click
			{
				var data = messageDataTable.row( $(this).parents('tr') ).data();
				//alert('Edit - '+data['id']);	//id = index of ID sent from server
				$('#edit_data_modal').modal('show');
			});

			$('#messages-datatable tbody').on( 'click', 'button.delete', function ()	//Handeling Delete Button Click
			{
				var data = messageDataTable.row( $(this).parents('tr') ).data();
				alert('Delete - '+data['id']);	//id = index of ID sent from server
			});
		}
	//Admin - Datatable End

	//Accept Offer
	$(".accept-offer").on('click', function(event)
	{
		event.preventDefault();
		$.ajax(
		{
			headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
			method: "POST",
			url: $('meta[name=update_offer_status]').attr("content"),
			dataType: "json",
			data:	{
						'offer_id'	: $(this).closest('div').attr('offer_id'),
						'status'	: 'accepted'
					},
			success:function(responce_data)
			{
				alert('Offer Accepted');
				location.reload();
			}
		});
	});

	//Reject Offer
	$(".reject-offer").on('click', function(event)
	{
		event.preventDefault();
		$.ajax(
		{
			headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
			method: "POST",
			url: $('meta[name=update_offer_status]').attr("content"),
			dataType: "json",
			data:	{
						'offer_id'	: $(this).closest('div').attr('offer_id'),
						'status'	: 'rejected'
					},
			success:function(responce_data)
			{
				alert('Rejected Accepted');
				location.reload();
			}
		});
	});

	//Inbox Page- Start - Start
		/*$('.info-btn').on('click', function ()
		{
			//$("#extra_info").fadeToggle(1000);
			//$("#messages").toggleClass('col-sm-12 col-sm-9');

			if( $("#messages").hasClass("col-sm-12") )	//Extra Contents hidden
			{
				$("#messages").toggleClass('col-sm-12 col-sm-9',1000).promise().done(function()
				{
					$("#extra_info").fadeToggle(1000);
				});
			}
			else
			{
				$("#extra_info").fadeToggle(1000).promise().done(function()
				{
					$("#messages").toggleClass('col-sm-12 col-sm-9',1000);
				});
			}
		});*/

		showMessageDetail();

		$('.inbox_titles li').click(function(event)
		{
			if(window.matchMedia( "(max-width: 768px)" ).matches)
			{
				$('#message_menu_close_button').show();
				$('#message_details').show();
				$('#message_threades').hide();
			}
		});

		$('#message_menu_close_button').click(function(event)
		{
			$('#message_menu_close_button').hide();
			if(window.matchMedia( "(max-width: 768px)" ).matches)
			{
				$('#message_details').hide();
				$('#message_threades').show();
			}
			//Hide Title Text - Message Thread Title
			$('#message_title').text('');
		});

		//Message Detail
		$('.conversation').on('click', function ()
		{
			$("#message_title").text($(this).children().children().first().text());
			$("#send_message_form input[name=thread_id]").val( $(this).attr("thread_id") );

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
				method: "POST",
				url: $('meta[name=thread_detail_ajax_url]').attr("content"),
				data:	{
							thread_id: $(this).attr("thread_id")
						}
				}).success(function( data )
				{
					$('#inbox_detail').empty();
					$.each(data,function(key_index,single_data)
					{
						$('#inbox_detail')
							.append(
										'<li class="list-group-item '
										+single_data.sender_type
										+'"><div><div class="pro_pic"><img src="'
										+$('meta[name=upload_folder_url]').attr("content")
										+single_data.user_image
										+'"> <span class="lead text-success">'
										+single_data.sender_name
										+'</span></div><blockquote><div class="message">'
										+single_data.message
										+'</div><footer><time class="message_sent_time">'
										+single_data.sent_time
										+'</time></footer></blockquote></div></li>'
									);
					});
				});
		});

		//Send Message
		$('#inbox_send_button').on('click', function ()
		{
			$.ajax({
				headers:	{ 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
				method:	"POST",
				url:	$("#send_message_form").attr('action'),
				data:	$("#send_message_form").serialize(),
				}).success(function( single_data )
				{
					//Appending the message
					$('#inbox_detail')
							.append(
										'<li class="list-group-item me_send_him"><div><div class="pro_pic"><img src="'
										+$('meta[name=upload_folder_url]').attr("content")
										+single_data.sender_image
										+'"> <span class="lead text-success">'
										+single_data.sender_name
										+'</span></div><blockquote><div class="message">'
										+single_data.message
										+'</div><footer><time class="message_sent_time">'
										+single_data.sent_time
										+'</time></footer></blockquote></div></li>'
									);
					//Clearing the sent item textarea
					$("#send_message_form textarea[name=message]").val('');
					//Scroll down the item
					$('#inbox_detail').scrollTop($('#inbox_detail')[0].scrollHeight);
				});
		});
	//Inbox Page Design - Stop
});
