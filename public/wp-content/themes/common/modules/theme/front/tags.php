<?php

add_action('init', function() {
    add_rewrite_rule('^category/([^/]+)/?$', 'index.php?post_type=tags&__tag_page_type=$matches[1]', 'top');
    add_rewrite_rule('^category/([^/]+)/page/([0-9]{1,})/?$', 'index.php?post_type=tags&paged=$matches[2]&__tag_page_type=$matches[1]', 'top');
});

add_filter('query_vars', function($query_vars) {
    $query_vars[] = "__tag_page_type";
    return $query_vars;
});

add_action( 'pre_get_posts', function($query) {
    if (!$query->is_main_query()) {
        return;
    }

    if (!is_post_type_archive('tags')) {
        return;
    }
} );
