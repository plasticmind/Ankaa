<?php
/**
 * Theme Support Options
 */

// Enable Post Thumbnails
add_theme_support( 'post-thumbnails' );

// Register Thumbnail Sizes
add_image_size( 'entry-nav', 700, 9999 );

// Enable support for HTML5 markup.
add_theme_support(
  'html5', array(
    'comment-list',
    'search-form',
    'comment-form',
    'gallery',
  )
);

// Add support for the Aside Post Formats
add_theme_support(
  'post-formats', array(
    'aside',
    'link',
    'gallery',
    'status',
    'quote',
    'chat',
    'image',
    'video'
  )
);

// This theme uses wp_nav_menu() in two locations.
register_nav_menus(
  array(
    'primary' => __( 'Primary Nav Menu', 'ankaa' ),
    'primary' => __( 'Footer Menu', 'ankaa' ),
    'social'  => __( 'Social', 'ankaa' )
  )
);

register_sidebar(
  array(
    'name'          => __( 'Footer Widget Area', 'ankaa' ),
    'id'            => 'footer-widgets',
    'description'   => 'Widgets to be placed in area beneath main page content.',
    'class'         => 'footer-widgets',
    'before_widget' =>  '<div id="%1$s2" class="widget %2$s">',
    'after_widget'  =>  '</div></div>',
    'before_title'  =>  '<div class="widget-content"><h4>',
    'after_title'   =>  '</h4>'
  )
);
