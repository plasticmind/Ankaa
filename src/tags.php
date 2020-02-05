<?php
/**
 * Template tags
 */


// ENTRY BYLINE: Prints HTML with meta information for the current post-date/time and author.

if ( ! function_exists( 'pm_entry_byline' ) ) :
function pm_entry_byline() {

  // Populate Byline Variable

  $byline['author_link'] = (has_post_format('quote')?'':'by <span class="author vcard" itemprop="author"><a class="url fn n" rel="author" href="/about/">'.get_the_author().'</a></span> · ');
  $byline['entry_date'] = (is_single()?'':'<a href="'.get_permalink().'" title="'.esc_attr(get_the_title()).'" rel="bookmark" class="byline-date updated">').'<time class="entry-date" datetime="' . get_the_date( 'c' ) . '" pubdate itemprop="datePublished" content="'.get_the_date( 'Y-m-d' ).'">' . get_the_date('l, F j, Y') . '</time>'.(is_single()?'':'</a>');

  // Print Byline

  echo <<<EOT

    <span class="entry-byline"> 
      {$byline['author_link']}
      {$byline['entry_date']}
    </span>\n

EOT;

}
endif;

function pm_get_cats_and_tags_list() {
    $html = '<div class="topic-list"><ul>';
    foreach((get_the_category()) as $cat) {
        $html .= '<li class="item-category">' .
            '<a href="' . get_category_link($cat->term_id) . '">#' . $cat->cat_name . '</a>' . 
        '</li>';
    }
    $posttags = get_the_tags();
    if ($posttags) {
      foreach($posttags as $tag) {
        $html .= '<li class="item-tag">' .
            '<a href="' . get_tag_link($tag->term_id) . '">#' . $tag->name . '</a>' . 
        '</li>';
      }
    }    
    return $html . '</ul></div>';
}

function pm_version_hash($file) {
  if(!$file) return false;
  $full_path = get_template_directory() . $file;
  return hash_file('CRC32',$full_path);
}

/* = NAVIGATION: Display navigation to next/previous pages when applicable */

if ( ! function_exists( 'pm_content_nav' ) ):
function pm_content_nav( $nav_id=null ) {
  global $wp_query;

  $nav_class = 'site-navigation paging-navigation';

  ?>
  <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
    <div class="assistive-text">Post navigation</div>

  <?php if ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

    <?php if ( get_next_posts_link() ) : ?>
    <div class="nav-previous"><?php next_posts_link( '<span class="nav-icon">&larr;</span><span class="nav-label"> Older</span>' ); ?></div>
    <?php endif; ?>

    <?php if ( get_previous_posts_link() ) : ?>
    <div class="nav-next"><?php previous_posts_link( '<span class="nav-label">Newer </span><span class="nav-icon">&rarr;</span>' ); ?></div>
    <?php endif; ?>

  <?php endif; ?>

  </nav><!-- #<?php echo $nav_id; ?> -->
  <?php
}
endif;



/* = NAVIGATION: Display navigation to next/previous pages when applicable */

if ( ! function_exists( 'pm_content_nav' ) ):
function pm_content_nav( $nav_id ) {
  global $wp_query;

  $nav_class = 'site-navigation paging-navigation';
  if ( is_single() )
    $nav_class = 'site-navigation post-navigation';

  ?>
  <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
    <h1 class="assistive-text"><?php _e( 'Post navigation', 'sr' ); ?></h1>

  <?php if ( is_single() ) : // navigation links for single posts ?>

    <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'sr' ) . '</span> %title' ); ?>
    <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'sr' ) . '</span>' ); ?>

  <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

    <?php if ( get_next_posts_link() ) : ?>
    <div class="nav-previous"><?php next_posts_link( __( 'More posts <span class="meta-nav">&rarr;</span>', 'sr' ) ); ?></div>
    <?php endif; ?>

    <?php if ( get_previous_posts_link() ) : ?>
    <div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Previous posts', 'sr' ) ); ?></div>
    <?php endif; ?>

    <?php if ( get_query_var('_mobile') ) : ?>
    <div class="nav-top"><a href="#header" title="Back to top"><span>Top</span></a></div>
    <?php endif; ?>

  <?php endif; ?>

  </nav><!-- #<?php echo $nav_id; ?> -->
  <?php
}
endif;
