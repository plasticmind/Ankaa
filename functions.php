<?php

/* 
	ANKAA THEME
	by Jesse Gardner
	last update: 07.28.2014
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

// Admin-related options
require_once ( get_template_directory() . '/lib/admin.php' );

