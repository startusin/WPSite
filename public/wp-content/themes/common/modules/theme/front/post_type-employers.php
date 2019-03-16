<?php
add_action('init', function() {
    register_post_type( 'employers',
        array(
            'labels' => array(
                'name' => __( 'Employers' ),
                'singular_name' => __( 'Employer' )
            ),
            'public' => true,
            'supports' => array(
                'title'
            ),
            'rewrite' => array(
                'slug' => 'employers'
            )
        )
    );
});
