<?php
/**
 * Plugin Name: Popular Posts
 * Plugin URI: http://athanasiadis.me
 * Description: A simple plugin
 * Version: 0.1
 * Author: Athanasiadis Evagelos
 * Author URI: http://athanasiadis.me
 * Text Domain: Optional. Plugin's text domain for localization. Example: mytextdomain
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: GPL2
 */

 /**
  * Post Popularity Counter
  */
  
function my_popular_posts_views($postID) {
    $total_key = 'views';
    
    // Get current 'views' field
    $total = get_post_meta( $postID, $total_key, true );
    
    // If current 'views' field is empty, set it to zero
    
    if ( $total == '') {
        delete_post_meta ($postID, $total_key);
        add_post_meta ( $postID, $total_key, '0');
    } else {
    // if current 'views' field has a value, add 1 to that value
    $total++;
    update_post_meta ( $postID, $total_key, $total);
    }
    
    }
  
  
  /**
   * Dynamically inject counter into single posts
   */
  
  function my_counter_popular_posts ($post_id) {
    
    // Check that this is a single post and that the user is a visitor
    if ( !is_single()) return;
    if ( !is_user_logged_in()) {
        // Get the post ID
        if ( empty ( $post_id)) {
            global $post;
            $post_id = $post->ID;
        }
        // Run the post Popularity Counter on post
        my_popular_posts_views($post_id);
    }
  }
  
  add_action ( 'wp_head', 'my_counter_popular_posts' );