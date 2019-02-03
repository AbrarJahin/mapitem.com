function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();
	console.log(profile);

	$.ajax({
		headers: { 'X-CSRF-TOKEN': $('meta[name=_token]').attr("content") },
		method: "POST",
		url: $('meta[name=google_login_url]').attr("content"),
		dataType: "json",
		data	:
				{
					name			:	profile.getName(),
					email			:	profile.getEmail(),
					profile_image	:	profile.getImageUrl(),
					id				:	profile.getId()
				},
		beforeSend: function() {
			signOut();
		},
		success:function(responce_data)
		{
			location.reload();
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
		}
	});
}

function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function () {
		console.log('User signed out.');
	});
}

$(document).ready(function()
{
	setTimeout(function (){
		$(".abcRioButton").width("100%");
	}, 6000);
});
