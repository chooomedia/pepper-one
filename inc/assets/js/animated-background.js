jQuery( function($) {
    var scroll = $(window).scrollTop();

    $(".post-thumbnail").css("background-position","center " + scroll +"px";);

});