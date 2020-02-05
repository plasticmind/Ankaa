<?php
/**
 * Admin-related scripts
 */

// Replace login header logo
function pm_login_style() {
    echo '<style>.login h1 a { background-image: url( ' . get_template_directory_uri() . '/assets/i/pmd.png ) !important; }</style>';
}
add_action( 'login_head', 'pm_login_style' );