jQuery(document).ready(function () {
    var bodyHeight = jQuery("body").outerHeight();
    var headerHeight = jQuery("#masthead").outerHeight();
    jQuery("#sidebar").css("height", bodyHeight - headerHeight );

    jQuery(".overlay").on("click", function () {
        // hide sidebar
        jQuery("#sidebar").removeClass("active");
        // hide overlay
        jQuery(".overlay").removeClass("active");
        jQuery(".overlay").css("z-index", "-1");
    });

    jQuery("#sidebarCollapse").on("click", function () {
        // open sidebar
        jQuery("#sidebar").addClass("active");
        jQuery("#sidebar").css("top", headerHeight - 3);
        // fade in the overlay
        jQuery(".overlay").addClass("active");
        jQuery(".overlay").css("top", headerHeight);
        jQuery(".overlay").css("z-index", "998");
        jQuery(".collapse.in").toggleClass("in");
        jQuery("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
});