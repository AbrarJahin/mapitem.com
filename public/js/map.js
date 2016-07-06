//General Config
var map_div = $('#map');
var last_opened_info_window_id = -1;				//For solving infowindow lost issue after AJAX call done
var viewPortForMobile;
//var last_opened_infowindow;

// generate an array of colors
//var colors = "black brown green purple yellow grey orange white".split(" ");

// on document ready function
$(function()
{
	//Link GeoComplete to Map
	$("#user_location").geocomplete().bind("geocode:result", function(event, result)
	{
		if( ifDeviceIsMobile() )
		{
			viewPortForMobile=result.geometry.viewport;
			generateMarkers( viewPortForMobile );
		}
		map_div.gmap3('get').setCenter(result.geometry.location);		//Set Center
		map_div.gmap3('get').fitBounds(result.geometry.viewport);		//Set Autometic Zoom
	});

	//On Mouseover Map InfoWindow Pop Up
	$(document).on("mouseenter", ".showonmap9", function(e)
	{
		openInfoWindowByID( $(this).attr('marker_id') );
	});

	//Open add
	$(document).on("click", ".showonmap9", function(e)
	{
		var product_id = $(this).attr('marker_id');
		openInfoWindowByID( product_id );
		showAddDetail( product_id );
	});

	//Close add
	$('.close-detail').click(function()
	{
		closeAddDetail();
	});

	$("#category_filter input[type=checkbox]").change(function()
	{
		// first : create an object where keys are colors and values is true (only for checked objects)
		var checkedData = {};
		$("#category_filter input[type=checkbox]:checked").each(function(i, chk)
		{
			checkedData[$(chk).attr("name")] = true;
		});

		/*// set a filter function using the closure data "checkedData"
		map_div.gmap3({get:"clusterer"}).filter(function(data)
		{
			return data.category in checkedData;
		});*/
	});

	// create gmap3 and call the marker generation function  
	map_div.gmap3({
		map:{
			options	:	{
							navigationControl	: false,
							scrollwheel			: true,
							streetViewControl	: false,
							mapTypeControl		: false,
							zoom				: 12,
							center				: new google.maps.LatLng(latitude,longitude),
							mapTypeId			: google.maps.MapTypeId.TERRAIN	//ROADMAP , SATELLITE , HYBRID , TERRAIN
						}
		}
	});

	//Close All Infowindow by clicking inside map
	google.maps.event.addListener(map_div.gmap3("get"), "click", function(event)
	{
		try
		{
			map_div.gmap3({get:{name:"infowindow"}}).close();
			last_opened_info_window_id=-1;
			closeAddDetail();
		}
		catch(error)
		{
			console.log('Map Info Window is not opened yet for single time, so it is not initialized yet');
		}
	});

	//Call AJAX Call from Here - When Map comes to a stable position of when map first time loads
	google.maps.event.addListener(map_div.gmap3("get"), "idle", function(event)
	{
		if( ifDeviceIsMobile() )
		{
			if(viewPortForMobile == undefined)		//It will be just called 1 time when map loads
			{
				/*
				 *	From http://www.movable-type.co.uk/scripts/latlong.html
				 *	and http://andrew.hedges.name/experiments/haversine/
				 *	we get -
				 *			lat distance 1 = 69.132 miles
				 *			lon distance 1 = 52.958 miles
				 */
				var lat_tuned_map_area = 10/69.132;
				var lon_tuned_map_area = 10/52.958;
				//console.log(lat_tuned_map_area + ' ' + lon_tuned_map_area);
				viewPortForMobile = new google.maps.LatLngBounds(
																	new google.maps.LatLng(latitude-lat_tuned_map_area, longitude-lon_tuned_map_area),
																	new google.maps.LatLng(latitude+lat_tuned_map_area, longitude+lon_tuned_map_area)
																);
				generateMarkers(viewPortForMobile);
			}
			else
			{
				console.log('Mobile fake Map already initialized');
			}
		}
		else
		{
			generateMarkers(map_div.gmap3("get").getBounds());
		}
	});

	//Pagination
	$('#show_paginator').bootpag({
			total			:	$('meta[name=total_no_of_pages]').attr("content"),
			page				:	$('meta[name=current_page_no]').attr("content"),
			maxVisible		:	$('meta[name=max_visible]').attr("content"),
			leaps			:	true,
			//firstLastUse		:	true,
			//first			:	'←',
			//last				:	'→',
			wrapClass		:	'pagination',
			activeClass		:	'active',
			disabledClass	:	'disabled',
			nextClass		:	'next',
			prevClass		:	'prev',
			lastClass		:	'last',
			firstClass		:	'first'
	}).on('page', function(event, page_num)
		{
			$("meta[name=current_page_no]").attr('content',page_num);

			$('meta[name=is_paginator_clicked]').attr("content",true);

			//Call AJAX for updating content
			if( ifDeviceIsMobile() )
			{
				generateMarkers( viewPortForMobile );
			}
			else
			{
				generateMarkers(map_div.gmap3("get").getBounds());
			}

			$('meta[name=is_paginator_clicked]').attr("content",false);
		});

	//Checkbox Checked Item Change Event
	$(':checkbox').change(function()
	{
		if( $(this).attr('sub_category_id') === "not_adailable")
		{	//If clicked on category
			$("input:checkbox[category_id='" + $(this).attr('category_id') + "']").prop('checked', $(this).prop("checked"));
		}
		else
		{	//If Clicked On sub-category
			if ( $("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id!='not_adailable']:checked").length == $("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id!='not_adailable']").length )
			{	//If all sub category are checked, then turn category checked
				$("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id='not_adailable']").prop('checked', true);
			}
			else
			{	//If all sub category are not checked, then turn category un-checked
				$("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id='not_adailable']").prop('checked', false);
			}
		}
		//AJAX call goes here - When a filter is changed
		if( ifDeviceIsMobile() )
		{
			generateMarkers( viewPortForMobile );
		}
		else
		{
			generateMarkers(map_div.gmap3("get").getBounds());
		}
	});

	//Range Slider
	$('.range-slider').jRange({
		from: 0,
		to: 1000,
		step: 1,
		scale: [0,100,200,300,400,500,600,700,800,900,"1000+"],
		format: '%s',
		width: 100,
		showLabels: false,
		isRange : true,
		ondragend: function (value)
		{
			//AJAX call goes here - When a filter is changed
			if( ifDeviceIsMobile() )
			{
				generateMarkers( viewPortForMobile );
			}
			else
			{
				generateMarkers(map_div.gmap3("get").getBounds());
			}
		}
	});

	//Sort Ordering Change AJAX
	$("#sort_ordering").change(function()
	{
		if( ifDeviceIsMobile() )
		{
			generateMarkers( viewPortForMobile );
		}
		else
		{
			generateMarkers(map_div.gmap3("get").getBounds());
		}
	});

	$("form#write_review").submit(function(e)
	{
		e.preventDefault();
		//Standerd AJAX call goes here
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
			type: "POST",
			url: $(this).attr('action'),
			data: $("#write_review").serialize(),
			contentType: "application/x-www-form-urlencoded",
			dataType: "html",
			success: function (data)
			{
				alert(data);
			},
			error: function (e)
			{
				console.log(e);
			},
			complete: function ()
			{
				// Handle the complete event
				alert("ajax completed ");
			}
		});  // end Ajax
	});
});

