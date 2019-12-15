jQuery( function($) {
    let scrollWindow = $(window).height();
    $(document).scroll(function(){
        let scrollScale = scrollWindow / 100;
        console.log(scrollScale);
        $(".post-thumbnail").css("transform", "scale(" + scrollScale +");");
      });
});