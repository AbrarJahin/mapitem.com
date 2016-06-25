// Plugin: jQuery.scrollSpeed
// Source: github.com/nathco/jQuery.scrollSpeed
// Author: Nathan Rutzky
// Update: 1.0.2
// It is pested here because of minimizing files no to load to increase speed
!function(t){jQuery.scrollSpeed=function(e,n,o){var i,l,r,u=t(document),h=t(window),a=t("html, body"),c=o||"default",d=0,s=!1;return window.navigator.msPointerEnabled?!1:void h.on("mousewheel DOMMouseScroll",function(t){var o=t.originalEvent.wheelDeltaY,f=t.originalEvent.detail;return i=u.height()>h.height(),l=u.width()>h.width(),s=!0,i&&(r=h.height(),(0>o||f>0)&&(d=d+r>=u.height()?d:d+=e),(o>0||0>f)&&(d=0>=d?0:d-=e),a.stop().animate({scrollTop:d},n,c,function(){s=!1})),l&&(r=h.width(),(0>o||f>0)&&(d=d+r>=u.width()?d:d+=e),(o>0||0>f)&&(d=0>=d?0:d-=e),a.stop().animate({scrollLeft:d},n,c,function(){s=!1})),!1}).on("scroll",function(){i&&!s&&(d=h.scrollTop()),l&&!s&&(d=h.scrollLeft())}).on("resize",function(){i&&!s&&(r=h.height()),l&&!s&&(r=h.width())})},jQuery.easing["default"]=function(t,e,n,o,i){return-o*((e=e/i-1)*e*e*e-1)+n}}(jQuery);
/*--------------------------------------------------*/

/*truncate*/
$(document).ready(function()
{
	$('.dot1').dotdotdot();
});
/*loader*/
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
/*homepage banckground change*/
$(function()
{
	$('#maximage').maximage({
		cycleOptions: {
			fx:'fade',
			speed: 800,
			timeout: 8000,
			prev: '#arrow_left',
			next: '#arrow_right'
		},
		onFirstImageLoaded: function(){
			jQuery('#cycle-loader').hide();
			jQuery('#maximage').fadeIn('slow');
		}
	});
});

/*Header background on Scroll*/

var scroll_pos = 0;
$(document).scroll(function() { 
	scroll_pos = $(this).scrollTop();
	if(scroll_pos > 310) {
		$(".navbar").addClass("colred");
		$(".navbar").removeClass("trans");
	} else {
		$(".navbar").addClass("trans");
		$(".navbar").removeClass("colred");
	}
});

$("input.ct").focus(function(){
	$("div.ct-list").fadeIn("");
});

$("input.ct").focusout(function(){
	$("div.ct-list").fadeOut("");
});

$('.thumb-close').on('click',function() {
	$(this).parent(".adj007").fadeOut()
});

$(function()
{
	// Default
	jQuery.scrollSpeed(100, 800);
	// Custom Easing
	jQuery.scrollSpeed(100, 800, 'easeOutCubic');
});


function cycleImages()
{
	var $active = $('#cycler .active');
	var $next = ($active.next().length > 0) ? $active.next() : $('#cycler img:first');
	$next.css('z-index',2);//move the next image up the pile
	$active.fadeOut(1500,function()
	{//fade out the top image
		$active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
		$next.css('z-index',3).addClass('active');//make the next image the top one
	});
}

$(document).ready(function()
{
	// run every 7s
	setInterval('cycleImages()', 7000);
});

//Listingpage JS 

$('.dropdown-menu').click(function(e)
{
	e.stopPropagation();
});