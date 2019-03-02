<?php
include_once 'helpers.php';

function bt_include_php_files_from_dir($path, $recursive = false)
{
    if (is_dir($path)) {
        $dir = new \DirectoryIterator($path);

        foreach ($dir as $file) {
            if ($file->isDot()) continue; // Skip . and ..

            if ($recursive && $file->isDir()) {
                bt_include_php_files_from_dir($file->getPath().'/'.$file->getFilename(), $recursive);
            }

            if ($file->isFile()) {
                $file_extension = pathinfo($file->getFilename(), PATHINFO_EXTENSION);

                if ($file_extension === 'php') {
                    include_once $file->getPath().'/'.$file->getBasename();
                }
            }

        }
    }
}

function bt_register_widgets_from_dir($path)
{
    if (is_dir($path)) {
        $dir = new \DirectoryIterator($path);

        foreach ($dir as $file) {
            if ($file->isDot()) continue; // Skip . and ..

            if ($file->isFile()) {
                $file_extension = pathinfo($file->getFilename(), PATHINFO_EXTENSION);

                if ($file_extension === 'php') {
                    include_once $file->getPath().'/'.$file->getBasename();
                    $widget_class = sprintf('%s_Widget', $file->getBasename('.' . $file_extension));

                    add_action('widgets_init', function() use ($widget_class) {
                        register_widget($widget_class);
                    });
                }
            }

        }
    }
}

function new_excerpt_length($length) {
    return 31;
}

add_filter('excerpt_length', 'new_excerpt_length');


define('NIX_THEME_DIR', __DIR__);
define('NIX_THEME_PLUGINS_DIR', NIX_THEME_DIR . '/plugins');
define('NIX_THEME_MODULES_DIR', NIX_THEME_DIR . '/modules');

bt_include_php_files_from_dir(NIX_THEME_PLUGINS_DIR, true);

if (is_admin()) {
    foreach (glob(NIX_THEME_MODULES_DIR . '/*/admin', GLOB_ONLYDIR) as $folder) {
        bt_include_php_files_from_dir($folder);
    }
}

foreach (glob(NIX_THEME_MODULES_DIR . '/*/front', GLOB_ONLYDIR) as $folder) {
    bt_include_php_files_from_dir($folder);
}

foreach (glob(NIX_THEME_MODULES_DIR . '/*/widgets', GLOB_ONLYDIR) as $folder) {
    bt_register_widgets_from_dir($folder);
}
