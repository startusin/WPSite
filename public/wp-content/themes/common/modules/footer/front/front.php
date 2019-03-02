<?php

add_action('wp_print_styles', function () {
    wp_enqueue_style('footer', get_module_css('footer/front.css'), array(), nix_get_rev());
});

add_action('wp_enqueue_scripts', function () {
    //wp_enqueue_script('jquery', get_module_js('footer/jquery-3.3.1.min.js'), array(), nix_get_rev(), true);
    wp_enqueue_script('popover', get_module_js('footer/popper.min.js'), array('jquery'), nix_get_rev(), true);
    wp_enqueue_script('bootstrap', get_module_js('footer/bootstrap.min.js'), array('jquery'), nix_get_rev(), true);
    wp_enqueue_script('customscript', get_module_js('footer/script.js'), array('jquery', 'popover', 'bootstrap'), nix_get_rev(), true);
    wp_enqueue_script('scroll-one-page', get_module_js('footer/scroll-one-page-nav.js'), array('jquery', 'popover', 'bootstrap', 'customscript'), nix_get_rev(), true);
    wp_enqueue_script('owl', get_module_js('footer/owl.carousel.min.js'), array('jquery'), nix_get_rev(), true);
    wp_enqueue_script('isotope', get_module_js('footer/isotope.pkgd.min.js'), array('jquery'), nix_get_rev(), true);
    wp_enqueue_script('pluginjs', get_module_js('footer/plugin-v2.js'), array('jquery'), nix_get_rev(), true);
});
