        /*button animation*/

        $(function() {

        $('.loginbtn').on('click',function() {
            $('.loginpopup').addClass('animated pulse').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                function() {
                    $(this).removeClass('animated pulse');
                });
        });
        });



        
        /*button animation*/
        $(function() {

            $('.green-small').on('click',function() {
                $('.location').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function() {
                        $(this).removeClass('animated fadeIn');
                    });
                $('.abc').toggleClass('hide');
                $('.ta').toggleClass('active');
                $('.green-small').toggleClass('hide');
                $('.done-small').toggleClass('show');
            });
        });
        /*button animation*/
        $(function() {

            $('.grey-small').on('click',function() {
                $('.title').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function() {
                        $(this).removeClass('animated fadeIn');
                    });
                $('.abc').toggleClass('hide');
                $('.green-small').toggleClass('hide');
                $('.done-small').toggleClass('show');
                $('.ta').toggleClass('active')
            });
        });

        $(document).ready(function(){

        $('.carousel').carousel({
        interval: 5000 //changes the speed
        })


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

        $('.relist').on('click', function() {
            $('.inative-list').fadeOut("slow");
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
            $('#infocheckbox').click(function() {
                if( $(this).is(':checked')) {
                    $(".loc-info").hide();
                    $(".loc-info-edit").show();
                    } else {
                    $(".loc-info-edit").hide();
                    $(".loc-info").show();
                    
            }
            });

        });

        /*Minimize Search filter*/
        $('.minimize').click(function(){
            $('.fl').slideToggle();
            
        });


        


        /*Show Add Detail */
        $('.loginbtn').click(function(){
            $('.ad-detail').slideDown("slow");
            $('.filter').hide("slow");
            $('.results').hide("slow");

            
        });

        /*Hide Add Detail*/



        $('.close-detail').click(function(){
            $('.ad-detail').slideUp("slow");
            $('.filter').show("slow");
            $('.results').show("slow");

            
        });

        $('.p-min').click(function(){
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

            

        $('.p-close').click(function(){
            $(this).closest('.triangle-isosceles').fadeOut();
            
        });

        /*Show ads on map static code*/

        $('.showonmap9').hover(function(){
            $( ".listing-left" ).find(".show9").slideToggle();
            $( ".listing-left" ).find(".pos-adj9").toggleClass('zup');
            
        });

        $('.showonmap9').click(function(){
            $('.ad-detail').slideDown("slow");
            $('.filter').hide("slow");
            $('.results').hide("slow");
            $('.close-detail').toggleClass("show");
        });


        $('.showonmap10').hover(function(){
            $( ".listing-left" ).find(".show10").slideToggle();
            $( ".listing-left" ).find(".pos-adj10").toggleClass('zup');
        });

        $('.showonmap10').click(function(){
            $('.ad-detail').slideDown("slow");
            $('.filter').hide("slow");
            $('.results').hide("slow");
            $('.close-detail').toggleClass("show");
        });

        $('.showonmap11').hover(function(){
            $( ".listing-left" ).find(".show11").slideToggle();
            $( ".listing-left" ).find(".pos-adj11").toggleClass('zup');
        });

        $('.showonmap11').click(function(){
            $('.ad-detail').slideDown("slow");
            $('.filter').hide("slow");
            $('.results').hide("slow");
            $('.close-detail').toggleClass("show");
        });

        $('.showonmap12').hover(function(){
            $( ".listing-left" ).find(".show12").slideToggle();
            $( ".listing-left" ).find(".pos-adj12").toggleClass('zup');
            
        });

        $('.showonmap12').click(function(){
            $('.ad-detail').slideDown("slow");
            $('.filter').hide("slow");
            $('.results').hide("slow");
            $('.close-detail').toggleClass("show");
        });


        $('.showonmap13').hover(function(){
            $( ".listing-left" ).find(".show13").slideToggle();
            $( ".listing-left" ).find(".pos-adj13").toggleClass('zup');
        });

        $('.showonmap13').click(function(){
            $('.ad-detail').slideDown("slow");
            $('.filter').hide("slow");
            $('.results').hide("slow");
            $('.close-detail').toggleClass("show");
        });

        $('.showonmap14').hover(function(){
            $( ".listing-left" ).find(".show14").slideToggle();
            $( ".listing-left" ).find(".pos-adj14").toggleClass('zup');
        });

        $('.showonmap14').click(function(){
            $('.ad-detail').slideDown("slow");
            $('.filter').hide("slow");
            $('.results').hide("slow");
            $('.close-detail').toggleClass("show");
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
        isRange : true
        });

        /*List View and Box View toggle*/
        $('.changeview').click(function(){
        var ix = $(this).index();

        $('#box').toggle( ix === 0 );
        $('#list').toggle( ix === 1 );
        $('.changeview').toggleClass('selected-view');
        });

        
        /*review box open*/
            $(function() {

            $('.review').on('click',function() {
                $('.write-review').toggleClass('show');
                $('.write-review').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function() {
                        $(this).removeClass('animated fadeIn');
                    });
                
            });
        });



        /*review box close*/
        $(function() {

            $('.review-submit').on('click',function() {
                $('.write-review').toggleClass('show');
                $('.write-review').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                    function() {
                        $(this).removeClass('animated fadeIn ');
                    });
                
            });
        });




        $('.nav-tabs-top a[data-toggle="tab"]').on('click', function(){
        $('.nav-tabs-bottom li.active').removeClass('active')
        $('.nav-tabs-bottom a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
        })

        $('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function(){
        $('.nav-tabs-top li.active').removeClass('active')
        $('.nav-tabs-top a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
        })






