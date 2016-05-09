/*button animation*/

$(document).ready(function()
{
	$('.loginbtn').on('click',function()
	{
	    $('.loginpopup').addClass('animated pulse').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
	        function() {
	            $(this).removeClass('animated pulse');
	        });
	});

	/*button animation*/

    $('.accept-offer').on('click',function()
    {
        $('.location').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function()
            {
                $(this).removeClass('animated fadeIn');
            });
        $(this).closest('.accept-offer').toggleClass('hide');
    });

	/*button animation*/

    $('.grey-small').on('click',function()
    {
        $('.title').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function()
            {
                $(this).removeClass('animated fadeIn');
            });
        $(this).prev().toggleClass('hide');
    });

    $('.carousel').carousel({
    interval: 5000 //changes the speed
    })

    $(".sup").click(function(){
        $("#dt").toggleClass('open');
        $("#su").toggleClass('open');
    });

    $(".si").click(function(){
        $("#su").toggleClass('open');
        $("#dt").toggleClass('open');
    });

    $(".offer-si").click(function(){
        $("#dt").addClass('open');
        $("#su").removeClass('open', 'collapsed');

    });
    $(".offer-su").click(function(){
        $("#su").addClass('open');
        $("#dt").removeClass('open');
    });

    //to use modal in a dropdown
    $('.dropdown-menu').click(function(e) {
        e.stopPropagation();
        if ($(e.target).is('[data-toggle=modal]')) {
            $($(e.target).data('target')).modal()
        }
    });

    //to close modal on btn click
    $('.si').click(function() {
        $('#sgn-pup').modal('hide');
    });

    //to close modal on btn click
    $('.sup').click(function() {
        $('#lgn-pup').modal('hide');
    });



	/*inbox page*/ 
	$(".hd-detail").hide();
	    $(".glyphicon-circle-arrow-up").hide();
	    $(".hd, .inbox-short").click(function(){
	        $(this).next(".hd-detail").slideToggle(500);
	        $(this).find(".glyphicon-circle-arrow-up, .glyphicon-circle-arrow-down").toggle();
	});

	/*Avoide scroll up on clicking*/
	$('a.mhd, a.relist, a.edit1').click(function(e)
	{
	    e.preventDefault();
	});

	/*My Ads page*/
	$('.edit1').on('click',function() {
	    $(".db-body").toggleClass('edit-on')
	});

	$('.save').on('click',function() {
	    $(".db-body").toggleClass('edit-on')
	});

	$('.relist').on('click', function()
	{
	    //$('.inative-list').fadeOut("slow");
	    $(this).closest(".inative-list").fadeOut("slow");
	});




	/*Profile page*/
	$(".pdisplay").click(function(){
	    $(this).parent().next().removeClass("edit-on");
	    $(this).parent().addClass("edit-on");
	}); 

	$(".pedit").click(function(){
	    $(this).parent().prev().removeClass("edit-on");
	    $(this).parent().addClass("edit-on");
	}); 



	$('[data-toggle="tooltip"]').tooltip(); 

	$(".ad-detail").hide();    

	/*Post free ad modal - location tab checkbox*/    
	$(".loc-info-edit").hide();
    $('#infocheckbox').click(function()
    {
        if( $(this).is(':checked')) {
            $(".loc-info").hide();
            $(".loc-info-edit").show();
            } else {
            $(".loc-info-edit").hide();
            $(".loc-info").show();
            
    }
    });

    $('#rootwizard').bootstrapWizard();
    window.prettyPrint && prettyPrint();

	/*review box open*/
    $('.review').on('click',function()
    {
        $('.write-review').toggleClass('show');
        $('.write-review').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
            function() {
                $(this).removeClass('animated fadeIn');
            });
    });

	/*review box close*/
	$('.review-submit').on('click',function()
	{
		$('.write-review').toggleClass('show');
		$('.write-review').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
															function()
															{
																$(this).removeClass('animated fadeIn ');
															});
	});
});


/*Minimize Search filter*/
$('.minimize').click(function()
{
    $('.fl').slideToggle();
});

