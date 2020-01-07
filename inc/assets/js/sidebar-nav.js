jQuery( function ( $ ) {
    $(document).ready(function () {
        var overlayEl = $(".overlay");
        var sidebarEl = $("#sidebar");
    
        var bodyHeight = $("body").outerHeight();
        var headerHeight = $("#masthead").outerHeight();
    
        sidebarEl.css("height", bodyHeight - headerHeight );
    
        overlayEl.on("click", function () {
            // hide sidebar
            sidebarEl.removeClass("active");
            // hide overlay
            overlayEl.removeClass("active");
            overlayEl.css("z-index", "-1");
        });
    
        $("#sidebarCollapse").on("click", function () {
            // open sidebar
            sidebarEl.addClass("active");
            sidebarEl.css("top", headerHeight);
            // fade in the overlay
            overlayEl.addClass("active");
            overlayEl.css("top", headerHeight);
            overlayEl.css("z-index", "998");
            $(".collapse.in").toggleClass("in");
            $("a[aria-expanded=true]").attr("aria-expanded", "false");
        });

        $(".sidebar-brand").on("mouseover", function() {
            $(this).children('img').toggleClass("flipper");
            $("#template-brand").addClass("saturate text-show");
        });
        $(".sidebar-brand").on("mouseleave", function() {
            $("#template-brand").removeClass("saturate text-show");
        });
    });
});