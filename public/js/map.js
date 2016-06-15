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
	$(".showonmap9").mouseover(function(event)
    {
    	//Will be done by ID
    	openInfoWindowByID( $(this).attr('marker_id') );
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
		}
		catch(error)
		{
		    console.log(error);
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
		console.log(event);
		console.log(page_num);
	});

	//Checkbox Checked Item Change Event
	$(':checkbox').change(function()
	{
		if( $(this).attr('sub_category_id') === "not_adailable")
		{
			$("input:checkbox[category_id='" + $(this).attr('category_id') + "']").prop('checked', $(this).prop("checked"));
		}
		else
		{
			if ( $("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id!='not_adailable']:checked").length == $("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id!='not_adailable']").length )
			{
				$("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id='not_adailable']").prop('checked', true);
			}
			else
			{
				$("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id='not_adailable']").prop('checked', false);
			}
		}

	});
});

/*
	//Refreshing the map if any new item available
	setInterval(function()
	{
		map_div.gmap3({
				clear:
					{
						class: "markers"
					}
			});

		generateMarkers(map_div.gmap3("get").getBounds());
	}, 30000);
*/

// Generate a list of Marker and call gmap3 clustering function From AJAX
function generateMarkers(bounds)
{
	// generate random list of Markers - Should come from AJAX - Start
		var southWest = bounds.getSouthWest(),
			northEast = bounds.getNorthEast(),
			lngSpan = northEast.lng() - southWest.lng(),
			latSpan = northEast.lat() - southWest.lat(),
			i, color, list = [];

		//find all selected categories
		var categories = [];
		$("input[name='category[]']:checked").each(function()
		{
			categories.push($(this).val());
		});

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
							southWest_lat	:	southWest.lat(),
							southWest_lon	:	southWest.lng(),
							northEast_lat	:	northEast.lat(),
							northEast_lon	:	northEast.lng(),
							//Find Filter Data
							sort_distance	:	$('#sort_disance').val(),
							price_range_min	:	$('#price_range').val().split(",")[0],
							price_range_max	:	$('#price_range').val().split(",")[1],
							categories		:	categories,
							sub_categories	:	sub_categories
						},
						success: function(result)
						{
							console.log(result);
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							console.log('AJAX Not Done Successfully');
						}
					});
		//AJAX Call to get points from server - END

		for (i = 0; i < 100; i++)
		{
			//color = colors[Math.floor(Math.random()*colors.length)];
			list.push({
						latLng			:	[
												southWest.lat() + latSpan * Math.random(),
												southWest.lng() + lngSpan * Math.random()
											],
						class			:	"markers",
						options			:
											{
												icon: "http://maps.google.com/mapfiles/marker_green.png",
												//icon: "http://maps.google.com/mapfiles/marker_"+color+".png",
												//animation: google.maps.Animation.BOUNCE
											},
						category		:	'cat_' + Math.abs(i%10+1).toString(),
						sub_category	:	'sub_cat_' + Math.abs(i%10+1).toString(),
						id				: 	i,
						data			: 	{
												title			:	'title',
												title_image_url	:	'images/p-favicon.jpg',
												description		:	'description',
												view_detail_url	:	'#asd',
												id				:	i
											},
						tag				: 	'tag_' + Math.abs(i%10+1).toString(),
						events			:	{
												click: function(marker, event, context)
												{
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
																		+				'<h5><div class="pull-center">Iphone</div></h5>'
																		+				'<h6> $500</h6>'
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
		}
	// generate random list of Markers - Should come from AJAX - END

	//Show Markers on Map
	map_div.gmap3({
		marker:
			{
				values: list,
				/*cluster: 				//Cluster styling and config
					{
						radius: 100, 
							// This style will be used for clusters with more than 0 markers
							0: {
							  content: '<div class="cluster cluster-1">CLUSTER_COUNT</div>',
								width: 53,
								height: 52
							},
							// This style will be used for clusters with more than 20 markers
							20: {
								content: '<div class="cluster cluster-2">CLUSTER_COUNT</div>',
								width: 56,
								height: 55
							},
							// This style will be used for clusters with more than 50 markers
							50: {
								content: '<div class="cluster cluster-3">CLUSTER_COUNT</div>',
								width: 66,
								height: 65
							},
							events:
							{
								click	:	function(overlay, event, context)
											{
												var curent_map = $(this).gmap3('get');
												curent_map.setCenter(	new google.maps.LatLng(
																									context.data.latLng.lat(),
																									context.data.latLng.lng()
																								));		//changing center of the map
												curent_map.setZoom( curent_map.getZoom()+1 ); 									//Increasing zoom -> Zoom In
											}
							}
					}*/
			}
	});
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

function showDetail(id)		//Turning on or off clustering
{
	//alert(id);
	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').toggleClass("show");
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