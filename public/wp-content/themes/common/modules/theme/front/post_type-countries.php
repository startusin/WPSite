<?php

add_action('init', function() {
    register_post_type( 'countries',
        array(
            'labels' => array(
                'name' => __( 'Countries' ),
                'singular_name' => __( 'Countries' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'countries'
            )
        )
    );
});
