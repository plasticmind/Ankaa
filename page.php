<?php
/**
 *
 * The template for single posts.
 *
 */

get_header(); ?>

	<div class="content">
		<main class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( has_post_thumbnail() ) : ?>

					<?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>
					<?php $image_class = ($image_data[1]>700) ? ' full-size ultra-wide' : ''; ?>

					<div class="entry-featuredimage<?php echo $image_class; ?>">
						<?php the_post_thumbnail( array( 700, 700 ), array( 'itemprop' => 'image' ) ); ?>	
					</div>

				<?php endif; ?>

				<?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>

				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>


				<div class="entry-content">				
					<?php the_content(); ?>
				</div>

			</article>

			<?php endwhile; // end of the loop. ?>

		</main>
	</div>
	<div class="secondary">
		<div class="footer-widgets">
			<?php dynamic_sidebar('footer-widgets'); ?>
		</div>
	</div>

<?php get_footer(); ?>