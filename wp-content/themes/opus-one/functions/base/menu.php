<?php

function opusone_register_navs() {
	register_nav_menus( array(
		'main_navigation'	=> __( 'Main Navigation', 'opusone' ),
		'footer_navigation'	=> __( 'Footer Navigation', 'opusone' )
	));
}
add_action( 'after_setup_theme', 'opusone_register_navs' );