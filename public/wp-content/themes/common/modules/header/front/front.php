<?php

add_action('wp_print_styles', function () {
    wp_enqueue_style('header', get_module_css('header/front.css'), array(), nix_get_rev());
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('menu', get_module_js('header/menu.js'), array('jquery'), nix_get_rev(), true);
});

register_nav_menus(array(
    'head' => __('Head Menu'),
));
//
//class Walker_Nav_Primary extends Walker_Nav_menu {
//    /* -------------- Primary menu ul -------------------------*/
//    public function start_lvl(&$output, $depth = 0, $args = array()) {
//        $indent = str_repeat("\t",$depth);
//        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
//    }
//    public function end_lvl(&$output, $depth = 0, $args = array()) {
//        $output .= ($depth == 2) ? '</ul></div></div>' : '</ul>';
//    }
//    /* -------------- Primary menu ul -------------------------*/
//    /* -------------- Primary menu li -------------------------*/
//    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
//        global $geodata;
//        $postid = get_post_meta( $item->ID, '_menu_item_object_id', true );
//        $geogroup = get_field('page_basic_geolocation', $postid);
//
//        $indent = ($depth) ? str_repeat("\t",$depth) : '';
//        $dropdown_class = ($item->menu_order !== 63) ? esc_attr($item->classes[0]) : '';
//        $output .= $indent . '<li>';
//        $attributes = ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
//        $attributes .=  ($depth == 0 && $args->walker->has_children) ? '' : (!empty( $item->url)) ? ' href="' . esc_attr($item->url) . '"' : ' class="dropdown-toggle link-visible" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ';
//        $item_output = $args->before;
//        $item_output .= '<a' .($geogroup && !in_array($geodata['group'], $geogroup) ? ' style="display: none; " ' : ''). $attributes . '>';
//        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
//        $item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
//        $item_output .= $args->after;
//        $output .= apply_filters ('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
//    }
//    /* -------------- Primary menu li -------------------------*/
//}
