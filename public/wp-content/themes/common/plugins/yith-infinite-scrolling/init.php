<?php

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_script('yith-infinite-scrolling-fix', get_template_directory_uri().'/plugins/yith-infinite-scrolling/infinite.js', array('jquery'), nix_get_rev(), true);
});