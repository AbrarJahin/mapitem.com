$(document).ready(function()
{
		//Profile Map - Need to be updated
	$("#user_address").geocomplete(
	{
		map			: "#user_address_map",
		mapOptions	:
		{
			mapTypeId : 'roadmap',		//roadmap, satellite,hybrid, terrain,
			scrollwheel	: true,
			zoom: 8,
			center : new google.maps.LatLng(37.42152681633113, -119.27327880000001),
		},
		markerOptions:
		{
			draggable: true
		},
	}).bind("geocode:result", function(event, result)
	{
		//console.log(result);
		$('#location_lat_profile').val( result.geometry.location.lat() );
		$('#location_lon_profile').val( result.geometry.location.lng() );
	}).bind("geocode:dragged", function(event, latLng)
	{
		//console.log( $("#user_address").geocomplete( "find", latLng.lat() + "," + latLng.lng()) );
		$('#user_address').val( $("#user_address").geocomplete( "find", latLng.lat() + "," + latLng.lng() ) );
		$('#location_lat_profile').val( latLng.lat() );
		$('#location_lon_profile').val( latLng.lng() );
	});

	//Profile Page Update Button Clicked
	$("form#edit_profile").submit(function(e)
	{
		e.preventDefault();
		var isValidated = true;	//After Validation Run
		if(isValidated)
		{
			//var formData = new FormData(document.getElementById("fileinfo"));
			//formData.append("label", "WEBUPLOAD");
			var response = $.ajax(
							{
								headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
								method: "POST",
								url: $(this).attr('action'),
								dataType: "json",
								data: new FormData( this ),
								async: false,
								processData: false,
								contentType: false
							}).responseText;
			if(response === 'Updated')
			{
				location.reload();
			}
			else
			{
				console.log(response);
				alert("File size is too big to upload");
			}
		}
		return 0;
	});

	//Profile Page - Profile Showing
	$("#profile_location").gmap3({
		map:{
			options:{
					center:[$('#location_lat_profile').val(), $('#location_lon_profile').val()],
					zoom: 12
				}
			},
			marker:{
			values:[
				{
					latLng:[$('#location_lat_profile').val(), $('#location_lon_profile').val()]
				}
			],
			options:{
				draggable: false
			}
		}
	});

	/*Profile page*/
	$(".pdisplay").click(function()
	{
		$(this).parent().next().removeClass("edit-on");
		$(this).parent().addClass("edit-on");

		var user_location_edit_map = $("#user_address").geocomplete("map");
		//Resizing Map on Shown - So that map content can be shown
		google.maps.event.trigger(
									user_location_edit_map,
									'resize'
								);
		//Setting Map Center
		//user_location_edit_map.setCenter( new google.maps.LatLng( latitude+1, longitude-1 ) );	//Setting Edit Map Center to current Location
		user_location_edit_map.setCenter( new google.maps.LatLng( $('#location_lat_profile').val()+1, $('#location_lon_profile').val()-1 ) );	//Setting Edit Map Center to previous Location
	});

	//About this function- I am not sure if it belongs in this page or another page
	//If other page shows error, then it should be placed in custom.js
	$(".pedit").click(function()
	{
		$(this).parent().prev().removeClass("edit-on");
		$(this).parent().addClass("edit-on");
	});

});