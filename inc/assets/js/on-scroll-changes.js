jQuery(function ($) {
    $(window).scroll(function() {    
        // Social Media Buttons on the right
        var circledButtons = $(".circled-buttons");
        // Get the current Scroll position
        var scroll = $(window).scrollTop();

        if (scroll >= 200) {
            circledButtons.addClass("d-none-scroll");
            $("#sidebar, .overlay").removeClass("active");
            $(".overlay").css("z-index", "-1");

        } else {
            $(".btn-social:last-of-type").hide();
            circledButtons.removeClass("d-none-scroll");
        }

        // Show Scroll to Top Button if on end of Page
        if (scroll + $(window).height() == $(document).height()) {
            $(".btn-social:last-of-type").show();
            circledButtons.removeClass("d-none-scroll");
        }
    
        $("#colophon").on("mouseover", function() {
            $(".btn-social:last-of-type").show();
            circledButtons.removeClass("d-none-scroll");
        });


        //Require WPSL Map Plugin for Wordpress
        var wpslMap = $("#wpsl-gmap");

        wpslMap.on("mouseover", function() {
            circledButtons.addClass("d-none-scroll");
        });
    
        wpslMap.on("mouseleave", function() {
            circledButtons.removeClass("d-none-scroll"); 
        });
    });    
});