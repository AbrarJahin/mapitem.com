//General Config
var map_div = $('#map');
var last_opened_info_window_id = -1;				//For solving infowindow lost issue after AJAX call done
//var last_opened_infowindow;

// generate an array of colors
//var colors = "black brown green purple yellow grey orange white".split(" ");

// on document ready function
$(function()
{
	//On Mouseover Map InfoWindow Pop Up
	$(".showonmap9").on("mouseover", function()
	{
		openInfoWindowByID( $(this).attr('marker_id') );
	});

	//Open add
	$('.showonmap9').on("click", function()
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
						}/*,
			onces	:	{
							bounds_changed: function()
							{
								generateMarkers(map_div.gmap3("get").getBounds());
							}
						}*/
		}
	});

	//Close All Infowindow by clicking inside map
	google.maps.event.addListener(map_div.gmap3("get"), "click", function(event)
	{
		try
		{
			map_div.gmap3({get:{name:"infowindow"}}).close();
			closeAddDetail();
		}
		catch(error)
		{
		    console.log('Map Info Window is not opened yet for single time, so it is not initialized yet');
		}
	});

	//Call AJAX Call from Here
	google.maps.event.addListener(map_div.gmap3("get"), "idle", function(event)
	{
		generateMarkers(map_div.gmap3("get").getBounds());
	});

	//Pagination
	$('#show_paginator').bootpag({
	       total			:	$('meta[name=total_no_of_pages]').attr("content"),
	       page				:	$('meta[name=current_page_no]').attr("content"),
	       maxVisible		:	$('meta[name=max_visible]').attr("content"),
	       leaps			:	true,
	       firstLastUse		:	true,
	       first			:	'←',
	       last				:	'→',
	       wrapClass		:	'pagination',
	       activeClass		:	'active',
	       disabledClass	:	'disabled',
	       nextClass		:	'next',
	       prevClass		:	'prev',
	       lastClass		:	'last',
	       firstClass		:	'first'
	}).on('page', function(event, page_num)
		{
			//console.log(page_num);
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
		//AJAX call goes here
		generateMarkers(map_div.gmap3("get").getBounds());
	});
});

// Generate a list of Marker and call gmap3 clustering function From AJAX
function generateMarkers(bounds)
{
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
							//Find Filter Data
							sort_distance	:	$('#sort_disance').val(),
							price_range_min	:	$('#price_range').val().split(",")[0],
							price_range_max	:	$('#price_range').val().split(",")[1],
							//categories		:	categories,
							sub_categories	:	sub_categories
						},
						success: function(data)
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
							$.each(data, function(index, element)
							{
								//Insert into Box Elements
								var listing_element;
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
																		showAddDetail( context.id );		//Show ditail of listing
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
	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').addClass("show");
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