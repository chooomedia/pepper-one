jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();

    if (scroll >= 200) {
        //clearHeader, not clearheader - caps H
        jQuery(".circled-buttons").addClass("d-none-scroll");
    } else {
        jQuery(".circled-buttons").removeClass("d-none-scroll");
    }

    jQuery("#colophon").on("mouseover", function() {
        jQuery(".circled-buttons").removeClass("d-none-scroll");
    });
});