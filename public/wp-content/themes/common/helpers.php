<?php
global $lang;
global $i18nContainer;
$lang = $_REQUEST['lang'] ?? 'en';
$i18nContainer = json_decode(file_get_contents(get_template_directory().'/translations/strings.json') ?? '{}', true);

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

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Policies';
    $submenu['edit.php'][5][0] = 'All Policies';
    $submenu['edit.php'][10][0] = 'Add Policy';
}
add_action( 'admin_menu', 'change_post_menu_label' );

/**
 * @param $string
 * @return string
 */
function i18nString($string) {
    global $i18nContainer;
    global $lang;
    return $i18nContainer[$string][$lang] ?? $string;
}
