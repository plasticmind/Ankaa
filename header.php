<?php
/**
 *
 * The Header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <title><?php wp_title( '//', true, 'right' ); ?></title>
  <link rel="shortcut icon" href="/favicon.ico?v=3" />
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/html5shiv.js" type="text/javascript"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

  <div id="container">

    <header class="site-header<?php echo ( !is_front_page() ) ? ' collapsed' : '';?>">
      <div id="brand">
        <?php // Only the home page gets an H1 for the site title ?>
        <?php echo ( is_home() || is_front_page() ) ? '<h1>' : '<div>'; ?>
        <a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
        <?php echo ( is_home() || is_front_page() ) ? '</h1>' : '</div>'; ?>
      </div>

      <button class="hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="site-nav">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>

      <nav id="site-nav">
        <?php wp_nav_menu( array( 'menu' => 'primary' ) ); ?>
      </nav>
      <div id="social-links">
        <ul>
          <li class="social-facebook"><a href="http://facebook.com/plasticmind">Jesse Gardner on Facebook</a></li>
          <li class="social-twitter"><a href="http://twitter.com/plasticmind">Jesse Gardner on Twitter</a></li>
          <li class="social-feed"><a href="http://feeds.feedburner.com/plasticmind/">RSS Feed</a></li>
          <li class="social-email"><a href="http://plasticmind.com/contact/">Contact</a></li>
        </ul>
      </div>
    </header>
    <?php do_action( 'pm_header_after' ); ?>
