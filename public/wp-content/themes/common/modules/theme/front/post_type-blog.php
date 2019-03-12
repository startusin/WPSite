<?php

add_action('init', function() {
    register_post_type( 'blog',
        array(
            'labels' => array(
                'name' => __( 'Blog' ),
                'singular_name' => __( 'Blog' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'blog'
            )
        )
    );
});
