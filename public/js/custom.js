//Global variables
var latitude, longitude, searchLocationName;
var is_tab_opened_before =0;
var is_wishlist_propagated = false;
//var debug_variable;
//Email Validate
function validateEmail(email)
{
	var re = /\S+@\S+\.\S+/;
	return re.test(email);
}

function convertToLocalTime(serverTime)
{
	var offsetInMinuites = new Date().getTimezoneOffset();
	var serverDate = Date.parse(serverTime, "yyyy-MM-dd HH:mm:ss");
	var localTime = new Date(serverDate - (offsetInMinuites * 60 * 1000));
	return localTime;
}

function formatTime(inputDate)
{
	var dayNo = getDateWithSuffix(inputDate.getDate());
	var monthName = getMonthName(inputDate.getMonth());
	var year = inputDate.getFullYear();

	var hours = inputDate.getHours();
	var minutes = inputDate.getMinutes();
	var seconds = inputDate.getSeconds();
	var ampm = hours >= 12 ? 'PM' : 'AM';
	hours = hours % 12;
	hours = hours ? hours : 12; // the hour '0' should be '12'
	minutes = minutes < 10 ? '0'+minutes : minutes;
	seconds = seconds < 10 ? '0'+seconds : seconds;

	var formattedTime = "";
	var todaysDate = new Date();	// Get today's date

	// call setHours to take the time out of the comparison
	if(inputDate.setHours(0,0,0,0) == todaysDate.setHours(0,0,0,0))
	{	// Date equals today's date - So show only time
		formattedTime = hours + ':' + minutes+ ':' + seconds + ' ' + ampm;
	}
	else
	{	// Date equals Not today's date - So show total time with date
		formattedTime = dayNo + " " + monthName + " " + year + ", " + hours + ':' + minutes + ' ' + ampm;
	}

	return formattedTime;
}

function getDateWithSuffix(dayNo)
{
	if(dayNo==1)
		return dayNo+"st";
	else if(dayNo==2)
		return dayNo+"nd";
	else if(dayNo==3)
		return dayNo+"rd";
	else
		return dayNo+"th";
}

