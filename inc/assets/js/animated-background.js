jQuery(function($) {
    $(document).scroll(function(){
        var x = $(this).scrollTop();
        $('div.post-thumbnail').css('transition', 'all 1s');
        $('div.post-thumbnail').css('background-position', '100%' + parseInt(-x / 4.8) + 'px' + ', center center');
        //$('div.post-thumbnail').css('background-position-x', '-'+ parseInt(-x / 3.75) + '%');
    });

    $('.recipe-thumbnail').on({
        mouseenter: function() {
            $(this).addClass('onHover'); 
        }, mouseleave: function() {
            $(this).removeClass('onHover');
        }
    });
});
