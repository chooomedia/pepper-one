jQuery( function ( $ ) {
    $(window).scroll(function() {    
        var circledButtons = $(".circled-buttons");
        var scroll = $(window).scrollTop();

        if (scroll >= 200) {
            circledButtons.addClass("d-none-scroll");
            $("#sidebar").removeClass("active");
            $(".overlay").removeClass("active");
            $(".overlay").css("z-index", "-1");

        } else {
            circledButtons.removeClass("d-none-scroll");
            $(".btn-social:last-of-type").hide();
        }

        if (scroll + $(window).height() == $(document).height()) {
            circledButtons.removeClass("d-none-scroll");
            $(".btn-social:last-of-type").show();
        }
    
        $("#colophon").on("mouseover", function() {
            circledButtons.removeClass("d-none-scroll");
        });
    
        $("#wpsl-gmap").on("mouseover", function() {
            circledButtons.addClass("d-none-scroll");
        });
    
        $("#wpsl-gmap").on("mouseleave", function() {
            circledButtons.removeClass("d-none-scroll"); 
        });
    
    });    
});