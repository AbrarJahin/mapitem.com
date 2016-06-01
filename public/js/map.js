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
	$("#onOff").change(onChangeOnOff); 

	// create gmap3 and call the marker generation function  
	$('#test1').gmap3({
		map:{
			options:{
				zoom: 5,
				mapTypeId: google.maps.MapTypeId.TERRAIN
			},
			onces: {
				bounds_changed: function()
				{
					randomMarkers($(this).gmap3("get").getBounds());
				}
			}
		}
	});
  
});

// generate a list of 100 random marker and call gmap3 clustering function
function randomMarkers(bounds)
{
	var southWest = bounds.getSouthWest(),
		northEast = bounds.getNorthEast(),
		lngSpan = northEast.lng() - southWest.lng(),
		latSpan = northEast.lat() - southWest.lat(),
		i, color, list = [];

	// generate random list
	for (i = 0; i < 100; i++)
	{
		color = colors[Math.floor(Math.random()*colors.length)];
		list.push({
			latLng:[southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random()],
			options:{
			icon: "http://maps.google.com/mapfiles/marker_"+color+".png"
			},
			tag:color
		});
	}
  
	// call the clustering function
	$('#test1').gmap3({
		marker:{
		values: list,
		cluster:{
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

function onChangeOnOff()
{
	if ($(this).is(":checked"))
	{
		$('#test1').gmap3({get:"clusterer"}).enable();
	}
	else
	{
		$('#test1').gmap3({get:"clusterer"}).disable();
	}
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
	$('#test1').gmap3({get:"clusterer"}).filter(function(data)
	{
		return data.tag in checkedColors;
	});
}