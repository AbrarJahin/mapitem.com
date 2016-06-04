//General Config
var map_div = $('#map');

// generate an array of colors
var colors = "black brown green purple yellow grey orange white".split(" ");

// on document ready function
$(function()
{
	$("#category_filter input[type=checkbox]").change(function()
	{
		// first : create an object where keys are colors and values is true (only for checked objects)
		var checkedData = {};
		$("#category_filter input[type=checkbox]:checked").each(function(i, chk)
		{
			checkedData[$(chk).attr("name")] = true;
		});

		// set a filter function using the closure data "checkedData"
		map_div.gmap3({get:"clusterer"}).filter(function(data)
		{
			return data.category in checkedData;
		});
	});

	// create gmap3 and call the marker generation function  
	map_div.gmap3({
		map:{
			options	:	{
							navigationControl: false,
							scrollwheel: true,
							streetViewControl: false,
							mapTypeControl: false,
							zoom: 5,
							mapTypeId: google.maps.MapTypeId.TERRAIN	//ROADMAP , SATELLITE , HYBRID , TERRAIN
						},
			onces	:	{
							bounds_changed: function()
							{
								randomMarkers(map_div.gmap3("get").getBounds());
							}
						}
		}
	});
});

setInterval(function()
{
	map_div.gmap3({
			clear:
				{
					class: "markers"
				}
		});

	randomMarkers(map_div.gmap3("get").getBounds());
}, 30000);

// Generate a list of Marker and call gmap3 clustering function From AJAX
function randomMarkers(bounds)
{
	// generate random list of Markers - Should come from AJAX - Start
		var southWest = bounds.getSouthWest(),
			northEast = bounds.getNorthEast(),
			lngSpan = northEast.lng() - southWest.lng(),
			latSpan = northEast.lat() - southWest.lat(),
			i, color, list = [];

		for (i = 0; i < 100; i++)
		{
			color = colors[Math.floor(Math.random()*colors.length)];
			list.push({
						latLng			:	[
												southWest.lat() + latSpan * Math.random(),
												southWest.lng() + lngSpan * Math.random()
											],
						class			:	"markers",
						options			:
											{
												icon: "http://maps.google.com/mapfiles/marker_"+color+".png",
												//animation: google.maps.Animation.BOUNCE
											},
						category		:	'cat_' + Math.abs(i%10+1).toString(),
						sub_category	:	'sub_cat_' + Math.abs(i%10+1).toString(),
						id				: 	i,
						data			: 	{
												title			:	'title',
												title_image_url	:	'images/p-favicon.jpg',
												description		:	'description',
												view_detail_url	:	'#asd'
											},
						tag				: 	'tag_' + Math.abs(i%10+1).toString(),
						events			:	{
												mouseover: function(marker, event, context)
												{
													//###############	Animate Pointer
													//marker.setAnimation(null);
													marker.setAnimation(google.maps.Animation.BOUNCE);

													//###############	Now showing the infoWindow
													//console.log(context);
													//console.log(marker);
													//console.log(event);
													var infoWindowContent = context.data.description;	//Will be generated from AJAX call
													infoWindowContent =	'<div id="iw-container">' +
																			'<div class="iw-title">Porcelain Factory of Vista Alegre</div>' +
																				'<div class="iw-content">' +
																					'<div class="iw-subTitle">History</div>' +
																					'<img src="http://localhost/blockhunt.com/public/images/bank-transfer-icon.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
																					'<p>Founded in 1824, the Porcelain Factory of Vista Alegre was the first industrial unit dedicated to porcelain production in Portugal. For the foundation and success of this risky industrial development was crucial the spirit of persistence of its founder, José Ferreira Pinto Basto. Leading figure in Portuguese society of the nineteenth century farm owner, daring dealer, wisely incorporated the liberal ideas of the century, having become "the first example of free enterprise" in Portugal.</p>' +
																					'<div class="iw-subTitle">Contacts</div>' +
																					'<p>VISTA ALEGRE ATLANTIS, SA<br>3830-292 Ílhavo - Portugal<br>'+
																					'<br>Phone. +351 234 320 600<br>e-mail: geral@vaa.pt<br>www: www.myvistaalegre.com</p>'+
																				'</div>' +
																			'<div class="iw-bottom-gradient"></div>' +
																		'</div>';
													/*infoWindowContent = '<div class="p-top">'
																		+	'<img class="pull-left" src="'+context.data.title_image_url+'">'
																		+	'<h4 class="pull-left">'+context.data.title+'</h4>'
																		+	'<a href="#" class="pull-right fa fa-close p-close"></a>'
																		+	'<a href="#" class="pull-right fa fa-minus p-min "></a>'
																		+'</div>'
																		+'<div class="p-bottom show9">'
																		+	'<div>'
																		+		context.data.description
																		+	'</div>'
																		+	'<a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="'+context.data.view_detail_url+'">Details</a>'
																		+'</div>';*/

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
																						maxWidth	: 350,
																						/*width		: 53,
																						height		: 52*/
																					}
																	}
															});
													}
												},
												mouseout: function()
												{
													//$(this).gmap3({get:{name:"infowindow"}}).close();
												}
						    				}
					});
		}
	// generate random list of Markers - Should come from AJAX - END

	// call the clustering function
	map_div.gmap3({
		marker:
			{
				values: list,
				cluster: 				//Cluster styling and config
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
												curent_map.setZoom( curent_map.getZoom(1)+1 ); 									//Increasing zoom -> Zoom In
											}
							}
					}
			}
	});
}

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
