<?php

add_action('init', function() {
    register_post_type( 'categories',
        array(
            'labels' => array(
                'name' => __( 'Categories' ),
                'singular_name' => __( 'Category' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'categories'
            )
        )
    );
});
