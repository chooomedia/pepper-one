jQuery(function($) {
    $(document).scroll(function(){
        var x = $(this).scrollTop();
        $('div.post-thumbnail').css('transition', 'all 2s');
        $('div.post-thumbnail').css('background-position', '100%' + parseInt(-x / 3.75) + 'px' + ', 0%' + parseInt(-x / 4.66) + 'px, center top');
        $('div.post-thumbnail').css('background-position-x', '-'+ parseInt(-x / 3.75) + '%');
    });
});
