<?php

/* 
	ANKAA THEME
	by Jesse Gardner
	last update: March 14, 2019
*/


// Initialize theme options
require_once ( get_template_directory() . '/lib/setup.php' );

// Clean up some messy WP behaviors
require_once ( get_template_directory() . '/lib/clean.php' );

// Load some simple helper functions
require_once ( get_template_directory() . '/lib/helpers.php' );

// Enqueue our scripts and stylesheets
require_once ( get_template_directory() . '/lib/scripts.php' );

// Tweak default theme behavior
require_once ( get_template_directory() . '/lib/tweaks.php' );

// Custom template tags
require_once ( get_template_directory() . '/lib/tags.php' );

// Custom post types
require_once ( get_template_directory() . '/lib/post-types.php' );

// Admin-related options
require_once ( get_template_directory() . '/lib/admin.php' );

// Playing with Post Ratings
require_once ( get_template_directory() . '/lib/post-rating.php' );

// Feed-related scripts
require_once ( get_template_directory() . '/lib/feeds.php' );

