<?php
/**
 * Template tags
 */


// ENTRY BYLINE: Prints HTML with meta information for the current post-date/time and author.

if ( ! function_exists( 'pm_entry_byline' ) ) :
function pm_entry_byline() {

  // Populate Byline Variable

  $byline['author_name'] = get_the_author();
  $byline['author_url'] = get_author_posts_url( get_the_author_meta( 'ID' )) ;
  $byline['entry_date'] = '· '.(is_single()?'':'<a href="'.get_permalink().'" title="'.esc_attr(get_the_title()).'" rel="bookmark" class="byline-date updated">').'<time class="entry-date" datetime="' . get_the_date( 'c' ) . '" pubdate itemprop="datePublished" content="'.get_the_date( 'Y-m-d' ).'">' . get_the_date('l, F j, Y') . '</time>'.(is_single()?'':'</a>');

  // Print Byline

  echo <<<EOT

    <span class="entry-byline">by 
      <span class="author vcard" itemprop="author">
        <a class="url fn n" rel="author" href="{$byline['author_url']}">{$byline['author_name']}</a>
      </span>
      {$byline['entry_date']}
    </span>

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