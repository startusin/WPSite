(function($) {
    $(window).scroll(function() {
        if ($(window).scrollTop() > 100){
            $('.navShadow').addClass('scrolled-menu');
        } else {
            $('.navShadow').removeClass('scrolled-menu');
        }
    });
})(jQuery);
