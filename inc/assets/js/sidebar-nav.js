jQuery(document).ready(function () {
    var overlayEl = jQuery(".overlay");
    var sidebarEl = jQuery("#sidebar");

    var bodyHeight = jQuery("body").outerHeight();
    var headerHeight = jQuery("#masthead").outerHeight();

    sidebarEl.css("height", bodyHeight - headerHeight );

    overlayEl.on("click", function () {
        // hide sidebar
        sidebarEl.removeClass("active");
        // hide overlay
        overlayEl.removeClass("active");
        overlayEl.css("z-index", "-1");
    });

    jQuery("#sidebarCollapse").on("click", function () {
        // open sidebar
        sidebarEl.addClass("active");
        sidebarEl.css("top", headerHeight - 3);
        // fade in the overlay
        overlayEl.addClass("active");
        overlayEl.css("top", headerHeight);
        overlayEl.css("z-index", "998");
        jQuery(".collapse.in").toggleClass("in");
        jQuery("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
});