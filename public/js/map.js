/*General Config*/
var map_div = $('#map');
var last_opened_info_window_id = -1;				/*For solving infowindow lost issue after AJAX call done*/
var viewPortForMobile;
var firstTimeNotAlreadyViewed = true;
var currentView='G';


var infoBubble = new InfoBubble({
							maxWidth: 300,
							maxHeight:227,
							padding:0,
							disableAutoPan: true
						});

/*var last_opened_infowindow;*/

/* on document ready function*/
$(function()
{
	/*Link GeoComplete to Map*/
	$("#user_location").geocomplete().bind("geocode:result", function(event, result)
	{
		if( ifDeviceIsMobile() )
		{
			/*If there is no map*/
			viewPortForMobile=result.geometry.viewport;
			generateMarkers( viewPortForMobile );
		}
		map_div.gmap3('get').setCenter(result.geometry.location);		/*Set Center*/
		/*map_div.gmap3('get').fitBounds(result.geometry.viewport);*/		/*Set Autometic Zoom*/
	});

	/*On Mouseover Map InfoWindow Pop Up*/
	$(document).on("mouseenter", ".showonmap9", function(e)
	{
		openInfoWindowByID( $(this).attr('marker_id') );
	});

	/*Open add*/
	$(document).on("click", ".showonmap9", function(e)
	{
		var product_id = $(this).attr('marker_id');
		openInfoWindowByID( product_id );
		showAddDetail( product_id );
	});

	/*Close add*/
	$('.close-detail').click(function()
	{
		window.location.hash = '';
		closeAddDetail();
	});

	/*Offer Submit Button Pressed*/
	$("#offer_submit_button").click(function()
	{
		$.ajax(
		{
			headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
			method: "POST",
			url: $("#offer_send_form").attr('action'),
			dataType: "json",
			data: $("#offer_send_form").serialize(),
			success:function(responce_data)
			{
				alert('Your offer has been Sent !');
				$('#offer_send_form')[0].reset();		/*reset form data*/
				$('[data-toggle="dropdown"]').parent().removeClass('open');
			},
			error: function(xhr, textStatus, errorThrown)
			{
				if(xhr.responseJSON.error[0].length>10)
				{
					alert(xhr.responseJSON.error[0]);
				}
				else
				{
					alert("Network error");
				}
				$('#offer_send_form')[0].reset();		/*Reset form data*/
			}
		});
	});

	/*Change any category*/
	$("#category_filter input[type=checkbox]").change(function()
	{
		/* first : create an object where keys are colors and values is true (only for checked objects)*/
		var checkedData = {};
		$("#category_filter input[type=checkbox]:checked").each(function(i, chk)
		{
			checkedData[$(chk).attr("name")] = true;
		});

		/* set a filter function using the closure data "checkedData"
		map_div.gmap3({get:"clusterer"}).filter(function(data)
		{
			return data.category in checkedData;
		});*/
	});

	/* create gmap3 and call the marker generation function  */
	map_div.gmap3({
		map:{
			options	:	{
							navigationControl	: false,
							scrollwheel			: true,
							streetViewControl	: false,
							mapTypeControl		: false,
							zoom				: 12,
							center				: new google.maps.LatLng(latitude,longitude),
							mapTypeId			: google.maps.MapTypeId.TERRAIN	/*ROADMAP , SATELLITE , HYBRID , TERRAIN*/
						}
		}
	});

	if($('#map_lon_min').val().length>0)
	{
		/*Reset the viewport of the map from data found from previous page*/
		var strictBounds = new google.maps.LatLngBounds(
									new google.maps.LatLng(
																$('#map_lat_min').val(),
																$('#map_lon_max').val()
															),/* top left corner of map*/
									new google.maps.LatLng(
																$('#map_lat_max').val(),
																$('#map_lon_min').val()
															)/* bottom right corner*/
								);
		map_div.gmap3('get').fitBounds(strictBounds);
	}

	/*Close All Infowindow by clicking inside map*/
	google.maps.event.addListener(map_div.gmap3("get"), "click", function(event)
	{
		try
		{
			/*map_div.gmap3({get:{name:"InfoBubble"}}).close();*/
			infoBubble.close();
			last_opened_info_window_id=-1;
			closeAddDetail();
		}
		catch(error)
		{
			/*console.log('Map Info Window is not opened yet for single time, so it is not initialized yet');*/
		}
	});

	google.maps.event.addListenerOnce(map_div.gmap3("get"), 'tilesloaded', function()
	{
		/*this part runs when the mapobject shown for the first time*/
		if(map_div.gmap3('get').getZoom()>12)
		{
			map_div.gmap3('get').setZoom(12);
		}
	});

	/*Call AJAX Call from Here - When Map comes to a stable position of when map loads (it actually calls every time map get idle)*/
	google.maps.event.addListener(map_div.gmap3("get"), "idle", function(event)
	{
		if(firstTimeNotAlreadyViewed)
		{
			/*This can be done with titleloaded event, but that is called after this event called, so have to do this in this way*/
			firstTimeNotAlreadyViewed = false;
			/*Set the category and sub category parameters passed from home page click event*/
			var hashString = location.hash.substr(1);
			if(hashString.length>0 && isNaN(hashString))
			{
				if(!isNaN(location.hash.substr(13)))
				{
					$("input:checkbox").prop('checked', false);
					/*category_id*/
					$("input:checkbox[category_id='" + location.hash.substr(13) + "']").prop('checked', true);
				}
				else if(!isNaN(location.hash.substr(17)))
				{
					$("input:checkbox").prop('checked', false);
					/*sub_category_id*/
					$("input:checkbox[sub_category_id='"+location.hash.substr(17)+"']").prop('checked', true);
				}
			}
		}

		if( ifDeviceIsMobile() )
		{
			if(viewPortForMobile == undefined)		/*It will be just called 1 time when map loads*/
			{
				/*
				 *	From http://www.movable-type.co.uk/scripts/latlong.html
				 *	and http://andrew.hedges.name/experiments/haversine/
				 *	we get -
				 *			lat distance 1 = 69.132 miles
				 *			lon distance 1 = 52.958 miles
				 */
				/*Mobile viewport is set to 50 miles*/
				var lat_tuned_map_area = 50/2/69.132;
				var lon_tuned_map_area = 50/2/52.958;
				viewPortForMobile = new google.maps.LatLngBounds(
																	new google.maps.LatLng(latitude-lat_tuned_map_area, longitude-lon_tuned_map_area),
																	new google.maps.LatLng(latitude+lat_tuned_map_area, longitude+lon_tuned_map_area)
																);
				generateMarkers(viewPortForMobile);
			}
			else
			{
				/*console.log('Mobile fake Map already initialized');*/
			}
		}
		else
		{
			generateMarkers(map_div.gmap3("get").getBounds());
		}
	});

	/*Pagination*/
	$('#show_paginator').bootpag({
			total			:	$('meta[name=total_no_of_pages]').attr("content"),
			page				:	$('meta[name=current_page_no]').attr("content"),
			maxVisible		:	$('meta[name=max_visible]').attr("content"),
			leaps			:	true,
			/*
			firstLastUse		:	true,
			first			:	'←',
			last				:	'→',
			*/
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

			/*Call AJAX for updating content*/
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

	/*
	Search Input Change Event
	$("#input_nav_search").on("input", function(e)
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
	*/

	/*Checkbox Checked Item Change Event*/
	$("#category_filter :checkbox").on('change',function ()
	{
		if( $(this).attr('sub_category_id') === "not_available")
		{	/*If clicked on category*/
			$("input:checkbox[category_id='" + $(this).attr('category_id') + "']").prop('checked', $(this).prop("checked"));
		}
		else
		{	/*If Clicked On sub-category*/
			if ( $("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id!='not_available']:checked").length == $("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id!='not_available']").length )
			{	/*If all sub category are checked, then turn category checked*/
				$("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id='not_available']").prop('checked', true);
			}
			else
			{	/*If all sub category are not checked, then turn category un-checked*/
				$("input:checkbox[category_id='" + $(this).attr('category_id') + "'][sub_category_id='not_available']").prop('checked', false);
			}
		}
		/*AJAX call goes here - When a filter is changed*/
		if( ifDeviceIsMobile() )
		{
			generateMarkers( viewPortForMobile );
		}
		else
		{
			generateMarkers(map_div.gmap3("get").getBounds());
		}
	});

	/*Range Slider*/
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
			/*AJAX call goes here - When a filter is changed*/
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

	/*Sort Ordering Change AJAX*/
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
		var ifValid = true;
		if( $("#write_review textarea[name=review]").val().length<10 )
		{
			ifValid = false;
			console.log("Comment Length = "+$("#write_review textarea[name=review]").val());
		}
		else if($("#write_review [name=rating]").val()<1 || $("#write_review [name=rating]").val()>5)
		{
			ifValid = false;
			console.log("Rating Value = "+$("#write_review [name=rating]").val());
		}
		if(ifValid)
		{
			/*Standerd AJAX call goes here*/
			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
				type: "POST",
				url: $(this).attr('action'),
				data: $("#write_review").serialize(),
				contentType: "application/x-www-form-urlencoded",
				dataType: "json",
				success: function (data)
				{
					var rating_html = '';

					for (var i = 0; i < data.rating; i++)	/*Green*/
					{
						rating_html = rating_html+'<i class="fa fa-star fa-xs green-text"></i>';
					}
					for (var i = data.rating; i < 5; i++)	/*Blank*/
					{
						rating_html = rating_html+'<i class="fa fa-star-o fa-xs"></i>';
					}

					var html_element	=	'<div class="col-lg-4 rone">'
											+	data.user_name+'<br>'
											+		rating_html
											+	'<br/><span>'+data.time+'</span>'
											+'</div>'
											+'<div class="col-lg-8 rtwo">'
											+	'<span>'+data.review+'</span>'
											+'</div>'
											+'<div class="clearfix margin-twenty"></div>';
					$('.reviews').prepend(html_element);
					$('.review').fadeOut();
				},
				error: function (e)
				{
					/*console.log(e);*/
					if ($("#lgn-pup").length === 0)
						alert('You are not eligible to give this review');
					else
						$('#lgn-pup').modal('show');
						
				},
				complete: function ()
				{/* Handle the complete event*/
					$("#wait").css("display", "none");
				}
			});
		}
		else
		{
			alert("Please give a rating and write a comment having leangth at least 10 charecters !");
		}
	});

	$("form#send_message_to_owner").submit(function(e)
	{
		e.preventDefault();
		/*Standerd AJAX call goes here*/
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
			type: "POST",
			url: $(this).attr('action'),
			data: $("#send_message_to_owner").serialize(),
			/*contentType: "application/x-www-form-urlencoded",*/
			dataType: "json",
			success: function (data)
			{
				/*alert(data);*/
				alert('Your message has been Sent !');
				$('#send_message_to_owner')[0].reset();		/*Reset form data*/
				$(".sb-bottom").removeClass("open");
			},
			error: function(xhr, textStatus, errorThrown)
			{
				if(xhr.responseJSON.length>10)
				{
					alert(xhr.responseJSON);
				}
				else
				{
					alert("Network error");
				}
				$('#send_message_to_owner')[0].reset();		/*Reset form data*/
			}
		});
	});

	/*open page on page load for sharing data*/
	var hashString = location.hash.substr(1);
	if(hashString.length>0)
	{
		setTimeout(function()
		{
			/*Should decide if it is a ID or category or sub category, then need to act like that*/
			if(hashString.indexOf("sub_category_id") >= 0)	/*Sub Category is selected*/
			{
				var subCategoryId = hashString.match(/\d+/)[0];
				$('[sub-category-id="' + subCategoryId + '"]').trigger('click');
			}
			else if(hashString.indexOf("category_id") >= 0)	/*Category is selected*/
			{
				var categoryId = hashString.match(/\d+/)[0];
				$('[category-id="' + categoryId + '"]').trigger('click');
			}
			else	/*Advertisement is selected*/
			{
				var adId = hashString.match(/\d+/)[0];
				openInfoWindowByID( adId );
				showAddDetail( adId );
			}
		}, 1500);
	}

	/*Sort element by nav subcategory items click*/
	$(".nav-sub-category, .nav-category").click(function(e)
	{
		e.preventDefault();

		/*Clear all checkbox elements*/
		$('#category_filter').find(':checkbox').each(function()
		{
			$(this).prop('checked',false);
		});

		clearMarkers();
		$('#record_showing_start').html('0');
		$('#record_showing_end').html('0');

		if($(this).attr("class")=="nav-sub-category")	/*Sub-category*/
		{
			$('#category_filter').find("[sub_category_id='"+$(this).attr('sub-category-id')+"']").trigger( "click" );
		}
		else	/*Category*/
		{
			$('#category_filter').find("[category_id='"+$(this).attr('category-id')+"']").prop('checked', true);
			$('#category_filter').find("[category_id='"+$(this).attr('category-id')+"']").trigger('click');
		}
	});
});

