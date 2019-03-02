<?php

add_action('init', function() {
    register_post_type( 'services',
        array(
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'Services' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'services'
            )
        )
    );
});
