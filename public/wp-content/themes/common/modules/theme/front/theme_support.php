<?php

show_admin_bar(false);

add_theme_support( 'post-thumbnails' );
add_image_size( 'wp-thumb-img', 633, 500, true );
add_image_size( 'wp-blog-bannner', 1300, 607, true );
add_image_size( 'wp-blog-slide', 255, 255, true );

add_theme_support( 'custom-header', array(
    'uploads'       => true,
    'header-text'   => false,
) );

function disable_wp_responsive_images() {
    return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');
