<?php
add_action('wp_print_styles', function () {
    wp_enqueue_style('components', get_module_css('components/front.css'), array(), nix_get_rev());
    wp_enqueue_style('slick', get_module_css('components/slick.css'), array(), nix_get_rev());
    wp_enqueue_style('slick-theme', get_module_css('components/slick-theme.css'), array(), nix_get_rev());
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('jquery-slick', get_module_js('components/slick.min.js'), array('jquery'), nix_get_rev(), true);
    wp_enqueue_script('news-carousel', get_module_js('components/news-carousel.js'), array('jquery', 'jquery-slick'), nix_get_rev(), true);
});

global $the_component_counter;
global $geodata;

$the_component_counter= 0;

if (count($geodata) <= 0){
    $freegeoip = json_decode(file_get_contents('https://freegeoip.net/json/'.$_SERVER['REMOTE_ADDR']));
    $geodata = array('country_code' => $freegeoip->country_code);
    $groups = get_posts(array('post_type' => 'geogroups', 'numberposts' => -1));
    $group_ids = array();
    foreach ($groups as $group){
        $countries = get_field('geogroups_countries', $group->ID);
        foreach ($countries as $country){
            $group_ids[$group->ID][] = get_field('countries_basic_code', $country);
        }
    }

    foreach ($group_ids as $key => $data){
        if (array_search($geodata['country_code'], $data) !== false) $geodata['group'] = $key;
    }
}

function the_component($layout) {
    global $the_component_counter;
    echo '<div id="component' . $the_component_counter . '" class="components component-' . $layout .'">';
    module_template('components/' . $layout);
    echo '</div>';
    $the_component_counter++;
}
