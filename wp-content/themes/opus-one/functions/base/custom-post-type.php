<?php

// Enregistrement d'un type de contenu supplémentaire
function opusone_custom_post_types_equipe() {

	$labels = array(
		'name'              => 'Équipe',
		'singular_name'     => 'Membre',
		'add_new'           => 'Add a Membre',
		'menu_name'			=> 'Équipe'
	);

	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'labels'  => $labels,
		'menu_icon' => 'dashicons-universal-access-alt',
		'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail'),
		'publicly_queryable'  => false
	);

	// Ajout du CPT
	register_post_type( 'equipe', $args );
}

add_action( 'init', 'opusone_custom_post_types_equipe' );

?>