/* Generate a list of Marker and call gmap3 clustering function From AJAX*/
function generateMarkers(bounds)
{
	pullPaginatorElementToFirstElement();
	/*console.log(bounds);*/
	/* generate AJAX - Start*/
	var list = [];
	var location={};
	try
	{
		location.lat_min = bounds.getSouthWest().lat();
		location.lat_max = bounds.getNorthEast().lat();
		location.lon_min = bounds.getSouthWest().lng();
		location.lon_max = bounds.getNorthEast().lng();
	}
	catch(err)
	{
		console.error("Element not called");
		console.error(err);
		return;
	}

	/*find all selected sub-categories*/
	var sub_categories = [];
	$("input[name='sub_category[]']:checked").each(function()
	{
		sub_categories.push($(this).val());
	});

	/*AJAX Call to get points from server - Start*/
	$.ajax(
				{
					headers		:	{	'X-CSRF-TOKEN': $("meta[name=_token]").attr('content')	},
					url			:	$("meta[name=listing_map_ajax_url]").attr('content'),
					method		:	"POST",
					data	:
					{
						/*Find Map Bounds*/
						lat_min			:	location.lat_min,
						lat_max			:	location.lat_max,
						lon_min			:	location.lon_min,
						lon_max			:	location.lon_max,
						/*Find Paginator data*/
						current_page_no	:	$('meta[name=current_page_no]').attr("content"),
						content_per_page:	$('meta[name=content_per_page]').attr("content"),
						/*Find Filter Data*/
						sort_ordering	:	$('#sort_ordering').val(),
						price_range_min	:	$('#price_range').val().split(",")[0],
						price_range_max	:	$('#price_range').val().split(",")[1],
						sub_categories	:	sub_categories,
						search_value	:	$('#input_nav_search').val()
					},
					success: function(all_data)
					{
						fixInfowindowScroll();
						clearMarkers();
						/*Generate List to insert data in map*/
						var list = [];

						/*Finding the results and put them in map*/
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
								if(data===0)	/*Setting paginator to 1 if nothing found*/
									$('#show_paginator').bootpag({total: 1});
								else
									$('#show_paginator').bootpag({total: data});
							}
							else if(key === 'current_page')
							{
								/*console.log('Current Page = '+data);*/
							}
							else if(key === 'data')
							{
								$.each(data, function(index, element)
								{
									if(element.advertisement_image == null)
									{
										element.advertisement_image = "../images/not_available_1.png";
									}
									/*Insert into Box Elements*/
									var listing_element;
									if( element.user_image != null && element.user_image.length <4)
									{
										/*alert(element.user_image);*/
										element.user_image='../images/empty-profile.jpg';
									}
									//changes by bilal bhai ka dpost muaaz
									if(currentView=='G')
									{
										  childrenClass='col-lg-4 col-sm-6';
									}else{
										 childrenClass='';
									}
									listing_element	=	'<div class="'+childrenClass+'"><div class="pos-rel"><a href="#" add_id="'+element.id+'" 											                                                          class="add_to_wishlist wsh-lst"><img src="'
														/*+ $('meta[name=svg_hearts]').attr("content")*/
														+ element.hearts_image
														+ '"></img></a><div class="box showonmap9" marker_id='
														+	element.id
														+ '><div class="img-box-list"><img src="'
														+	$('meta[name=upload_folder_url]').attr("content")+element.advertisement_image
														+ '"></div><div class="box-content"><h5 class="text-center">'
														+	element.title
														+ '</h5><h6> $'+element.price+'</h6><div class="clearfix margin-bottom-ten"></div><img height="46"                                                           width="46" class="pull-left width-adj2" src="'
														+	$('meta[name=upload_folder_url]').attr("content")+element.user_image
														+ '"><div class="pull-left margin-left-ten width-adj3"><p class="pull-left dot1">'
														+	element.description
														+'<br></p></div></div></div></div></div>';
									$("#box").append(listing_element);

									list.push({
												latLng			:	[	element.lat,element.lon	],
												class			:	"markers",
												options			:
																	{
																		icon: "http://maps.google.com/mapfiles/marker_green.png",
																		/*
																		icon: "http://maps.google.com/mapfiles/marker_"+color+".png",
																		animation: google.maps.Animation.BOUNCE
																		*/
																	},
												id				: 	element.id,
												data			: 	{
																		title			:	element.title,
																		price			:	element.price,
																		title_image_url	:	$('meta[name=upload_folder_url]').attr("content")+element.advertisement_image,
																		description		:	element.description,
																		view_detail_url	:	'#'+element.id,
																		id				:	element.id,
																		hearts_image	:	element.hearts_image
																	},
												events			:	{
																		click: function(marker, event, context)
																		{
																			/*###############	Now showing the infoWindow*/
																			var infoWindowContent = context.data.description;	/*Will be generated from AJAX call*/
																			infoWindowContent =	'<div class="map-master-div" onclick="showAddDetail('+context.data.id+')">'
																								+	'<div class="pos-rel">'
																								+	'<a href="#" onclick="addToWisList('+context.data.id+',this)" class="add_to_wishlist wsh-lst-infowindow">'
																								+		'<img src="'
																											/*+	$('meta[name=svg_hearts]').attr("content")*/
																											+	context.data.hearts_image
																										+'"></img>'
																								+	'</a>'
																								+		'<div class="box">'
																								+			'<div class="img-box-list info-image-box">'
																								+				'<img class="infowindow-image" src="'
																														+$('meta[name=upload_folder_url]').attr("content")+element.advertisement_image
																														+'">'
																								+			'</div>'
																								+			'<div class="box-content box-content-map">'
																								+				'<h5><div class="pull-center">'+context.data.title+'</div></h5>'
																								+				'<h6> $'+context.data.price+'</h6>'
																								+			'</div>'
																								+		'</div>'
																								+	'</div>'
																								+'</div>';

																			var	map = $(this).gmap3("get");

																			infoBubble.close();
																			infoBubble.setContent(infoWindowContent);

																			infoBubble.open(map, marker);

																			fixInfowindowScroll();

																			last_opened_info_window_id=context.data.id;
																		},
																		mouseout: function()
																		{
																			/*$(this).gmap3({get:{name:"infowindow"}}).close();*/
																		}
																	}
											});
									/*=================================================*/
								});
							}
							else if(key === 'categories')	/*hide and show categories and sub categories*/
							{
								$('span[categoryCount]').html("0");	/*Put all category value = 0*/
								$('#category_filter span[categoryCount]').parent().parent().addClass('hidden-menu-item');	/*Hide all element*/
								$.each(data, function(index, element)
								{
									$('span[categoryCount="'+element.category_id+'"]').html(element.count);
									$('#category_filter span[categoryCount="'+element.category_id+'"]').parent().parent().removeClass('hidden-menu-item');
								});
							}
							else if(key === 'sub-categories')	/*hide and show categories and sub categories*/
							{
								$('span[subCategoryCount]').html("0");	/*Put all sub-category value = 0*/
								$('#category_filter span[subCategoryCount]').parent().parent().addClass('hidden-menu-item');	/*Hide all sub-category*/
								$.each(data, function(index, element)
								{
									$('span[subCategoryCount="'+element.sub_category_id+'"]').html(element.count);
									$('#category_filter span[subCategoryCount="'+element.sub_category_id+'"]').parent().parent().removeClass('hidden-menu-item');
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
	/*AJAX Call to get points from server - END*/
	openLastInfoWindow();
}

function showAddDetail(id)		/* Show ad Detail */
{
	window.location.hash = '#'+id;	/* Add hash in URL */
	if(is_wishlist_propagated)
		return;
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
			$.each(responce_data,function(index_key,value_all_json)
			{
				if(index_key.localeCompare('advertisement')==0)
				{
					$.each(value_all_json,function(key,value)
					{
						if(key.localeCompare('id')==0)
						{
							$('#write_review input[name="add_id"]').val(value);
							$('#selected_add_id').val(value);
							$('#offer_selected_add_id').val(value);	/*For Sending Offer*/
						}
						else if(key.localeCompare('is_reviewed')==0)
						{
							if(value==1)
								$('.review').hide();
							else
								$('.review').show();
						}
						else if(key.localeCompare('is_wishlisted')==0)
						{
							if(value==1)	/*Added to wishlist*/
							{
								$('img.add_detail').attr(
																'src',
																$('meta[name=filleds_heart_svg]').attr("content")
															);
							}
							else	/*Not added to wishlist*/
							{
								$('img.add_detail').attr(
																'src',
																$('meta[name=svg_hearts]').attr("content")
															);
							}
						}
						else if(key.localeCompare('is_offer_sent')==0)
						{
							if(value==0)
								$("#offer_send_warning").hide();
							else
								$("#offer_send_warning").show();
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
						else if(key.localeCompare('address')==0)
						{
							$('#selected_add_direction').attr("address",value);
						}
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
							$.each(value,function(tag,user_data)
							{
								console.log(user_data);
							});
						}
						else if(key.localeCompare('advertisement_images')==0)
						{
							/*Remove Previous Slider*/
							$('.variable-width').slick('unslick');
							$('.variable-width').empty();

							if(value != null && value.length>0)
							{
								$.each(value,function(id,image)
								{
									$('.variable-width').prepend(	'<div><img data-lazy="'+$('meta[name=upload_folder_url]').attr("content")+image.image_name+	                                     '"></div>');
								});
							}
							else
							{
								$('.variable-width').prepend(	'<div><img data-lazy="'+$('meta[name=base_url]').attr("content")+"/images/not_available_2.png"+                                      '"></div>');
							}

							fixImageSlider(value.length);

							/*Re Initialize Slick Slider so that images can be OK*/
							//$('.variable-width').slick( getSliderSettings() );
							if(value.length>1){
								$('.variable-width').slick( getSliderSettings() );
							}else{
								$('.variable-width').slick( getSingleImageSliderSettings() );
							}	
						}
						else if(key.localeCompare('total_views')==0)
						{
							$('#selected_add_view_count').attr("data-original-title",value);
						}
						else if(key.localeCompare('avg_rating')==0)
						{
							/*Showing The Dynamic user Rating
							  value_all_json.user_rating*/
							$('#add_rating').empty();
							/*Green Star*/
							for (i = 0; i < Math.round(value); i++)
							{
								$('#add_rating').append('<i class="fa fa-star green-text"></i>');
							}
							/*White Star*/
							for (i = Math.round(value); i < 5; i++)
							{
								$('#add_rating').append('<i class="fa fa-star-o"></i>');
							}
						}
					});
				}
				else if(index_key.localeCompare('reviews')==0)
				{
					$('.reviews').empty();
					$.each(value_all_json,function(index,review)
					{
						var review_data	=	new Object();
						$.each(review,function(key,value)
						{
							if(key.localeCompare('added_on')==0)
							{
								review_data.added_on = formatTime(convertToLocalTime(value));
							}
							else if(key.localeCompare('rating')==0)
								review_data.rating = value;
							else if(key.localeCompare('review')==0)
								review_data.review = value;
							else if(key.localeCompare('user_name')==0)
								review_data.user_name = value;
						});
						/***********************/
						var rating_html = '';
						for (var i = 0; i < review_data.rating; i++)	/*Green*/
						{
							rating_html = rating_html+'<i class="fa fa-star fa-xs green-text"></i>';
						}
						for (var i = review_data.rating; i < 5; i++)	/*Blank*/
						{
							rating_html = rating_html+'<i class="fa fa-star-o fa-xs"></i>';
						}

						var html_element	=	'<div class="col-lg-4 rone">'
												+	review_data.user_name+'<br>'
												+		rating_html
												+	'<br/><span>'+review_data.added_on+'</span>'
												+'</div>'
												+'<div class="col-lg-8 rtwo">'
												+	'<span>'+review_data.review+'</span>'
												+'</div>'
												+'<div class="clearfix margin-twenty"></div>';
						$('.reviews').append(html_element);
					});
				}
				else if(index_key.localeCompare('add_owner')==0)
				{
					/*Offer Sending*/
					$("#offer_add_owner_name").html(value_all_json.user_name);
					$("#offer_add_owner_email").html(value_all_json.email);
					$("#offer_add_owner_cell").html(value_all_json.cell_no);

					/*Ad Detail*/
					$("#add_owner_image").attr("src",value_all_json.profile_picture);
					$("#add_owner_name").html(value_all_json.user_name);

					$("#add_owner_phone").html("<i class='fa fa-phone'></i> <a href='tel:"+value_all_json.cell_no+"''>"+value_all_json.cell_no+"</a>");
					$("#add_owner_website").html("<i class='fa fa-globe'></i> <a href='"+value_all_json.website+"''>"+value_all_json.website+"</a>");
					$("#add_owner_email").html("<i class='fa fa-envelope'></i> <a href='mailto:"+value_all_json.email+"''>"+value_all_json.email+"</a>");
					if(value_all_json.fb_verification_status == "not_verified")
						$("#add_owner_fb_status").html('<i class="fa fa-facebook"></i>'+'Facebook Not Verified');
					else
						$("#add_owner_fb_status").html('<i class="fa fa-facebook"></i>'+'<i class="fa fa-check-circle p-adj"></i>'+'<a href="#">Facebook Verified</a>');

					$("#add_owner_id").val(value_all_json.user_id);								/*For Sending Message*/
					$("#offer_add_owner_id").val(value_all_json.user_id);								/*For Sending Message During Offer Send*/

					$('#write_review input[name="add_owner_id"]').val(value_all_json.user_id);	/*For Review Writing*/

					/*Showing The Dynamic user Rating
					  value_all_json.user_rating*/
					$('#add_owner_rating').empty();
					/*Green Star*/
					for (i = 0; i < value_all_json.user_rating; i++)
					{
						$('#add_owner_rating').append('<i class="fa fa-star green-text"></i>');
					}
					/*White Star*/
					for (i = value_all_json.user_rating; i < 5; i++)
					{
						$('#add_owner_rating').append('<i class="fa fa-star-o"></i>');
					}
				}
			});

			/*Update share buttons*/
			$("#fb_share").attr("href", $('meta[name=fb_share_url]').attr("content")+"%23"+id);
			$("#tw_share").attr("href", $('meta[name=tw_share_url]').attr("content")+"%23"+id);
			$("#gp_share").attr("href", $('meta[name=gp_share_url]').attr("content")+"%23"+id);

			/*Draw Directions in map*/
			var mapDirectionUrl = "https://www.google.com/maps/dir//"
									+ $('#selected_add_direction').attr("address")
									+ "/@"
									+ $('#selected_add_direction').attr("location_lat")
									+ ","
									+ $('#selected_add_direction').attr("location_lon");
			$('#selected_add_direction').attr("href", mapDirectionUrl);
		}
	});

	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').addClass("show");
	$('.variable-width').slick( getSliderSettings() );
}

function ifDeviceIsMobile()		/*Check The Device Type*/
{
	return !($('#map').is(":visible"));
}

function closeAddDetail()		/*Show ad Detail*/
{
	$('.ad-detail').hide("slow");
	$('.ad-listing').show("slow");
	$('.close-detail').removeClass("show");
	clearPrevRoutes();
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
	fixInfowindowScroll();
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
	/*We also can implement assuring only one AJAX call at a time from here by implementing locking like this and integrate that with `generateMarkers`*/
	if( $('meta[name=is_paginator_clicked]').attr("content") === 'false')
	{
		$('meta[name=current_page_no]').attr("content",1);
		$('#show_paginator').bootpag({page: 1});
	}
	else
	{
		/*console.log('Paginator Clicked');*/
	}
}

function getSingleImageSliderSettings(){

	return {
		infinite: true,
		//centerPadding: '60px',
		slidesToShow: 4,
		speed: 300,
		variableWidth: true,
		centerMode   : true,
		dots   : true,
	}
}


function getSliderSettings()
{
	return {
		infinite: true,
		//centerPadding: '60px',
		slidesToShow: 4,
		speed: 300,
		variableWidth: true,
		//centerMode   : true,
		dots   : true,
	}
}

$('.variable-width').on('beforeChange', function(event, slick, currentSlide, nextSlide){
  //console.log('beforeChange', currentSlide, nextSlide);
  // $(".slick-current").removeClass("high-light");
  // $(".slick-current").addClass("normal");
  //console.log($( ".slick-slide[data-slick-index='"+nextSlide+"']" ));
  var nextSlick = $( ".slick-slide[data-slick-index='"+nextSlide+"']" );
  // nextSlick.addClass("high-light");
  // nextSlick.removeClass("normal");
});

$('.variable-width').on('afterChange', function(event, slick, currentSlide){
  //console.log('afterChange', currentSlide);
  //$(".slick-current").addClass("high-light");
  //$(".slick-current").removeClass("normal");
});
//setTimeout(()=>{
  //console.log($(".slick-current"));
  // $(".slick-current").removeClass("normal");
  // $(".slick-current").addClass("high-light");
  //$('.variable-width').slick('setPosition');
//}, 100);


function fixInfowindowScroll()
{
	setTimeout(function()
	{
		$(".map-master-div").parent().parent().attr("style", "overflow: hidden; cursor: default; clear: both; position: relative; padding: 0px; background-color: rgb(255, 255, 255); border-color: rgb(204, 204, 204); border-style: solid; border-radius: 10px; border-width: 1px; width: 300px; height: 227px;");
		/*$(".map-master-div").parent().parent().css("overflow", "hidden");*/
		$(".map-master-div").css("width", "100%");
	}, 100);

	setTimeout(function()
	{
		$(".map-master-div").parent().parent().attr("style", "overflow: hidden; cursor: default; clear: both; position: relative; padding: 0px; background-color: rgb(255, 255, 255); border-color: rgb(204, 204, 204); border-style: solid; border-radius: 10px; border-width: 1px; width: 300px; height: 227px;");
		/*$(".map-master-div").parent().parent().css("overflow", "hidden");*/
		$(".map-master-div").css("width", "100%");
	}, 200);

	setTimeout(function()
	{
		$(".map-master-div").parent().parent().attr("style", "overflow: hidden; cursor: default; clear: both; position: relative; padding: 0px; background-color: rgb(255, 255, 255); border-color: rgb(204, 204, 204); border-style: solid; border-radius: 10px; border-width: 1px; width: 300px; height: 227px;");
		/*$(".map-master-div").parent().parent().css("overflow", "hidden");*/
		$(".map-master-div").css("width", "100%");
	}, 400);
}

function fixImageSlider(count)
{
	$('.listing-right').scrollTop(0);	/*Scroll al elements to top after image reloaded*/

	setTimeout(function()
	{
		$('.variable-width').slick('unslick');
		if(count>1){
			$('.variable-width').slick( getSliderSettings() );
		}else{
			$('.variable-width').slick( getSingleImageSliderSettings() );
		}	
		
		
	}, 500);
	/*
	setTimeout(function()
	{
		$('.variable-width').slick('unslick');
		$('.variable-width').slick( getSliderSettings() );
	}, 1000);

	setTimeout(function()
	{
		$('.variable-width').slick('unslick');
		$('.variable-width').slick( getSliderSettings() );
	}, 1500);

	setTimeout(function()
	{
		$('.variable-width').slick('unslick');
		$('.variable-width').slick( getSliderSettings() );
	}, 2000);

	setTimeout(function()
	{
		$('.variable-width').slick('unslick');
		$('.variable-width').slick( getSliderSettings() );
	}, 3000);

	setTimeout(function()
	{
		$('.variable-width').slick('unslick');
		$('.variable-width').slick( getSliderSettings() );
	}, 4000);
	*/
}

function clearMarkers()
{
	/*Clear the map markers*/
	map_div.gmap3({
		clear:
			{
				class: "markers"
			}
		});
	/*Clear Info Bobble*/
	infoBubble.close();

	/*Clear the listing elements*/
	$("#box").empty();
}

/***************Listing JS - Previous code by designer - Start************/

$(function()
{
	var totalImages = $(".loaded-image").size();
	var imagesLoaded = 0;
	$('body').loadie();
	$(".loaded-image").bind("load", function()
	{
		$(this).show();
		imagesLoaded++;
		$('body').loadie(imagesLoaded / totalImages);
	});

	(function ($)
	{
		$.fn.rating = function ()
		{
			var element;

			/* A private function to highlight a star corresponding to a given value*/
			function _paintValue(ratingInput, value) {
				var selectedStar = $(ratingInput).find('[data-value=' + value + ']');
				selectedStar.removeClass('fa-star-o').addClass('fa-star');
				selectedStar.prevAll('[data-value]').removeClass('fa-star-o').addClass('fa-star');
				selectedStar.nextAll('[data-value]').removeClass('fa-star').addClass('fa-star-o');
			}

			/* A private function to remove the selected rating*/
			function _clearValue(ratingInput)
			{
				var self = $(ratingInput);
				self.find('[data-value]').removeClass('fa-star').addClass('fa-star-o');
				self.find('.rating-clear').hide();
				self.find('input').val('').trigger('change');
			}

			/* Iterate and transform all selected inputs*/
			for (element = this.length - 1; element >= 0; element--)
			{
				var el, i, ratingInputs,
				originalInput = $(this[element]),
				max = originalInput.data('max') || 5,
				min = originalInput.data('min') || 0,
				clearable = originalInput.data('clearable') || null,
				stars = '';

				/* HTML element construction*/
				for (i = min; i <= max; i++)
				{
					/* Create <max> empty stars*/
					stars += ['<span class="fa fa-star-o" data-value="', i, '"></span>'].join('');
				}
				/* Add a clear link if clearable option is set*/
				if (clearable)
				{
					stars += [
					' <a class="rating-clear" style="display:none;" href="javascript:void">',
					'<span class="glyphicon glyphicon-remove"></span> ',
					clearable,
					'</a>'].join('');
				}

				el = [
				/* Rating widget is wrapped inside a div*/
				'<div class="rating-input">',
				stars,
				/* Value will be hold in a hidden input with same name and id than original input so the form will still work*/
				'<input type="hidden" name="',
				originalInput.attr('name'),
				'" value="',
				originalInput.val(),
				'" id="',
				originalInput.attr('id'),
				'" />',
				'</div>'].join('');

				/* Replace original inputs HTML with the new one*/
				originalInput.replaceWith(el);
			}

			/* Give live to the newly generated widgets*/
			$('.rating-input')
			/* Highlight stars on hovering*/
			.on('mouseenter', '[data-value]', function ()
			{
				var self = $(this);
				_paintValue(self.closest('.rating-input'), self.data('value'));
			})
			/* View current value while mouse is out*/
			.on('mouseleave', '[data-value]', function ()
			{
				//alert('asd')
				var self = $(this);
				var val = self.siblings('input').val();
				if (val>0) {
					_paintValue(self.closest('.rating-input'), val);
				}
				else
				{
					_clearValue(self.closest('.rating-input'));
				}
			})
			/* Set the selected value to the hidden field*/
			.on('click', '[data-value]', function (e) {
				var self = $(this);
				var val = self.data('value');
				self.siblings('input').val(val).trigger('change');
				self.siblings('.rating-clear').show();
				e.preventDefault();
				false
			})
			/* Remove value on clear*/
			.on('click', '.rating-clear', function (e) {
				_clearValue($(this).closest('.rating-input'));
				e.preventDefault();
				false
			})
			/* Initialize view with default value*/
			.each(function () {
				var val = $(this).find('input').val();
				if (val) {
					_paintValue(this, val);
					$(this).find('.rating-clear').show();
				}
			});
		};

		/* Auto apply conversion of number fields with class 'rating' into rating-fields*/
		$(function ()
		{
			if ($('input.rating[type=number]').length > 0)
			{
				$('input.rating[type=number]').rating();
			}
		});

	}(jQuery));
});

/********************Listing JS - Previous code by designer - End**************/
