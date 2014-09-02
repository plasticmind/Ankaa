<?php
/**
 *
 * The archive template file.
 *
 */

get_header(); ?>

	<div class="content">
		<main class="site-content" role="main">

      <?php

      // Page title logic
      if(is_category()):
        $page_title = '<em>' . single_cat_title('',false) .'</em>';
      elseif(is_tag()):
        $page_title = 'Tag: <em>' . single_tag_title('',false) . '</em>';
      elseif(is_day()):
        $page_title = 'Archive: <em>' . get_the_time('F jS, Y') . '</em>';
      elseif(is_month()):
        $page_title = 'Archive: <em>' . get_the_time('F, Y') . '</em>';
      elseif(is_year()):
        $page_title = 'Archive: <em>' . get_the_time('Y') . '</em>'; 
      elseif(is_author()):
        $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval($author ) );
        $page_title = 'Author: <em>' . $curauth->nickname . '</em>';
      else:
        $page_title = "Archives";
      endif;
      ?>

      <?php if(is_category()||is_tag()) edit_term_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>

      <header class="entry-header">
        <h1 class="entry-title"><?php echo $page_title; ?></h1>
      </header>

      <?php // First page of category archive gets description ?>
      <?php if ( is_category() && get_query_var( 'paged' ) == 0 ) : ?>
      <div class="entry-subtitle">
        <?php echo category_description(); ?>
      </div>
      <?php endif; ?>

			<?php if ( have_posts() ) : ?>

        <ul class="entry-list">

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'partials/content', 'summary' ); ?>

				<?php endwhile; ?>

        </ul>

        <?php pm_content_nav(); ?>

			<?php endif; ?>

		</main>
	</div>
  <div class="secondary">

    <div class="footer-widgets">
      <?php dynamic_sidebar('footer-widgets'); ?>
    </div>
  </div>
<?php get_footer(); ?>