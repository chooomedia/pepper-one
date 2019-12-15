jQuery(function($) {
    $(document).scroll(function(){
        var x = $(this).scrollTop();
        $('div.post-thumbnail').css('background-position', '100% ' + parseInt(-x / 1) + 'px' + ', 0% ' + parseInt(-x / 2) + 'px, center top');
      });
});
