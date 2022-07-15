<?php

function custom_taxonomy_representation() {	
	$labels_1 = array(
		'name'  => _x( 'Catégories', 'Taxonomy General Name', 'ergopix' ),
		'singular_name' => _x( 'Catégorie', 'Taxonomy Singular Name', 'ergopix' ),
		'menu_name' => __( 'Catégories', 'ergopix' ),
		'all_items' => __( 'Toutes les catégories', 'ergopix' ),
		'parent_item' => __( 'Parent:', 'ergopix' ),
		'parent_item_colon' => __( 'Parent:', 'ergopix' ),
		'new_item_name' => __( 'Nouvelle catégorie', 'ergopix' ),
		'add_new_item'  => __( 'Ajouter une catégorie', 'ergopix' ),
		'edit_item' => __( 'Modifier la catégorie', 'ergopix' ),
		'update_item' => __( 'Mettre à jour la catégorie', 'ergopix' ),
		'view_item' => __( 'Visualiser', 'ergopix' ),
		'separate_items_with_commas' => __( 'Séparées par des virgules', 'ergopix' ),
		'add_or_remove_items'    => __( 'Ajouter ou supprimer une catégorie', 'ergopix' ),
		'choose_from_most_used'  => __( 'Choisir parmi les plus utilisées', 'ergopix' ),
		'popular_items' => __( 'Les plus populaires', 'ergopix' ),
		'search_items'  => __( 'Rechercher', 'ergopix' ),
		'not_found' => __( 'Aucune', 'ergopix' )
	);
	$rewrite_1 = array(
		'slug' => 'categorie',
		'with_front' => true,
		'hierarchical' => false,
	);
	$args_1 = array(
		'labels' => $labels_1,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_tagcloud' => false,
		'rewrite' => $rewrite_1
	);
	register_taxonomy( 'taxonomy-representation', array( 'representation' ), $args_1 );
	
	$labels_2 = array(
		'name'  => _x( 'Lieux', 'Taxonomy General Name', 'ergopix' ),
		'singular_name' => _x( 'Lieu', 'Taxonomy Singular Name', 'ergopix' ),
		'menu_name' => __( 'Lieux', 'ergopix' ),
		'all_items' => __( 'Toutes les lieux', 'ergopix' ),
		'parent_item' => __( 'Parent:', 'ergopix' ),
		'parent_item_colon' => __( 'Parent:', 'ergopix' ),
		'new_item_name' => __( 'Nouveau lieu', 'ergopix' ),
		'add_new_item'  => __( 'Ajouter un lieu', 'ergopix' ),
		'edit_item' => __( 'Modifier le lieu', 'ergopix' ),
		'update_item' => __( 'Mettre à jour le lieu', 'ergopix' ),
		'view_item' => __( 'Visualiser', 'ergopix' ),
		'separate_items_with_commas' => __( 'Séparées par des virgules', 'ergopix' ),
		'add_or_remove_items'    => __( 'Ajouter ou supprimer un lieu', 'ergopix' ),
		'choose_from_most_used'  => __( 'Choisir parmi les plus utilisés', 'ergopix' ),
		'popular_items' => __( 'Les plus populaires', 'ergopix' ),
		'search_items'  => __( 'Rechercher', 'ergopix' ),
		'not_found' => __( 'Aucune', 'ergopix' )
	);
	$rewrite_2 = array(
		'slug' => 'lieux',
		'with_front' => true,
		'hierarchical' => false,
	);
	$args_2 = array(
		'labels' => $labels_2,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => false,
		'show_in_nav_menus' => false,
		'show_tagcloud' => false,
		'rewrite' => $rewrite_2
	);
	register_taxonomy( 'taxonomy-lieu', array( 'representation' ), $args_2 );
	
	$labels_3 = array(
		'name'  => _x( 'Artistes', 'Taxonomy General Name', 'ergopix' ),
		'singular_name' => _x( 'Artiste', 'Taxonomy Singular Name', 'ergopix' ),
		'menu_name' => __( 'Artistes', 'ergopix' ),
		'all_items' => __( 'Tous les artistes', 'ergopix' ),
		'parent_item' => __( 'Parent:', 'ergopix' ),
		'parent_item_colon' => __( 'Parent:', 'ergopix' ),
		'new_item_name' => __( 'Nouvel artiste', 'ergopix' ),
		'add_new_item'  => __( 'Ajouter un artiste', 'ergopix' ),
		'edit_item' => __( 'Modifier l\'artiste', 'ergopix' ),
		'update_item' => __( 'Mettre à jour l\'artiste', 'ergopix' ),
		'view_item' => __( 'Visualiser', 'ergopix' ),
		'separate_items_with_commas' => __( 'Séparées par des virgules', 'ergopix' ),
		'add_or_remove_items'    => __( 'Ajouter ou supprimer un artiste', 'ergopix' ),
		'choose_from_most_used'  => __( 'Choisir parmi les plus utilisés', 'ergopix' ),
		'popular_items' => __( 'Les plus populaires', 'ergopix' ),
		'search_items'  => __( 'Rechercher', 'ergopix' ),
		'not_found' => __( 'Aucune', 'ergopix' )
	);
	$rewrite_3 = array(
		'slug' => 'artiste',
		'with_front' => false,
		'hierarchical' => false,
	);
	$args_3 = array(
		'labels' => $labels_3,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => false,
		'show_in_nav_menus' => false,
		'show_tagcloud' => false,
		'rewrite' => $rewrite_3
	);
	register_taxonomy( 'taxonomy-artistes', array( 'representation' ), $args_3 );
	
	$labels_4 = array(
		'name'  => _x( 'Types', 'Taxonomy General Name', 'ergopix' ),
		'singular_name' => _x( 'Type', 'Taxonomy Singular Name', 'ergopix' ),
		'menu_name' => __( 'Types', 'ergopix' ),
		'all_items' => __( 'Tous les types', 'ergopix' ),
		'parent_item' => __( 'Parent:', 'ergopix' ),
		'parent_item_colon' => __( 'Parent:', 'ergopix' ),
		'new_item_name' => __( 'Nouvel artiste', 'ergopix' ),
		'add_new_item'  => __( 'Ajouter un type', 'ergopix' ),
		'edit_item' => __( 'Modifier le type', 'ergopix' ),
		'update_item' => __( 'Mettre à jour le type', 'ergopix' ),
		'view_item' => __( 'Visualiser', 'ergopix' ),
		'separate_items_with_commas' => __( 'Séparées par des virgules', 'ergopix' ),
		'add_or_remove_items'    => __( 'Ajouter ou supprimer un type', 'ergopix' ),
		'choose_from_most_used'  => __( 'Choisir parmi les plus utilisés', 'ergopix' ),
		'popular_items' => __( 'Les plus populaires', 'ergopix' ),
		'search_items'  => __( 'Rechercher', 'ergopix' ),
		'not_found' => __( 'Aucune', 'ergopix' )
	);
	$rewrite_4 = array(
		'slug' => 'types',
		'with_front' => false,
		'hierarchical' => false,
	);
	$args_4 = array(
		'labels' => $labels_4,
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => false,
		'show_in_nav_menus' => false,
		'show_tagcloud' => false,
		'rewrite' => $rewrite_4
	);
	register_taxonomy( 'taxonomy-types', array( 'representation' ), $args_4 );

}

add_action( 'init', 'custom_taxonomy_representation', 0 );
	
?>