<?php 

// Post Rating Functionality

//add_action( 'pre_get_posts', 'pm_filter_category_query' );
function pm_filter_category_query( $query ) {
    // only modify front-end category archive pages
    if( is_category() && !is_admin() && $query->is_main_query() ) {
        //$query->set( 'posts_per_page','20' );
        $query->set( 'orderby','meta_value_num' );
        $query->set( 'meta_key','wpfp_favorites' );
        $query->set( 'order','DESC' );
    }
}