// Generate a list of Marker and call gmap3 clustering function From AJAX
function generateMarkers(bounds)
{
	pullPaginatorElementToFirstElement();
	//console.log(bounds);
	// generate AJAX - Start
	var list = [];
	var location={};
	location.lat_min = bounds.getSouthWest().lat();
	location.lat_max = bounds.getNorthEast().lat();
	location.lon_min = bounds.getSouthWest().lng();
	location.lon_max = bounds.getNorthEast().lng();

	//find all selected sub-categories
	var sub_categories = [];
	$("input[name='sub_category[]']:checked").each(function()
	{
		sub_categories.push($(this).val());
	});

	//AJAX Call to get points from server - Start
	$.ajax(
				{
					headers		:	{	'X-CSRF-TOKEN': $("meta[name=_token]").attr('content')	},
					url			:	$("meta[name=listing_map_ajax_url]").attr('content'),
					method		:	"POST",
					data	:
					{
						//Find Map Bounds
						lat_min			:	location.lat_min,
						lat_max			:	location.lat_max,
						lon_min			:	location.lon_min,
						lon_max			:	location.lon_max,
						//Find Paginator data
						current_page_no	:	$('meta[name=current_page_no]').attr("content"),
						content_per_page:	$('meta[name=content_per_page]').attr("content"),
						//Find Filter Data
						sort_ordering	:	$('#sort_ordering').val(),
						price_range_min	:	$('#price_range').val().split(",")[0],
						price_range_max	:	$('#price_range').val().split(",")[1],
						sub_categories	:	sub_categories
					},
					success: function(all_data)
					{
						//Clear the map markers
						map_div.gmap3({
							clear:
								{
									class: "markers"
								}
							});
						//Clear the listing elements
						$("#box").empty();
						//Generate List to insert data in map
						var list = [];

						//Finding the results and put them in map
						$.each(all_data, function(key, data)
						{
							if(key === 'showing_start')
							{
								$('#record_showing_start').html(data);
							}
							else if(key === 'showing_end')
							{
								$('#record_showing_end').html(data);
							}
							else if(key === 'total_element')
							{
								$('#total_match_found').html(data);
							}
							else if(key === 'total_page')
							{
								if(data===0)	//Setting paginator to 1 if nothing found
									$('#show_paginator').bootpag({total: 1});
								else
									$('#show_paginator').bootpag({total: data});
							}
							else if(key === 'current_page')
							{
								console.log('Current Page = '+data);
							}
							else if(key === 'data')
							{
								$.each(data, function(index, element)
								{
									//Insert into Box Elements
									var listing_element;
									if(element.user_image.length<4)
									{
										//alert(element.user_image);
										element.user_image='../images/empty-profile.jpg';
									}
									listing_element	=	'<div class="col-lg-4 col-sm-6"><div class="pos-rel"><a href="#" class="wsh-lst"><object type="image/svg+xml" data="'
														+ $('meta[name=svg_hearts]').attr("content")
														+ '"></object></a><div class="box showonmap9" marker_id='
														+	element.id
														+ '><div class="img-box-list"><img src="'
														+	$('meta[name=upload_folder_url]').attr("content")+element.advertisement_image
														+ '"></div><div class="box-content"><h5>'
														+	element.title
														+ '</h5><h6> $'+element.price+'</h6><div class="clearfix margin-bottom-ten"></div><img class="pull-left width-adj2" src="'
														+	$('meta[name=upload_folder_url]').attr("content")+element.user_image
														+ '"><div class="pull-left margin-left-ten width-adj3"><p class="pull-left dot1">'
														+	element.description
														+'<br></p></div></div></div></div></div>';
									$("#box").append(listing_element);
									/*=================================================*/
									list.push({
												latLng			:	[	element.lat,element.lon	],
												class			:	"markers",
												options			:
																	{
																		icon: "http://maps.google.com/mapfiles/marker_green.png",
																		//icon: "http://maps.google.com/mapfiles/marker_"+color+".png",
																		//animation: google.maps.Animation.BOUNCE
																	},
												id				: 	element.id,
												data			: 	{
																		title			:	element.title,
																		price			:	element.price,
																		title_image_url	:	$('meta[name=upload_folder_url]').attr("content")+element.advertisement_image,
																		description		:	element.description,
																		view_detail_url	:	'#'+element.id,
																		id				:	element.id
																	},
												events			:	{
																		click: function(marker, event, context)
																		{
																			//showAddDetail( context.id );		//Show ditail of listing
																			//###############	Animate Pointer
																			//marker.setAnimation(null);
																			//marker.setAnimation(google.maps.Animation.BOUNCE);

																			//###############	Now showing the infoWindow
																			var infoWindowContent = context.data.description;	//Will be generated from AJAX call
																			infoWindowContent =	'<div class="col-lg-4 col-sm-6 map-master-div">'
																								+	'<div class="pos-rel">'
																								+	'<a href="#" class="wsh-lst-infowindow">'
																								+		'<object type="image/svg+xml" data="'+$('meta[name=svg_hearts]').attr("content")+'"></object>'
																								+	'</a>'
																								+		'<div class="box">'
																								+			'<div class="img-box-list">'
																								+				'<img src="'+$('meta[name=info_window_img]').attr("content")+'">'
																								+			'</div>'
																								+			'<div class="box-content box-content-map">'
																								+				'<h5><div class="pull-center">'+context.data.title+'</div></h5>'
																								+				'<h6> $'+context.data.price+'</h6>'
																								+			'</div>'
																								+		'</div>'
																								+	'</div>'
																								+'</div>';

																			var	map = $(this).gmap3("get"),
																				infowindow = $(this).gmap3({get:{name:"infowindow"}});

																			if(infowindow)	//if infoWindow Exists - then show
																			{
																				infowindow.open(map, marker);
																				infowindow.setContent(infoWindowContent);
																			}
																			else			//if infoWindow not Exists - then crete and show
																			{
																				$(this).gmap3({
																						infowindow:
																							{
																								anchor	:	marker, 
																								options	:	{
																												content		: infoWindowContent,
																												maxWidth	: 350
																											}
																							}
																					});
																			}

																			//Managing InfoWindow Contents - Fixing Contents
																			setTimeout(function()
																			{
																				// Reference to the DIV which receives the contents of the infowindow using jQuery
																				var iwOuter = $('.gm-style-iw');

																				//Remove extra space behind infowindow
																				iwOuter.parent().width('20px');

																				/* The DIV we want to change is above the .gm-style-iw DIV.
																				* So, we use jQuery and create a iwBackground variable,
																				* and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
																				*/
																				var iwBackground = iwOuter.prev();

																				// Remove the background shadow DIV
																				iwBackground.children(':nth-child(2)').css({'display' : 'none'});

																				// Remove the white background DIV
																				iwBackground.children(':nth-child(4)').css({'display' : 'none'});

																				//Moving the map conotent - 115 px right
																				iwOuter.parent().parent().css({left: '30px'});

																				// Moves the shadow of the arrow 76px to the left margin 
																				iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 94px !important;'});

																				// Moves the arrow 76px to the left margin 
																				iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 94px !important;'});

																				// Changes the desired tail shadow color.
																				iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});


																			}, 10);
																		},
																		mouseout: function()
																		{
																			//$(this).gmap3({get:{name:"infowindow"}}).close();
																		}
																	}
											});
									/*=================================================*/
								});
							}
						});

						map_div.gmap3({
							marker:
								{
									values: list
								}
						});
						openLastInfoWindow();
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						console.log('AJAX Not Done Successfully');
					}
				});
	//AJAX Call to get points from server - END
	openLastInfoWindow();
}
/*
function onChangeOnOff()		//Turning on or off clustering
{
	if ($(this).is(":checked"))
	{
		map_div.gmap3({get:"clusterer"}).enable();
	}
	else
	{
		map_div.gmap3({get:"clusterer"}).disable();
	}
}
*/

