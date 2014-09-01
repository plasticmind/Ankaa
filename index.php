<?php
/**
 *
 * The main template file.
 *
 */

get_header(); ?>

	<div class="content">
		<main class="site-content" role="main">

<?php

if ( 0 === get_query_var( 'page' ) ) {
  // First page of our blog gets a nice header
  if ( 'page' == get_option('show_on_front') && get_option('page_for_posts') && is_home() ) : the_post();
    $page_for_posts_id = get_option('page_for_posts');
    global $post; $post = $page_for_posts_id;
    setup_postdata(get_page($page_for_posts_id));
  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <?php if ( has_post_thumbnail() ) : ?>

        <?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>
        <?php $image_class = ($image_data[1]>700) ? ' full-size ultra-wide' : ''; ?>

        <div class="entry-featuredimage<?php echo $image_class; ?>">
          <?php the_post_thumbnail( array( 999, 999 ), array( 'itemprop' => 'image' ) ); ?> 
        </div>

      <?php endif; ?>

      <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>

      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">

        <?php $subtitle = get_post_meta( $post->ID, 'pm_subtitle', true ); ?>
        <?php echo (!empty($subtitle)) ? '<div class="entry-subtitle">'.apply_filters('the_content',$subtitle).'</div>' : ''; ?>        
        <?php the_content(); ?>

      </div>

    </article>

  <?php
    rewind_posts();
    endif;
  } ?>

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