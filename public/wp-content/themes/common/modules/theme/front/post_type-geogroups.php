<?php

add_action('init', function() {
    register_post_type( 'geogroups',
        array(
            'labels' => array(
                'name' => __( 'Geogroups' ),
                'singular_name' => __( 'Geogroups' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'geogroups'
            )
        )
    );
});
