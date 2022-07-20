<?php

/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

function move_yoast_to_bottom() {
    return 'low';
}

add_filter('upload_mimes', 'wpc_mime_types');

// ACF - Activation des Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Options du thème',
		'menu_title'	=> 'Options du thème',
		'menu_slug' 	=> 'options-du-theme',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

add_filter( 'wpseo_metabox_prio', 'move_yoast_to_bottom');