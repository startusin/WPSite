<?php

add_filter('post_type_link', function( $post_link, $post, $leavename ) {

    $post_types = apply_filters('nix_custom_post_type_fix', array());

    if ( !in_array( $post->post_type, $post_types ) || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}, 10, 3 );

add_action('pre_get_posts', function( $query ) {
    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {

        $post_types = apply_filters('nix_custom_post_type_fix', array('post', 'page'));

        $query->set('post_type', $post_types);
    }
});