function showAddDetail(id)		//Show Add Detail
{
	$.ajax(
	{
		headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
		method: "POST",
		url: $('meta[name=product_detail_ajax_url]').attr("content"),
		dataType: "json",
		data:
		{
			product_id	:	id
		},
		success:function(responce_data)
		{
			//$.parseJSON(responce_data)
			//console.log(responce_data);
			$.each(responce_data,function(key,value)
			{
				if(key.localeCompare('id')==0)
				{
					$('#write_review input[name="add_id"]').val(value);
				}
				else if(key.localeCompare('title')==0)
				{
					$("#selected_add_title").html(value);
				}
				else if(key.localeCompare('price')==0)
				{
					$("#selected_add_price").html(value);
				}
				else if(key.localeCompare('description')==0)
				{
					$("#selected_add_description").html(value);
				}
				/*else if(key.localeCompare('address')==0)
				{
					console.log('address - '+value);
				}*/
				else if(key.localeCompare('location_lat')==0)
				{
					$('#selected_add_direction').attr("location_lat",value);
				}
				else if(key.localeCompare('location_lon')==0)
				{
					$('#selected_add_direction').attr("location_lon",value);
				}
				else if(key.localeCompare('user')==0)
				{
					console.log('User Data Start');
					$.each(value,function(tag,user_data)
					{
						console.log(user_data);
					});
				}
				/*else if(key.localeCompare('advertisement_images')==0)
				{
					//console.log('Adverisement Image Data Start');
					$('.variable-width').empty('');
					$.each(value,function(id,image)
					{
						//$('.variable-width').prepend($('<div> new div </div>'));
						$('.variable-width').prepend(	'<div><img src="'+$('meta[name=upload_folder_url]').attr("content")+image.image_name+'"></div>');
						
						console.log(image.image_name);
					});
				}*/
				else if(key.localeCompare('total_views')==0)
				{
					$('#selected_add_view_count').attr("data-original-title",value);
				}
			});
		}
	});

	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').addClass("show");
}

function ifDeviceIsMobile()		//Check The Device Type
{
	return !($('#map').is(":visible"));
}

function closeAddDetail()		//Show Add Detail
{
	$('.ad-detail').hide("slow");
	$('.ad-listing').show("slow");
	$('.close-detail').removeClass("show");
}

function openInfoWindowByID(clicked_id)
{
	last_opened_info_window_id = clicked_id;
	google.maps.event.trigger(
								map_div.gmap3({
									get:
										{
											id: last_opened_info_window_id
										}
									})
								, 'click'
							);
}

function openLastInfoWindow()
{
	if(last_opened_info_window_id !== -1)
	{
		google.maps.event.trigger(
									map_div.gmap3({
										get:
											{
												id: last_opened_info_window_id
											}
										})
									, 'click'
								);
	}
}

function pullPaginatorElementToFirstElement()
{
	//We also can implement assuring only one AJAX call at a time from here by implementing locking like this and integrate that with `generateMarkers`
	if( $('meta[name=is_paginator_clicked]').attr("content") === 'false')
	{
		$('meta[name=current_page_no]').attr("content",1);
		$('#show_paginator').bootpag({page: 1});
	}
	else
	{
		console.log('Paginator Clicked');
	}
}