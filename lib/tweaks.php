<?php
/**
 * Theme tweaks
 */

// == Replace default separator for HTML title
add_filter('wpseo_replacements_filter_sep','pm_replace_separator');
function pm_replace_separator() {
	return '//';
}

// == Replace default excerpt link

function mummyblog_excerpt_length( $length ) {
	return 80;
}
//add_filter( 'excerpt_length', 'mummyblog_excerpt_length' );

function new_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . 'Read More' . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );