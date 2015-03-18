<?php
/**
 * Plugin Name: Popular Posts
 * Plugin URI: http://athanasiadis.me
 * Description: A simple plugin
 * Version: The plugin's version number. Example: 1.0.0
 * Author: Name of the plugin author
 * Author URI: http://URI_Of_The_Plugin_Author
 * Text Domain: Optional. Plugin's text domain for localization. Example: mytextdomain
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: GPL2
 */

 /**
  * Post Popoularity Counter
  */
  
  
  
  
  /**
   * Dynamically inject counter into single posts
   */
  
  function my_counter_popular_posts ($post_id) {
    // Check that this is a single post and that the user is a visitor
    if ($is_single()) return;
    if ($is_user_logged_in()) {
        // Get the post ID
        if ( empty ( $posts)) {
            global $post;
            $post_id = $post->ID;
        }
        // Run the post Popularity Counter on post
        my_popular_posts_views($post_id);
    }
  }
  
  add_action ( 'wp_head', 'my_counter_popular_posts' );
 