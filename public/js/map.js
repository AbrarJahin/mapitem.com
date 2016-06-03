//General Config
var map_div = $('#test1');

// generate an array of colors
var colors = "black brown green purple yellow grey orange white".split(" ");

// on document ready function
$(function()
{
	// create colors checkbox and associate onChange function 
	$.each(colors, function(i, color)
	{
		$("#colors").append("<input type='checkbox' name='"+color+"' checked><label for='"+color+"'>"+color+"</label>");
	});

	$("#colors input[type=checkbox]").change(onChangeChk);

	// create gmap3 and call the marker generation function  
	map_div.gmap3({
		map:{
			options:{
				zoom: 5,
				mapTypeId: google.maps.MapTypeId.TERRAIN	//ROADMAP , SATELLITE , HYBRID , TERRAIN
			},
			onces: {
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

// generate a list of 100 random marker and call gmap3 clustering function
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
						latLng:[
									southWest.lat() + latSpan * Math.random(),
									southWest.lng() + lngSpan * Math.random()
								],
						class: "markers",
						options:
							{
								icon: "http://maps.google.com/mapfiles/marker_"+color+".png"
							},
						tag:color
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
							}
					}
			}
	});
}





















function onChangeChk()
{
	// first : create an object where keys are colors and values is true (only for checked objects)
	var checkedColors = {};
	$("#colors input[type=checkbox]:checked").each(function(i, chk)
	{
		checkedColors[$(chk).attr("name")] = true;
	});

	// set a filter function using the closure data "checkedColors"
	map_div.gmap3({get:"clusterer"}).filter(function(data)
	{
		return data.tag in checkedColors;
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