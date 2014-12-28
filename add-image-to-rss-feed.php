<?php
/*
Plugin Name: Add Image to RSS Feed
Plugin URI: http://thisismyurl.com/downloads/add-image-to-rss-feed/
Description: Automatically adds the featured image to RSS feed posts
Author: Christopher Ross
Author URI: http://thisismyurl.com/
Version: 1.0.0
*/


function thisismyurl_rss_thumbnail ( $content ) {

    global $post;

    if ( isset( $post  ) ) {
        if ( has_post_thumbnail( $post->ID ) )
            $content = get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'alt' => get_the_title(), 'title' => get_the_title(), 'style' => 'float:right;' ) ) . '' . $content;
    }

    return $content;
}

add_filter( 'the_excerpt_rss', 'thisismyurl_rss_thumbnail' );
add_filter( 'the_content_feed', 'thisismyurl_rss_thumbnail' );
