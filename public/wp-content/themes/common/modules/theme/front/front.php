<?php

add_action('wp_print_styles', function () {
    wp_enqueue_style('bootstrap', get_module_css('theme/bootstrap.min.css'), array(), null);
    wp_enqueue_style('fontawesome', get_module_css('theme/fontawesome-all.css'), array(), null);
    wp_enqueue_style('owlcarousel', get_module_css('theme/owl.carousel.min.css'), array(), null);
    wp_enqueue_style('owlcarouseltheme', get_module_css('theme/owl.theme.default.min.css'), array(), null);
    wp_enqueue_style('styles', get_module_css('theme/front.css'), array(), nix_get_rev());
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('bootstrap', get_module_js('theme/bootstrap.min.js'), array('jquery'), nix_get_rev(), true);
});

// Filter to hide protected posts
function exclude_protected($where) {
    global $wpdb;
    return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
    if( !is_single() && !is_page() && !is_admin() ) {
        add_filter( 'posts_where', 'exclude_protected' );
    }
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');

add_action( 'wpseo_opengraph_image', function ( $img ) {
    global $ogimg;
    $ogimg = $img;
    return $img;
});
