jQuery(window).scroll(function() {    
    var circledButtons = jQuery(".circled-buttons");
    var scroll = jQuery(window).scrollTop();

    if (scroll >= 200) {
        circledButtons.addClass("d-none-scroll");
    } else {
        circledButtons.removeClass("d-none-scroll");
    }

    jQuery("#colophon").on("mouseover", function() {
        circledButtons.removeClass("d-none-scroll");
    });

    jQuery("#wpsl-gmap").on("mouseover", function() {
        circledButtons.addClass("d-none-scroll");
    });

    jQuery("#wpsl-gmap").on("mouseleave", function() {
        circledButtons.removeClass("d-none-scroll"); 
    });

});