jQuery(function($) {
    let linkedRow = $(".linked-row");

    linkedRow.each(function() { 
        let linkedRowLink = $(this).find("h3.linked-headline a").attr("href");
        $(this).wrap("<a class='wrapping-link' href=" + linkedRowLink + " target='_blank'></a>");
    });

    $(".linked-headline a").replaceWith(function() {
        var text = $.trim($(this).text());
        return '<span>' + text + '</span>';
    });

});