function getMonthName(monthNo)
{
	var monthNames = [
						"Jan",
						"Feb",
						"Mar",
						"Apr",
						"May",
						"Jun",
						"Jul",
						"Aug",
						"Sep",
						"Oct",
						"Nov",
						"Dec"
					];

	return monthNames[monthNo];
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
	if( (latitude===undefined && longitude===undefined) || searchLocationName!=undefined )		//not called before in the page
	{
		$.get("http://ipinfo.io", function (response)
		{
			var temp		= response.loc.split(",");

			if(searchLocationName!=undefined)	//It is search page
			{
				//Input User Location in Input
				$('#user_location').val( searchLocationName );
				$('#input_nav_search').val( searchValue );
			}
			else
			{
				searchLocationName	= undefined;	//Make it undefined because we don't need to execute this if anytime more
				latitude		= parseFloat(temp[0]);
				longitude		= parseFloat(temp[1]);
				//Input User Location in input
				$('#user_location').val( response.city /*+', '+response.country */);

				$('#map_lat_min').val( parseFloat( $('#map_lat_min').val() )+latitude );
				$('#map_lat_max').val( parseFloat( $('#map_lat_max').val() )+latitude );
				$('#map_lon_min').val( parseFloat( $('#map_lon_min').val() )+longitude );
				$('#map_lon_max').val( parseFloat( $('#map_lon_max').val() )+longitude );
			}

			$('#user_location_lat').val(latitude);
			$('#user_location_lon').val(longitude);

			//Set Map Center to Current User Location
			var $mapDiv = $('#map');
			if ($mapDiv.length)
			{
				//Timeout is added to fix Map not loaded caching issue fixing
				setTimeout(function()
				{
					$mapDiv.gmap3('get').setCenter(new google.maps.LatLng(0,0));
				}, 100);
				setTimeout(function()
				{
					$mapDiv.gmap3('get').setCenter(new google.maps.LatLng(latitude,longitude));
				}, 500);
			}

			//Home Page Element Loading according to current ocation
			var element_container = $('#home_page_element_container');
			if (element_container.length)
			{
				/*
				 *	From http://www.movable-type.co.uk/scripts/latlong.html
				 *	and http://andrew.hedges.name/experiments/haversine/
				 *	we get -
				 *			lat distance 1 = 69.132 miles
				 *			lon distance 1 = 52.958 miles
				 */
				//Comes from user requirement - 50 miles
				var lat_tuned_map_area = 50/2/69.132;
				var lon_tuned_map_area = 50/2/52.958;

				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $('meta[name=get_homepage_data]').attr("content"),
					dataType: "json",
					data:
					{
						lat_min	:	latitude-lat_tuned_map_area,
						lat_max	:	latitude+lat_tuned_map_area,
						lon_min	:	longitude-lon_tuned_map_area,
						lon_max	:	longitude+lon_tuned_map_area
					},
					success:function(responce_data)
					{
						//var hearts_svg		=	$('meta[name="hearts_svg"]').attr('content');
						var upload_folder	=	$('meta[name="upload_folder_url"]').attr('content');
						element_container.empty();

						$.each(responce_data,function(key_index,single_data)
						{
							var data_to_append	=	'<div class="col-lg-3 col-md-3 col-sm-6">'
														+'<a href="#" add_id="'+single_data.id+'" class="add_to_wishlist wsh-lst2">'
															+'<img type="image/svg+xml" src="'+single_data.hearts_image+'"></img>'
														+'</a>'
														+'<a href="'+$('#search_add_from').attr('action')+'#'+single_data.id+'"><div class="box">'
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
														+'</div></a>'
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

function addToWisList(id, element)
{
	is_wishlist_propagated = true;
	$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
				method: "POST",
				url: $('meta[name=add_wishlist_url]').attr("content"),
				dataType: "json",
				data:
				{
					advertisement_id	:	id
				},
				success:function(responce_data)
				{
					if(responce_data.length==0)
					{
						$('#sgn-pup').modal('show');
					}

					try
					{
						element.attr('src',responce_data.hearts_image);
					}
					catch(err)
					{
						try
						{
							var chield = $(jQuery(element)).children('img');
							chield.attr('src',responce_data.hearts_image);
						}
						catch(err2)
						{
							console.log(err2);
						}
					}

					try
					{
						if( !ifDeviceIsMobile() )
						{
							generateMarkers(map_div.gmap3("get").getBounds());
						}
					}
					catch(err)
					{
						console.log(err);
					}
				},
				error: function(jqXHR, exception)
				{
					$('#lgn-pup').modal('show');
				}
			});
	setTimeout(function(){ is_wishlist_propagated = false; }, 1000);
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

var directionsDisplay = new google.maps.DirectionsRenderer();//This is made global to clear previous routes

function calcRoute(productLat,productLon)
{
	var start = new google.maps.LatLng(latitude, longitude);
	//var end = new google.maps.LatLng(38.334818, -181.884886);
	var end = new google.maps.LatLng(productLat,productLon);
	var request = {
					origin: start,
					destination: end,
					travelMode: google.maps.TravelMode.DRIVING
				};

	var directionsService = new google.maps.DirectionsService();
	directionsService.route(request, function(response, status)
	{
		if (status == google.maps.DirectionsStatus.OK)
		{
			clearPrevRoutes();
			directionsDisplay.setDirections(response);
			directionsDisplay.setMap( map_div.gmap3("get") );
		}
		else
		{
			alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
		}
	});
}

function clearPrevRoutes()
{
	directionsDisplay.setDirections({routes: []});
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

		$('#map_lat_min').val( result.geometry.viewport.f.f );
		$('#map_lat_max').val( result.geometry.viewport.f.b );
		$('#map_lon_min').val( result.geometry.viewport.b.f );
		$('#map_lon_max').val( result.geometry.viewport.b.b );
	});

	//Create Custom Search Form submit to show pretty URL
	$("form#search_add_from").submit(function(e)
	{
		e.preventDefault();

		if( $('#user_location').val().trim().length<1 || $('#map_lat_min').val().trim().length<1 )
		{
			$('#user_location').parent().addClass("has-error");
			return 0;
		}
		else
		{
			$('#user_location').parent().removeClass("has-error");
		}

		var lat_input,lon_input, lat_min, lon_min, lat_max, lon_max;
		try
		{
			//var lat_lon_parsed_data = $('#user_location').val().split(',');
			lat_input	=	parseFloat( $('#user_location_lat').val() );
			lon_input	=	parseFloat( $('#user_location_lon').val() );

			lat_min		=	parseFloat( $('#map_lat_min').val() );
			lon_min		=	parseFloat( $('#map_lon_min').val() );
			lat_max		=	parseFloat( $('#map_lat_max').val() );
			lon_max		=	parseFloat( $('#map_lon_max').val() );

			if(	isNaN(lat_input)	||	isNaN(lon_input)	)
			{
				$('#user_location').parent().addClass("has-error");
				return 0;
			}
			else			//Everything OK
			{
				var redirect_url	=	$('meta[name=base_url]').attr("content")
										+	'/listing/'
										//+	$('#input_nav_subcategory').val()
										+	$('#user_location').val()
										+	'/'
										+	lat_input
										+	'/'
										+	lon_input
										+	'/'
										+	lat_min
										+	'/'
										+	lon_min
										+	'/'
										+	lat_max
										+	'/'
										+	lon_max;

				var input_nav_search_value = $('#input_nav_search').val().trim();
				if( input_nav_search_value.length>0 )
				{
					redirect_url += '/'+input_nav_search_value;
				}

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
										data: $("#login-f").serialize()
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

	/* Submit button pressed - Login Popup */
	$("#login-fpop").submit(function()
	{
		var isValidated = true;
		$("#login_submit_pop").button('loading');		//Change button state to loggin in
		//Checking input for validation

		//email field
		if( !validateEmail( $('#login-email-pop').val() ) )
		{
			isValidated = false;
			$('#login-email-div-pop').addClass('has-error');
		}
		else
		{
			$('#login-email-div-pop').removeClass('has-error');
		}

		//Password Field
		if( $('#login-password-pop').val().length == 0 )
		{
			isValidated = false;
			$('#login-password-div-pop').addClass('has-error');
		}
		else
		{
			$('#login-password-div-pop').removeClass('has-error');
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
										data: $("#login-fpop").serialize()
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
					$("#login_error_message_pop").html(value);
				}
			});
		}
		$("#login_submit_pop").button('reset');		//Reset button state
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

	/* Submit button pressed - Sign-up Popup */
	$("form#sign-up-fpop").submit(function(e)
	{
		e.preventDefault();
		var isValidated = true;
		$("#sign_up_submit_pop").button('loading');		//Change button state to Signing Up
		//Checking input for validation

		//First Name
		if( $('#signup-first_name_pop').val().length < 2 )
		{
			isValidated = false;
			$('#signup-first_name_pop-div').addClass('has-error');
		}
		else
		{
			$('#signup-first_name_pop-div').removeClass('has-error');
		}

		//Last Name
		if( $('#signup-last_name_pop').val().length < 2 )
		{
			isValidated = false;
			$('#signup-last_name_pop-div').addClass('has-error');
		}
		else
		{
			$('#signup-last_name_pop-div').removeClass('has-error');
		}

		//email field
		if( !validateEmail( $('#signup-email-pop').val() ) )
		{
			isValidated = false;
			$('#signup-email-pop-div').addClass('has-error');
		}
		else
		{
			$('#signup-email-pop-div').removeClass('has-error');
		}

		//Password Field
		if( $('#signup-password-pop').val().length == 0 )
		{
			isValidated = false;
			$('#signup-password-pop-div').addClass('has-error');
		}
		else
		{
			$('#signup-password-pop-div').removeClass('has-error');
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
										data: $("#sign-up-fpop").serialize()
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
					$("#sign_up_error_message_pop").html("Given e-mail already in use !");
					console.log(value);
				}
			});
		}
		$("#sign_up_submit_pop").button('reset');		//Reset button state
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
			console.log(data);
			var last_id;
			$.each(data,function(id,value)
			{
				if(id.localeCompare('id')==0)
				{
					last_id=value;
				}
				else if(id.localeCompare('name')==0)
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

				if(this.getAcceptedFiles().length>0)
				{
					window.location.replace($("meta[name='ridirect_url_after_successful_post']").attr("content"));
				}
			}
		});

		//Submitting the free add posting form with AJAX
		$("#post_free_add_form").on('submit', function(e)
		{
			e.preventDefault(e);
			$(this).find("button[type='submit']").prop('disabled',true);
			var no_of_errors = 0;
			$("#wait").css("display", "block");

			////////////////////////////////////////////////////////////---Validation Start
				//Add Product Location
				if( $("#find_product_location").val().length == 0 || $("#product_location_lat").val().length == 0 || $("#product_location_lon").val().length == 0 )
				{
					$("#find_product_location").parent().addClass("has-error");
					$('.nav-tabs a[href="#tab3"]').tab('show');
					no_of_errors++;
				}
				else
				{
					$("#find_product_location").parent().removeClass("has-error");
				}
				//Uploaded Files
				if( $myDropZone[0].dropzone.getAcceptedFiles().length == 0 )
				{
					$("#tab2").addClass("dropzone-error");
					$('.nav-tabs a[href="#tab2"]').tab('show');
					no_of_errors++;
				}
				else
				{
					$("#tab2").removeClass("dropzone-error");
				}
				//Category
				if( $("#category_select").val() == 0 )
				{
					$("#category_select").parent().addClass("has-error");
					$('.nav-tabs a[href="#tab1"]').tab('show');
					no_of_errors++;
				}
				else
				{
					$("#category_select").parent().removeClass("has-error");
				}
				//Sub-Category
				if( $("#sub_category_select").val() == 0 )
				{
					$("#sub_category_select").parent().addClass("has-error");
					$('.nav-tabs a[href="#tab1"]').tab('show');
					no_of_errors++;
				}
				else
				{
					$("#sub_category_select").parent().removeClass("has-error");
				}
				//Add Title
				if( $("#adtitle").val().length == 0 )
				{
					$("#adtitle").parent().addClass("has-error");
					$('.nav-tabs a[href="#tab1"]').tab('show');
					no_of_errors++;
				}
				else
				{
					$("#adtitle").parent().removeClass("has-error");
				}
				//Add Price
				//isNaN( parseFloat( $("#price").val() ) )
				if( isNaN( parseFloat( $("#price").val() ) ) )
				{
					$("#price").parent().addClass("has-error");
					$('.nav-tabs a[href="#tab1"]').tab('show');
					no_of_errors++;
				}
				else
				{
					$("#price").parent().removeClass("has-error");
				}
				//Add Description
				if( $("#description").val().length == 0 )
				{
					$("#description").parent().addClass("has-error");
					$('.nav-tabs a[href="#tab1"]').tab('show');
					no_of_errors++;
				}
				else
				{
					$("#description").parent().removeClass("has-error");
				}
			////////////////////////////////////////////////////////////---Validation End
			if(no_of_errors==0)
			{
				$.ajax(
						{
							headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
							method: "POST",
							url: $(this).attr('action'),
							dataType: "json",
							async: false,
							data: $("#post_free_add_form").serialize(),
							success:function(responce_data)
							{
								console.log(responce_data);
								$('meta[name=uploaded_add_id]').attr('content', responce_data);		//Setting from AJAX responce

								//Process of upload should start after successfull advertisement upload - Will do later
								$myDropZone[0].dropzone.processQueue();								//Uploading files
							},
							error: function(jqXHR, exception)
							{
								$('#pfa').modal('hide');
								$('#lgn-pup').modal('show');
								$(this).find("button[type='submit']").prop('disabled',false);
							}
						});
			}
			else
			{
				$(this).find("button[type='submit']").prop('disabled',false);
				$("#wait").css("display", "none");
			}
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
	/*
	jQuery.ajaxSetup({
		beforeSend: function()
		{
			$("#wait").css("display", "block");
		},
		complete: function()
		{
			$("#wait").css("display", "none");
		},
		success: function (e)
		{
			$("#wait").css("display", "none");	
		},
		error: function (e)
		{
			console.log(e);
			$("#wait").css("display", "none");	
		}
	});
	*/
	$(document).ajaxStart(function(){
		$("#wait").css("display", "block");
	});

	$(document).ajaxComplete(function(){
		$("#wait").css("display", "none");
	});
	//Global AJAX Config - End

	$(document).ajaxError(function( event, jqXHR, settings, thrownError )
	{
		$("#wait").css("display", "none");
		if (jqXHR.status === 0)
		{
			console.log('Not connect.\n Verify Network.');
		}
		else if (jqXHR.status == 404)
		{
			console.log('Requested page not found. [404]');
		}
		else if (jqXHR.status == 500)
		{
			console.log('Internal Server Error [500].');
		}
		else if (thrownError === 'parsererror')
		{
			console.log('Requested JSON parse failed.');
		}
		else if (thrownError === 'timeout')
		{
			console.log('Time out error.');
		}
		else if (thrownError === 'abort')
		{
			console.log('Ajax request aborted.');
		}
		else
		{
			console.log('event');
			console.log(event);
			console.log('jqXHR');
			console.log(jqXHR);
			console.log('settings');
			console.log(settings);
			console.log('thrownError');
			console.log(thrownError);
		}
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

					//Showing the contents
					$(".db-body").toggleClass('edit-on');
					$("#show_paginator").toggle();

					try
					{
						$('#add_title_image').attr(	"src",
													$('meta[name=upload_folder_url]').attr("content")
													+
													single_data.advertisement_images[0].image_name
												);
					}
					catch(err)
					{
						console.log("Image not exists - " + err);
					}
				});
			}
		});
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
								]
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
				$("#delete_item_id").val(data['id']);
				$('#delete_confirmation_modal').modal('show');
			});
			//Delete Add - Confirmation
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
						addsDataTable.ajax.reload( null, false );
						alert('Succesfully Deleted Add');
					}
				});
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
		else if ($('#public-pages-datatable').length)	//Messages Datatable
		{
			var publicPageDataTable = $('#public-pages-datatable').DataTable(
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
								{	"data": "is_enabled"	},
								{	"data": "page_order"	},
								{	"data": "url"			},
								{	"data": "small_title"	},
								{	"data": "big_title"		},
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
									$("div.toolbar").html('<button onclick="AddNewData()" type="button" class="btn btn-info btn-sm" style="float:right;">Add New Public Page</button>');
								}
			});

			//Add Public Page
			$('#add_public-page_button').on('click', function(event)
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
						publicPageDataTable.ajax.reload( null, false );
						$("#add_data").trigger('reset');
						alert('Public Page Added Succesfully');
					},
					error: function(xhr, textStatus, errorThrown)
					{
						alert('Invalid Input');
						console.log(xhr);
						console.log(textStatus);
						console.log(errorThrown);
					}
				});
			});

			$('#public-pages-datatable tbody').on( 'click', 'button.edit', function ()	//Handeling Edit Button Click
			{
				var data = publicPageDataTable.row( $(this).parents('tr') ).data();
				$('#public_page_id').val(data['id']);
				$.ajax(
				{
					headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
					method: "POST",
					url: $('meta[name=view_detail]').attr("content"),
					dataType: "json",
					data: 	{	'id'	:	$('#public_page_id').val()	},
					success:function(responce_data)
					{
						$("#update_data input[name=url]").val(responce_data.url);
						$("#update_data input[name=small_title]").val(responce_data.small_title);
						$("#update_data input[name=big_title]").val(responce_data.big_title);
						$("#update_data textarea[name=description]").val(responce_data.description);
						$("#update_data input[name=page_order]").val(responce_data.page_order);
						$("#update_data select[name=is_enabled]").val(responce_data.is_enabled);

						$('#edit_data_modal').modal('show');
					}
				});
			});

			$('#public-pages-datatable tbody').on( 'click', 'button.delete', function ()	//Handeling Delete Button Click
			{
				var data = publicPageDataTable.row( $(this).parents('tr') ).data();
				$('#delete_item_id').val(data['id']);
				$('#delete-text').html("Do you really want to delete- <b>"+data['small_title']+"</b>?");
				$('#delete_confirmation_modal').modal('show');
			});

			//Update/Edit Public Page
			$('#update_public-page_button').on('click', function(event)
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
						publicPageDataTable.ajax.reload( null, false );
						$('#edit_data_modal').modal('hide');
					},
					error: function(xhr, textStatus, errorThrown)
					{
						alert('Update Failed');
						console.log(xhr);
						console.log(textStatus);
						console.log(errorThrown);
						publicPageDataTable.ajax.reload( null, false );
						$('#edit_data_modal').modal('hide');
					}
				});
				$('#edit_data_modal').modal('hide');
			});

			//Delete Category
			$('#confirm_delete_public-page').on('click', function(event)
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
						publicPageDataTable.ajax.reload( null, false );
						alert('Succesfully Deleted Page');
					},
					error: function(xhr, textStatus, errorThrown)
					{
						alert('Delete Failed');
						console.log(xhr);
						console.log(textStatus);
						console.log(errorThrown);
					}
				});
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
										+formatTime(convertToLocalTime(single_data.sent_time))
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

	//Recover Password AJAX - Start
		$("form#reset_password").submit(function(e)
		{
			e.preventDefault();
			if( $('#reset_email_input').val().trim().length<1 )
			{
				$('#reset_email_input').parent().addClass("has-error");
				return 0;
			}
			
			var responce = $.ajax(
									{
										headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
										method: "POST",
										url: $(this).attr('action'),
										dataType: "json",
										async: false,
										data: $("#reset_password").serialize()
									}).responseText;

			$("#recovery_mail_sent_message").html(responce).css("color", "red");
		});
	//Recover Password AJAX - End

	//Notification Settings - Start
		$(".notification_settings").change(function()
		{
			var settingsName = $(this).val();
			var settingsStatus;
			if( $(this).is(':checked') )
			{
				settingsStatus = 'enabled';
			}
			else
			{
				settingsStatus = 'disabled';
			}

			//alert(settingsName + ' - ' + settingsStatus );

			$.ajax({
						headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
						method: "POST",
						url: $('meta[name=notification_settings_url]').attr("content"),
						dataType: "json",
						data:
						{
							settingsName	:	settingsName,
							status			:	settingsStatus
						},
						success:function(responce_data)
						{
							alert( 'Settings Updated' );
						}
					});

		});
	//Notification Settings - End
	
	//Update Password - Start
		$("form#change_password_form").submit(function(e)
		{
			e.preventDefault();
			$.ajax({
						headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
						method: "POST",
						url: $(this).attr('action'),
						dataType: "json",
						data: $(this).serialize(),
						success:function(responce_data)
						{
							//alert(responce_data.error);
							if(!responce_data.error)
							{
								$("#validation_error").html(responce_data.detail).addClass("text-success").removeClass("text-danger");
								$("form#change_password_form").trigger("reset");
							}
							else
								$("#validation_error").html(responce_data.detail).removeClass("text-success").addClass("text-danger");
						},
						error: function(xhr, textStatus, errorThrown)
						{
							$("#validation_error").html(xhr).removeClass("text-success").addClass("text-danger");
						}
					});
		});
	//Update Password - End

	$(document).on('click', '.add_to_wishlist', function (e)
	{
		e.preventDefault();
		addToWisList( $(this).attr('add_id'), $(this).children('img') );
	});

	//Typehead - Start
	if ($('#input_nav_search').length)
	{
		var engine = new Bloodhound({
			identify	:	function(options)
							{
								return options.id_str;
							},
			queryTokenizer	:	Bloodhound.tokenizers.whitespace,
			datumTokenizer	:	Bloodhound.tokenizers.obj.whitespace('name', 'screen_name'),
			dupDetector		:	function(a, b)
								{
									return a.id_str === b.id_str;
								},
			remote: {
				url			:	$('meta[name="input_nav_search_url"]').attr('content')+'#%QUERY',
				wildcard	:	'%QUERY',
				cache		:	false,
				transport: function (opts, onSuccess, onError)
				{
					var lat_min, lat_max, lon_min, lon_max;

					try
					{
						lat_min		=	$('#map').gmap3("get").getBounds().getSouthWest().lat(),
						lat_max		=	$('#map').gmap3("get").getBounds().getNorthEast().lat(),
						lon_min		=	$('#map').gmap3("get").getBounds().getSouthWest().lng(),
						lon_max		=	$('#map').gmap3("get").getBounds().getNorthEast().lng();
					}
					catch(err)
					{
						/*
						lat_min		=	-180,
						lat_max		=	180,
						lon_min		=	-180,
						lon_max		=	180;
						*/
						lat_min		=	$("#map_lat_min").val(),
						lat_max		=	$("#map_lat_max").val(),
						lon_min		=	$("#map_lon_max").val(),
						lon_max		=	$("#map_lon_min").val();
					}

					$.ajax({
						headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
						url: opts.url.split("#")[0],
						data:
							{
								search_string	:	opts.url.split("#")[1],
								//Find Map Bounds
								lat_min			:	lat_min,
								lat_max			:	lat_max,
								lon_min			:	lon_min,
								lon_max			:	lon_max
							},
						type: "POST",
						global: false,
						dataType: "json",
						success: onSuccess,
						error: onError
					})
				}
			}
		});

		$('#input_nav_search').typeahead({
					hint:		true,
					highlight:	true,
					minLength: 0
				},
				{
					source: engine,
					displayKey:	'name'
				})
				.on('typeahead:asyncrequest', function()
				{
					$(this).addClass('typeahead-spinner');
				})
				.on('typeahead:asynccancel typeahead:asyncreceive', function()
				{
					$(this).removeClass('typeahead-spinner');
				})
				.bind('typeahead:select', function (event, suggestion)
				{
					try
					{
						if( ifDeviceIsMobile() )
						{
							generateMarkers( viewPortForMobile );
						}
						else
						{
							generateMarkers(map_div.gmap3("get").getBounds());
						}
					}
					catch(err)
					{
						console.log("It is not map page");
					}
				});
	}
	//Typehead - End
});