/*Show Add Detail */
/*$('.loginbtn').click(function(){
    $('.ad-detail').slideDown("slow");
    $('.filter').hide("slow");
    $('.results').hide("slow");

    
});*/

/*Hide Add Detail*/

$('.fp').click(function()
{
    $('.for-pass').slideDown("slow");
});

$('.closefp').click(function()
{
    $('.for-pass').slideUp("slow");
});

$("a.close-detail").click(function(event)
{
    event.preventDefault();
});

$('.close-detail').click(function()
{
    $('.ad-detail').hide("slow");
    $('.close-detail').toggleClass("show");
    $('.ad-listing').show("slow");
});



$('.p-min').click(function()
{
    $(this).parent().next('.p-bottom').slideToggle();
    $(".zindex").removeClass("zindex");
    $(this).parent().parent().parent().toggleClass('zindex');
});

    /*ads on map show hide*/

    /*(function($) {

    var allPanels = $('.p-bottom').hide();
    

    $('.p-min').click(function() {
    allPanels.slideUp();
    $(this).parent().next().slideDown();
    $(".zindex").removeClass("zindex"); 
    $(this).parent().parent().parent().addClass('zindex');
    return false;
    });

    })(jQuery);*/

/*ads on map show hide*/            

$('.p-close').click(function()
{
    $(this).closest('.triangle-isosceles').fadeOut();
    
});

/*Show ads on map static code*/

$('.showonmap9').hover(function()
{
    $( ".listing-left" ).find(".show9").slideToggle();
    $( ".listing-left" ).find(".pos-adj9").toggleClass('zup');
    
});

$('.showonmap9').click(function()
{
    $('.ad-detail').show("slow");
    $('.ad-listing').hide("slow");
    $('.close-detail').toggleClass("show");
    alert("I am an alert box!");
});


$('.showonmap10').hover(function()
{
    $( ".listing-left" ).find(".show10").slideToggle();
    $( ".listing-left" ).find(".pos-adj10").toggleClass('zup');
});

$('.showonmap10').click(function()
{
    $('.ad-detail').show("slow");
    $('.ad-listing').hide("slow");
    $('.close-detail').toggleClass("show");

});

$('.showonmap11').hover(function()
{
    $( ".listing-left" ).find(".show11").slideToggle();
    $( ".listing-left" ).find(".pos-adj11").toggleClass('zup');
});

$('.showonmap11').click(function()
{
    $('.ad-detail').show("slow");
    $('.ad-listing').hide("slow");
    $('.close-detail').toggleClass("show");
});

$('.showonmap12').hover(function()
{
    $( ".listing-left" ).find(".show12").slideToggle();
    $( ".listing-left" ).find(".pos-adj12").toggleClass('zup');
});

$('.showonmap12').click(function()
{
    $('.ad-detail').show("slow");
    $('.ad-listing').hide("slow");
    $('.close-detail').toggleClass("show");

});

$('.showonmap13').hover(function()
{
    $( ".listing-left" ).find(".show13").slideToggle();
    $( ".listing-left" ).find(".pos-adj13").toggleClass('zup');
});

$('.showonmap13').click(function()
{
    $('.ad-detail').show("slow");
    $('.ad-listing').hide("slow");
    $('.close-detail').toggleClass("show");
});

$('.showonmap14').hover(function(){
    $( ".listing-left" ).find(".show14").slideToggle();
    $( ".listing-left" ).find(".pos-adj14").toggleClass('zup');
});

$('.showonmap14').click(function()
{
	$('.ad-detail').show("slow");
	$('.ad-listing').hide("slow");
	$('.close-detail').toggleClass("show");
});

/*List View and Box View toggle*/
$('.changeview').click(function()
{
	var ix = $(this).index();
	$('#box').toggle( ix === 0 );
	$('#list').toggle( ix === 1 );
	$('.changeview').toggleClass('selected-view');
});

$('.nav-tabs-top a[data-toggle="tab"]').on('click', function()
{
	$('.nav-tabs-bottom li.active').removeClass('active')
	$('.nav-tabs-bottom a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
})

$('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function()
{
	$('.nav-tabs-top li.active').removeClass('active')
	$('.nav-tabs-top a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
})