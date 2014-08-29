<?php
/**
 * Theme tweaks
 */

// == Replace default separator for HTML title
add_filter('wpseo_replacements_filter_sep','pm_replace_separator');
function pm_replace_separator() {
	return '//';
}
