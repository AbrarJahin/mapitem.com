/*
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })

        $(document).ready(function(){
    
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

        $(".pdisplay").click(function(){
            $(this).parent().next().removeClass("edit-on");
            $(this).parent().addClass("edit-on");
        }); 

        $(".pedit").click(function(){
            $(this).parent().prev().removeClass("edit-on");
            $(this).parent().addClass("edit-on");
        }); 



    $(document).ready(function(){
        $('.next-ads').hide();
    }); 

    $(".lm").click(function(event){
        event.preventDefault();
    }); 

        
    $(function() {

        $('.edit').on('click',function() {
            $('.loginpopup').toggleClass('animated pulse');

        });
    });

    $(function() {

        $('.lm').on('click',function() {

            $('.next-ads').slideToggle();
        });
    });

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
    });*/


