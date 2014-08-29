<?php
/**
 * Enqueue scripts and stylesheets
 */

add_action('wp_enqueue_scripts', 'pm_load_scripts');
function pm_load_scripts() {
  if (!is_admin()) {
  	wp_enqueue_style( 'pm-style', get_template_directory_uri().'/assets/css/style.min.css', null, pm_version_hash('/assets/css/style.min.css') );
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), null, true );
    // wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.min.js', array(), null, true );
    // wp_enqueue_script( 'pm-plugins', get_template_dire_urictory_uri() . '/assets/js/plugins.min.js', array('jquery'), version_hash('/assets/js/plugins.min.js'), true );
    wp_enqueue_script( 'pm-tools', get_template_directory_uri() . '/assets/js/tools.min.js', array('jquery'), pm_version_hash('/assets/js/tools.min.js'), true );
  }
}

// Add Typekit font support

add_action('wp_head', 'pm_load_typekit');
function pm_load_typekit() {
  echo <<<EOT
	<script type="text/javascript" src="//use.typekit.net/yzw0eep.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>\n
EOT;
}

?>
