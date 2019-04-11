<?php

add_action('init', function() {
    register_post_type( 'publications',
        array(
            'labels' => array(
                'name' => __( 'Publications' ),
                'singular_name' => __( 'Publication' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'publications'
            )
        )
    );
});
