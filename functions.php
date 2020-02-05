<?php

/* 
	ANKAA THEME
	by Jesse Gardner
	last update: March 14, 2019
*/


// Initialize theme options
require_once ( get_template_directory() . '/src/setup.php' );

// Clean up some messy WP behaviors
require_once ( get_template_directory() . '/src/clean.php' );

// Load some simple helper functions
require_once ( get_template_directory() . '/src/helpers.php' );

// Enqueue our scripts and stylesheets
require_once ( get_template_directory() . '/src/scripts.php' );

// Tweak default theme behavior
require_once ( get_template_directory() . '/src/tweaks.php' );

// Custom template tags
require_once ( get_template_directory() . '/src/tags.php' );

// Custom post types
require_once ( get_template_directory() . '/src/post-types.php' );

// Admin-related options
require_once ( get_template_directory() . '/src/admin.php' );

// Playing with Post Ratings
require_once ( get_template_directory() . '/src/post-rating.php' );

// Feed-related scripts
require_once ( get_template_directory() . '/src/feeds.php' );

