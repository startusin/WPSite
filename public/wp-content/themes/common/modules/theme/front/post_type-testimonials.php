<?php

add_action('init', function() {
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonials' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'testimonials'
            )
        )
    );
});
