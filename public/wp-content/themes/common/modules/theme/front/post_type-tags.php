<?php

add_action('init', function() {
    register_post_type( 'tags',
        array(
            'labels' => array(
                'name' => __( 'Tags' ),
                'singular_name' => __( 'Tags' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'tags'
            )
        )
    );
});
