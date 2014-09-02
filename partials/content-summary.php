            <li id="post-<?php the_ID(); ?>" class="summary">
              <p class="archive-list-title"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a></p>
              <p class="archive-list-meta"><?php echo get_the_date();?></p>
              
              <p class="archive-list-description">
                <?php 
                  $subtitle = get_post_meta( $post->ID, 'pm_subtitle', true );      
                  echo (!empty($subtitle)) ? $subtitle : get_the_excerpt();
                ?>
              </p>
            </li>