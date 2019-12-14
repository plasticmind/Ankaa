<?php
/**
 * Feed-related scripts
 */

/**
 * Deal with the custom RSS templates.
 */
function pmd_custom_rss() {
    get_template_part( 'feed', 'mailchimp' );
}
remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', 'pmd_custom_rss', 10, 1 );