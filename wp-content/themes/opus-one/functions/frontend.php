<?php
// Suppression des metas
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); //remove shortlink
remove_action('wp_head', 'wp_generator'); //remove Generator
remove_action('wp_head', 'rsd_link'); //remove RSD
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest 

// Removing RSS feeds.
remove_action('wp_head', 'feed_links_extra', 3); //Extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // General feeds: Post and Comment Feed

function my_init() {
	//flush_rewrite_rules();
	
	add_rewrite_rule(
		'representation/(.+?)/(.+?)/(.+?)/(.+?)/?$',
		'index.php?id=$matches[2]&representation=$matches[3]&date=$matches[4]',
		'top'
	);
	
	add_rewrite_rule(
		'representation/(.+?)/(.+?)/(.+?)/?$',
		'index.php?id=$matches[2]&representation=$matches[3]',
		'top'
	);
	
	add_rewrite_rule(
		'date/(.+?)/(.+?)/?$',
		'index.php?page_id=2558&annee=$matches[1]&mois=$matches[2]',
		'top'
	);
	
	add_rewrite_rule(
		'historique/(.+?)/?$',
		'index.php?page_id=4093&annee=$matches[1]',
		'top'
	);
	
	add_rewrite_tag('%date%','([^&]+)');
	add_rewrite_tag('%annee%','([^&]+)');
	add_rewrite_tag('%mois%','([^&]+)');
}
add_action('init', 'my_init');


function mySearchFilter($query) {
    if($query->is_search){
	    $args = array('posts_per_page' => -1, 'post_type' => 'representation', 'meta_key' => 'afficher_dans_les_resultats_de_recherche', 'meta_value' => 'non',);
		$representations = get_posts($args);
		$excludeId = array();
		foreach($representations as $representation){
			$excludeId[] = $representation->ID;
		}

        $query->set('post__not_in', $excludeId);
    }
    return $query;
}
if(!is_admin()){
	add_filter('pre_get_posts','mySearchFilter');
}
?>