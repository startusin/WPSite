<?php

show_admin_bar(false);

add_theme_support( 'post-thumbnails' );
add_image_size( 'wp-banner-mobile', 848, 480, true );
add_image_size( 'wp-banner-desktop', 1280, 720, true );
add_image_size( 'wp-avatar', 150, 150, true );
add_image_size( 'wp-blog', 640, 360, true );

add_theme_support( 'custom-header', array(
    'uploads'       => true,
    'header-text'   => false,
) );
