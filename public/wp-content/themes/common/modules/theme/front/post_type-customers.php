<?php

add_action('init', function() {
    register_post_type( 'customers',
        array(
            'labels' => array(
                'name' => __( 'Customers' ),
                'singular_name' => __( 'Customers' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'customers'
            )
        )
    );
});
