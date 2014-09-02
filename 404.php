<?php
/**
 *
 * God bless the broken link.
 *
 */

get_header(); ?>

  <div class="content">
    <main class="site-content" role="main">

        <div class="entry-featuredimage">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/i/photos/phantom_selfie.jpg" alt="God bless the broken link.">
        </div>

        <header class="entry-header">
          <h1 class="entry-title">404, The Phantom Link</h1>
        </header>

        <div class="entry-content">
          <p><b>The page you requested couldn't be found.</b> Perhaps we made a mistake. Or perhaps this is just a sign from the Internet that you should do some more exploring on the site? <a href="/archives/">To the archives!</a></p>
        </div>

    </main>
  </div>
  <div class="secondary">
    <div class="footer-widgets">
      <?php dynamic_sidebar('footer-widgets'); ?>
    </div>
  </div>
<?php get_footer(); ?>