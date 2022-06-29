<?php

// Autoriser les fichiers SVG
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

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