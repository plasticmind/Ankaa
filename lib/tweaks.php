<?php
/**
 * Theme tweaks
 */

// == Replace default separator for HTML title
function pm_replace_separator() {
	return '//';
}
add_filter('wpseo_replacements_filter_sep','pm_replace_separator');

// == Replace default excerpt link

function mummyblog_excerpt_length( $length ) {
	return 80;
}
//add_filter( 'excerpt_length', 'mummyblog_excerpt_length' );

function new_excerpt_more( $more ) {
	if (is_feed()) return;
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . 'Read More' . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// == Add Pinterest verification to site header

function pm_pinterest_verify() {
	$output='<meta name="p:domain_verify" content="913d207e750e1f7931023b1b45fecc07"/>';
	echo $output;
}
add_action('wp_head','pm_pinterest_verify');