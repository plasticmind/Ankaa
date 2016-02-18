<?php
/*
Template Name: Home Page
Description: Special template for the home page
*/

get_header(); ?>

	<div class="content">
		<main class="site-content" role="main">

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if ( has_post_thumbnail() ) : ?>

          <?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>
          <?php $image_class = ($image_data[1]>700) ? ' full-size ultra-wide' : ''; ?>

          <div class="entry-featuredimage">
            <?php the_post_thumbnail( array( 999, 999 ), array( 'itemprop' => 'image' ) ); ?> 
          </div>

        <?php endif; ?>

        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>

        <header class="entry-header">
          <h2 class="entry-title"><?php the_title(); ?></h2>
        </header>

        <div class="entry-content">

          <?php the_content(); ?>

        </div>

      </article>

		</main>
	</div>
<?php get_footer(); ?>