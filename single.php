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

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">


        <?php if ( has_post_thumbnail() ) : ?>

          <?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>
          <?php $image_class = ($image_data[1]>700) ? ' full-size ultra-wide' : ''; ?>

          <div class="entry-featuredimage<?php echo $image_class; ?>">
            <?php the_post_thumbnail( array( 999, 999 ), array( 'itemprop' => 'image' ) ); ?> 
          </div>

        <?php endif; ?>

        <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>

        <header class="entry-header">
          <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
        </header>


        <div class="entry-content" itemprop="mainContentOfPage">

          <?php $subtitle = get_post_meta( $post->ID, 'pm_subtitle', true ); ?>
          <?php echo (!empty($subtitle)) ? '<div class="entry-subtitle">'.apply_filters('the_content',$subtitle).'</div>' : ''; ?>        
          <?php the_content(); ?>


          <?php wp_link_pages(
            array(
              'before'           => '<div class="page-links-next-prev">',
              'after'            => '</div>',
              'nextpagelink'     => '<button class="next-page-nav">' . __( 'Next page &rarr;', 'independent-publisher' ) . '</button>',
              'previouspagelink' => '<button class="previous-page-nav">' . __( '&larr; Previous page', 'independent-publisher' ) . '</button>',
              'next_or_number'   => 'next'
            )
          ); ?>
          <?php wp_link_pages(
            array(
              'before' => '<div class="page-links">' . __( 'Pages:', 'independent-publisher' ),
              'after'  => '</div>'
            )
          ); ?>
        </div>

        <footer class="entry-meta">
          <?php wpfp_link() ?>
          <?php pm_entry_byline(); ?>
          <?php echo pm_get_cats_and_tags_list(); ?>
        </footer>

      </article>



      <?php endwhile; // end of the loop. ?>

    </main>
  </div>
  <div class="secondary">
    <nav class="entry-navigation">
      <?php
      $prev = get_previous_post();
      $next = get_next_post();

      if (isset($prev)&&is_object($prev)&&!is_object($next))
        $is_expanded = ' expanded';
      if (isset($next)&&is_object($next)&&!is_object($prev))
        $is_expanded = ' expanded';

      if(isset($prev)&&is_object($prev)) :
        $has_thumb = (has_post_thumbnail($prev->ID)) ? ' with-image' : ' without-image';
        echo '<a href="'.get_permalink($prev->ID).'" class="nav-previous'.$is_expanded.$has_thumb.'"><span class="entry-nav-control">&larr;</span>';
        if ( has_post_thumbnail($prev->ID)) {
          $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($prev->ID), 'entry-nav');
          echo '<span class="entry-nav-image"><img src="'.$image_url[0].'" alt=""></span>';
        }
        echo ' <span class="entry-nav-panel"><span class="entry-nav-title">'.$prev->post_title.'</span> <span class="entry-nav-label">Previous</span></span></a>';
      endif;
      if(isset($next)&&is_object($next)) :
        $has_thumb = (has_post_thumbnail($next->ID)) ? ' with-image' : ' without-image';
        echo '<a href="'.get_permalink($next->ID).'" class="nav-next'.$is_expanded.$has_thumb.'"><span class="entry-nav-control">&rarr;</span>';
        if ( has_post_thumbnail($next->ID)) {
          $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($next->ID), 'entry-nav');
          echo '<span class="entry-nav-image"><img src="'.$image_url[0].'" alt=""></span>';
        }
        echo ' <span class="entry-nav-panel"><span class="entry-nav-title">'.$next->post_title.'</span> <span class="entry-nav-label">Next</span></span></a>';
      endif; 
      ?>
    </nav>

    <div class="entry-comments" id="comments"></div>
    <div class="footer-widgets">
      <?php dynamic_sidebar('footer-widgets'); ?>
    </div>
  </div>
<?php get_footer(); ?>