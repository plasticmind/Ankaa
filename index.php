<?php
/**
 *
 * The main template file.
 *
 */

get_header(); ?>

	<div class="content">
		<main class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php echo "Sorry, we couldn't find what you were looking for.\n"; ?>
				
			<?php endif; ?>

		</main>
	</div>
	<div class="secondary">
		<?php dynamic_sidebar('footer-widgets'); ?>
	</div>

<?php get_footer(); ?>
