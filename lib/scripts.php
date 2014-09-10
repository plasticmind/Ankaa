<?php
/**
 * Enqueue scripts and stylesheets
 */

add_action('wp_enqueue_scripts', 'pm_load_scripts');
function pm_load_scripts() {
  if (!is_admin()) {
    // Styles
  	wp_enqueue_style( 'pm-style', get_template_directory_uri().'/assets/css/style.min.css', null, pm_version_hash('/assets/css/style.min.css') );
    // Scripts
    wp_deregister_script('jquery');
    wp_deregister_script('wp-favroite-posts');

    wp_enqueue_script('jquery-remote', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), null, true );
    // wp_enqueue_script( 'pm-plugins', get_template_dire_urictory_uri() . '/assets/js/plugins.min.js', array('jquery'), version_hash('/assets/js/plugins.min.js'), true );
    wp_enqueue_script( 'pm-tools', get_template_directory_uri() . '/assets/js/tools.min.js', array('jquery-remote'), pm_version_hash('/assets/js/tools.min.js'), true );
    wp_enqueue_script( 'wp-favorite-posts', plugins_url() . '/wp-favorite-posts/wpfp.js', array('jquery-remote'), null, true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.custom.68660.js', array(), null, true );
    wp_enqueue_script( 'mint', 'http://plasticmind.com/mint/?js', array(), null, true );
  }
}

// Google Analytics

add_action('wp_head', 'pm_google_analytics');
function pm_google_analytics() {
  // If this is a 404, let's track it as an event with the URL and the referring page
  if ( is_404() ):
    $tracking_code = '"event", "error", "404", "url: " + document.location.pathname + document.location.search + " from: " + document.referrer';
  else:
    $tracking_code = "'pageview'";
  endif;

    echo <<<EOT
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-1045764-4', 'auto');
        ga('send', $tracking_code);

      </script>\n
EOT;
}

// Typekit font support

add_action('wp_head', 'pm_load_typekit');
function pm_load_typekit() {
  echo <<<EOT
	<script type="text/javascript" src="//use.typekit.net/yzw0eep.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>\n
EOT;
}

?>
