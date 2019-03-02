<?php

/*
 * CSS helper
 */

function get_module_css($name, $is_parent_theme = false) {
    list($module_name, $template_name) = explode('/', $name, 2);

    $theme_uri = ($is_parent_theme) ? get_template_directory_uri() : get_stylesheet_directory_uri();
    $theme_uri .= '/modules/' . $module_name;

    $theme_dir = ($is_parent_theme) ? get_template_directory() : get_stylesheet_directory();
    $theme_dir .= '/modules/' . $module_name;

    return _get_theme_css($template_name, $theme_dir, $theme_uri);
}

function module_css($name) {
    echo get_module_css($name);
}

function get_parent_module_css($name) {
    return get_module_css($name, true);
}

function parent_module_css($name) {
    echo get_module_css($name, true);
}


/*
 * JS helper
 */

function get_module_js($name, $is_parent_theme = false) {
    list($module_name, $template_name) = explode('/', $name, 2);

    $theme_uri = ($is_parent_theme) ? get_template_directory_uri() : get_stylesheet_directory_uri();
    $theme_uri .= '/modules/' . $module_name;

    $theme_dir = ($is_parent_theme) ? get_template_directory() : get_stylesheet_directory();
    $theme_dir .= '/modules/' . $module_name;

    return _get_theme_js($template_name, $theme_dir, $theme_uri);
}

function module_js($name) {
    echo get_module_js($name);
}

function get_parent_module_js($name) {
    return get_module_js($name, true);
}

function parent_module_js($name) {
    echo get_module_js($name, true);
}


/*
 * IMG helper
 */

function get_module_img($name, $is_parent_theme = false) {
    list($module_name, $template_name) = explode('/', $name, 2);

    $theme_uri = ($is_parent_theme) ? get_template_directory_uri() : get_stylesheet_directory_uri();
    $theme_uri .= '/modules/' . $module_name;

    return _get_theme_img($template_name, $theme_uri);
}

function module_img($name) {
    echo get_module_img($name);
}

function get_parent_module_img($name) {
    return get_module_img($name, true);
}

function parent_module_img($name) {
    echo get_module_img($name, true);
}


/*
 * Template helper
 */

function get_module_template_path($path, $is_parent_theme = false) {
    list($module_name, $template_path) = explode('/', $path, 2);

    $theme_dir = ($is_parent_theme) ? get_template_directory() : get_stylesheet_directory();
    $theme_dir .= '/modules/' . $module_name;

    return _get_theme_template_path($template_path, $theme_dir);
}

function module_template($path, $data = array(), $require_once = false, $is_parent_theme = false) {
    $located = get_module_template_path($path, $is_parent_theme);

    set_query_var('__data', $data);
    load_template( $located, $require_once );
}

function get_module_template($path, $data = array(), $require_once = false) {
    ob_start();
    module_template($path, $data, $require_once);
    return ob_get_clean();
}

function parent_module_template($path, $data = array(), $require_once = false) {
    module_template($path, $data, $require_once, true);
}

/**
 * @deprecated
 */
function get_parent_module_template($path, $data = array(), $require_once = false) {
    ob_start();
    module_template($path, $data, $require_once, true);
    return ob_get_clean();
}

/*----------------------------------------------------*/
// Templates wargnings.
/*----------------------------------------------------*/
function bt_template_warning($message)
{
    trigger_error($message, E_USER_WARNING);
}
