jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();

    if (scroll >= 200) {
        //clearHeader, not clearheader - caps H
        jQuery(".circled-buttons").addClass("d-none-scroll");
    } else {
        jQuery(".circled-buttons").removeClass("d-none-scroll");
    }

    if (scroll >= 2180) {
        jQuery(".circled-buttons").removeClass("d-none-scroll");
    }
}); 