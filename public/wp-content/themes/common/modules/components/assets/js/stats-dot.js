(function($) {
    $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(1000).fadeOut(1000);
    $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(1000).fadeOut(1000);
    $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(1000).fadeOut(1000);
    $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(1000).fadeOut(1000);
    $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(1000).fadeOut(1000);

    if ($('.globe-outliner').length > 0) {
        setInterval(function(){
            $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(1000).fadeOut(1000);
            $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(1000).fadeOut(1000);
            $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(1000).fadeOut(1000);
        }, 2000);

        setInterval(function(){
            $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(800).fadeOut(800);
            $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(800).fadeOut(800);
            $(".dot-id-"+(Math.floor(Math.random() * 12) + 1)).fadeIn(800).fadeOut(800);
        }, 1600);
    }
})(jQuery);
