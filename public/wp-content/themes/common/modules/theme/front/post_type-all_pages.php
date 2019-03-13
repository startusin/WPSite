<?php

add_action('init', function() {
    register_post_type( 'About Us',
        array(
            'labels' => array(
                'name' => __( 'All page' ),
                'singular_name' => __( 'All page' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'pages'
            )
        )
    );
});
