<?php
// Register Representation Post Type
function custom_post_type_representation() {
	$labels = array(
		'name' => _x( 'Représentations', 'Post Type General Name', 'ergopix' ),
		'singular_name' => _x( 'Représentation', 'Post Type Singular Name', 'ergopix' ),
		'menu_name' => __( 'Représentations', 'ergopix' ),
		'name_admin_bar' => __( 'Représentations', 'ergopix' ),
		'parent_item_colon' => __( 'Parent:', 'ergopix' ),
		'all_items' => __( 'Toutes les représentations', 'ergopix' ),
		'add_new_item' => __( 'Ajouter une représentation', 'ergopix' ),
		'add_new' => __( 'Ajouter', 'ergopix' ),
		'new_item' => __( 'Nouvelle représentation', 'ergopix' ),
		'edit_item' => __( 'Modifier la représentation', 'ergopix' ),
		'update_item' => __( 'Mettre à jour la représentation', 'ergopix' ),
		'view_item' => __( 'Visualiser la représentation', 'ergopix' ),
		'search_items' => __( 'Rechercher', 'ergopix' ),
		'not_found' => __( 'Aucune représentation', 'ergopix' ),
		'not_found_in_trash' => __( 'Aucune représentation dans la corbeille', 'ergopix' ),
	);
	$rewrite = array(
		'slug' => 'representation',
		'with_front' => true,
		'pages' => false,
		'feeds' => false,
	);
	$args = array(
		'label' => __( 'representation', 'ergopix' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'revisions', ),
		'taxonomies' => array( 'taxonomy-representation', 'taxonomy-lieu'),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-calendar-alt',
		'show_in_admin_bar' => false,
		'show_in_nav_menus' => false,
		'can_export' => false,
		'has_archive' => false,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => $rewrite,
	);
	register_post_type( 'representation', $args );

	$labels = array(
		'name' => _x( 'Newsletters', 'Post Type General Name', 'ergopix' ),
		'singular_name' => _x( 'Newsletter', 'Post Type Singular Name', 'ergopix' ),
		'menu_name' => __( 'Newsletters', 'ergopix' ),
		'name_admin_bar' => __( 'Newsletters', 'ergopix' ),
		'parent_item_colon' => __( 'Parent:', 'ergopix' ),
		'all_items' => __( 'Toutes les Newsletters', 'ergopix' ),
		'add_new_item' => __( 'Ajouter une Newsletter', 'ergopix' ),
		'add_new' => __( 'Ajouter', 'ergopix' ),
		'new_item' => __( 'Nouvelle Newsletter', 'ergopix' ),
		'edit_item' => __( 'Modifier la Newsletter', 'ergopix' ),
		'update_item' => __( 'Mettre à jour la Newsletter', 'ergopix' ),
		'view_item' => __( 'Visualiser la Newsletter', 'ergopix' ),
		'search_items' => __( 'Rechercher', 'ergopix' ),
		'not_found' => __( 'Aucune Newsletter', 'ergopix' ),
		'not_found_in_trash' => __( 'Aucune Newsletter dans la corbeille', 'ergopix' ),
	);
	$rewrite = array(
		'slug' => 'newsletter',
		'with_front' => true,
		'pages' => false,
		'feeds' => false,
	);
	$args = array(
		'label' => __( 'newsletter', 'ergopix' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'revisions', ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-media-document',
		'show_in_admin_bar' => false,
		'show_in_nav_menus' => false,
		'can_export' => false,
		'has_archive' => false,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => $rewrite,
	);
	register_post_type( 'newsletter', $args );		
}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_representation', 0 );

?>