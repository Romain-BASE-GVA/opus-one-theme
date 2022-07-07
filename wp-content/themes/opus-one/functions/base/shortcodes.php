<?php

function warning_shortcode( $atts, $content = null ) {
    $content = $content == '' ? 'Ajoutez du contenu ...' : $content;

    return '<p class="warning-message">' . $content . '</p>';
}

function big_shortcode( $atts, $content = null ) {
    $content = $content == '' ? 'Ajoutez du contenu ...' : $content;

    return '<div class="big-p"><p>'. $content .'</p></div>';
}

function btn_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'url' => '',
		),
		$atts
	);

    $content = $content == '' ? 'Cliquez ici!' : $content;

    return '<a href="'. $atts['url'] .'" class="btn">'. $content .'</a>';
}


add_shortcode( 'warning', 'warning_shortcode' );
add_shortcode( 'big', 'big_shortcode' );
add_shortcode( 'btn', 'btn_shortcode' );