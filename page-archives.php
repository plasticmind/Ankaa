<?php
/*
Template Name: Archive Page
Description: Special template for the archive page
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

			<div id="archive-topics" class="archive-list">
				<h3>Topics I Write About:</h3>
				<ul>
					<?php 
						wp_list_categories('orderby=count&order=DESC&show_count=1&title_li=');
					?>
				</ul>
			</div>

			<div id="archive-popular" class="archive-list">
				<h3>Most Popular Posts:</h3>
				<ul>
					<?php wpfp_list_most_favorited(); ?>
				</ul>
			</div>

		</main>
	</div>
	<div class="secondary">
		<div class="footer-widgets">
			<?php dynamic_sidebar('footer-widgets'); ?>
		</div>
	</div>

<?php get_footer(); ?>