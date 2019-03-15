<?php
function get_reading_time($content) {
    $minutes = floor( str_word_count(strip_tags($content)) / 200);
    return (int)$minutes === 0 ? "less that 1 min." : "about {$minutes} min.";
}

function search_filter($query) {
    if ($query->is_search) {
        if ( !isset($query->query_vars['post_type']) ) {
            $query->set('post_type', 'post');
        }
    }
    return $query;
}
add_filter('pre_get_posts','search_filter');
