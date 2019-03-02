<?php

/*
 * Revision helper
 */

function nix_get_rev() {
    $rev_file = APP_PATH . 'rev.txt';
    return file_exists($rev_file) ? trim(file_get_contents($rev_file)) : time();
}


/*
 * CSS helper
 */

function _get_theme_css($name, $theme_dir, $theme_uri) {
    if (strpos($name, '.min.') == false) {
        $min_name = str_replace('.css', '.min.css', $name);
        $min_name_without_query = explode('?', $min_name);
        $min_file = sprintf('%s/assets/css/%s', $theme_dir, $min_name_without_query[0]);
        if (file_exists($min_file)) {
            $name = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? $name : $min_name;
        }
    }

    if (strpos($name, '?ver') == false) {
        $name .= '?ver=' . nix_get_rev();
    }

    return sprintf('%s/assets/css/%s', $theme_uri, $name);
}

function get_theme_css($name, $is_parent_theme = false) {
    $theme_uri = ($is_parent_theme) ? get_template_directory_uri() : get_stylesheet_directory_uri();
    $theme_dir = ($is_parent_theme) ? get_template_directory() : get_stylesheet_directory();

    return _get_theme_css($name, $theme_dir, $theme_uri);
}

function theme_css($name) {
    echo get_theme_css($name);
}

function get_parent_theme_css($name) {
    return get_theme_css($name, true);
}

function parent_theme_css($name) {
    echo get_theme_css($name, true);
}


/*
 * JS helper
 */

function _get_theme_js($name, $theme_dir, $theme_uri) {
    if (strpos($name, '.min.') == false) {
        $min_name = str_replace('.js', '.min.js', $name);
        $min_name_without_query = explode('?', $min_name);
        $min_file = sprintf('%s/assets/js/%s', $theme_dir, $min_name_without_query[0]);
        if (file_exists($min_file)) {
            $name = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? $name : $min_name;
        }
    }

    if (strpos($name, '?ver') == false) {
        $name .= '?ver=' . nix_get_rev();
    }

    return sprintf('%s/assets/js/%s', $theme_uri, $name);
}

function get_theme_js($name, $is_parent_theme = false) {
    $theme_uri = ($is_parent_theme) ? get_template_directory_uri() : get_stylesheet_directory_uri();
    $theme_dir = ($is_parent_theme) ? get_template_directory() : get_stylesheet_directory();

    return _get_theme_js($name, $theme_dir, $theme_uri);
}

function theme_js($name) {
    echo get_theme_js($name);
}

function get_parent_theme_js($name) {
    return get_theme_js($name, true);
}

function parent_theme_js($name) {
    echo get_theme_js($name, true);
}


/*
 * IMG helper
 */

function _get_theme_img($name, $theme_uri) {
    return sprintf('%s/assets/img/%s?ver=%s', $theme_uri, $name, nix_get_rev());
}

function get_theme_img($name, $is_parent_theme = false) {
    $theme_uri = ($is_parent_theme) ? get_template_directory_uri() : get_stylesheet_directory_uri();

    return _get_theme_img($name, $theme_uri);
}

function theme_img($name) {
    echo get_theme_img($name);
}

function get_parent_theme_img($name) {
    return get_theme_img($name, true);
}

function parent_theme_img($name) {
    echo get_theme_img($name, true);
}


/*
 * Template helper
 */

function _get_theme_template_path($path, $theme_dir) {
    $located = locate_template($path);
    if ($located == '') {
        $located = sprintf('%s/templates/%s.php', $theme_dir, $path);
        if (!file_exists($located)) {
            throw new Exception("Template '$located' does not exist.");
        }
    }
    return $located;
}

function get_theme_template_path($path, $is_parent_theme = false) {
    $theme_dir = ($is_parent_theme) ? get_template_directory() : get_stylesheet_directory();
    return _get_theme_template_path($path, $theme_dir);
}

function theme_template($path, $data = array(), $require_once = false, $is_parent_theme = false) {
    $located = get_theme_template_path($path, $is_parent_theme);

    set_query_var('__data', $data);
    load_template( $located, $require_once );
}

/**
 * @deprecated
 */
function get_theme_template($path, $data = array(), $require_once = false) {
    ob_start();
    theme_template($path, $data, $require_once);
    return ob_get_clean();
}

function parent_theme_template($path, $data = array(), $require_once = false) {
    theme_template($path, $data, $require_once, true);
}

/**
 * @deprecated
 */
function get_parent_theme_template($path, $data = array(), $require_once = false) {
    ob_start();
    theme_template($path, $data, $require_once, true);
    return ob_get_clean();
}
