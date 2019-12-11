jQuery(document).ready(function () {
    var headerHeight = jQuery("#masthead").outerHeight();

    jQuery(".overlay").on("click", function () {
        // hide sidebar
        jQuery("#sidebar").removeClass("active");
        // hide overlay
        jQuery(".overlay").removeClass("active");
    });

    jQuery("#sidebarCollapse").on("click", function () {
        // open sidebar
        jQuery("#sidebar").addClass("active");
        jQuery("#sidebar").css("top", headerHeight - 3);
        // fade in the overlay
        jQuery(".overlay").addClass("active");
        jQuery(".overlay").css("top", headerHeight);
        jQuery(".collapse.in").toggleClass("in");
        jQuery("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
});