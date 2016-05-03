/*truncate*/
$(document).ready(function() {
        $('.dot1').dotdotdot();
});
/*loader*/
$(window).load(function() {
    $(".loader").fadeOut("slow");
})
/*homepage banckground change*/
$(function(){
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

    $(function() {  

        // Default
        jQuery.scrollSpeed(100, 800);

        // Custom Easing
        jQuery.scrollSpeed(100, 800, 'easeOutCubic');

    });

    function cycleImages(){
    var $active = $('#cycler .active');
    var $next = ($active.next().length > 0) ? $active.next() : $('#cycler img:first');
    $next.css('z-index',2);//move the next image up the pile
    $active.fadeOut(1500,function(){//fade out the top image
    $active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
    $next.css('z-index',3).addClass('active');//make the next image the top one
    });
    }

    $(document).ready(function(){
    // run every 7s
    setInterval('cycleImages()', 7000);
    })




    //Listingpage JS 

    $('.dropdown-menu').click(function(e) {
        e.stopPropagation();
        });



    
    

    
