<?php

add_action('wp_print_styles', function () {
    wp_enqueue_style('header', get_module_css('header/front.css'), array(), nix_get_rev());
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('menu', get_module_js('header/menu.js'), array('jquery'), nix_get_rev(), true);
});

register_nav_menus(array(
    'head' => __('Head Menu'),
));
