<?php
/**
 * Plugin Name:     WP YouTube Resume Block Pattern
  * Description:     A block that embeds a YouTube player that sets a cookie to capture the timecode and lets a viewer resume from where they left off.
 * Version:         1.0.0
 * Author:          Rob Saum
 * Author URI:     	http://robsaum.com/
 * License:         GPL-3.0+
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 */
 
/* If this file is called directly, abort */
if ( ! defined( 'WPINC' ) ) {
  die;
}
  
/* Current plugin version */
define( 'YT_BP_VERSION', '1.0.0' );
  
/* Plugin URL */
define( 'YT_BP_URL', plugin_dir_url( __FILE__ ) ); //This include the trailing slash! 
  
require_once( 'inc/patterns.php' );




/* --------------------- */
/* YouTube meta stores video id and provides analytics */
// $meta_array = array();
$meta_yt = '';

// Condense to one function make_service_url
function make_service_url($share_link) {
  $service_url = '<a href="https://studio.youtube.com/video/' .$share_link .'/analytics/tab-overview/period-default" target="_blank">View Video Analytics</a><br>';
  return $service_url;
}


function determine_service($micrometa_id) {
  if (!empty($micrometa_id)) {
    //$meta_array[0] = 'youtube';
    $meta_yt = make_service_url($micrometa_id);
  }
  return $meta_yt;
}


// Experimenting here:
add_filter( 'manage_posts_columns', 'rctle_filter_posts_columns' );
function rctle_filter_posts_columns( $columns ) {
  $columns['youtube'] = __('YouTube');
  return $columns;
}

add_action( 'manage_posts_custom_column', 'yt_column', 10, 2);
function yt_column( $column, $post_id ) {
  
  // Evaluate the string to determine the provider:
  $micro_meta1 = determine_service(get_post_meta( $post_id, 'micro_meta1', true ));
    
  if ( 'youtube' === $column ) {
       echo $micro_meta1;
    }
}

// Add custom post meta
function WPEntryMeta_add_custom_post_meta() { 
    $screen = "post"; // will be display custom post meta box in post editor, to display it in page type, change "post" to "page"
    add_meta_box( 'content_meta', 'YouTube Video ID', 'WPEntryMeta_custom_post_meta_callback', $screen, 'side', 'default', null );
}
add_action( 'add_meta_boxes', 'WPEntryMeta_add_custom_post_meta' );
 
// Custom post meta callback
function WPEntryMeta_custom_post_meta_callback($post){ 
    wp_nonce_field( 'micro_meta1_save_data', 'micro_meta1_nonce' );
    $value = get_post_meta( $post->ID, 'micro_meta1', true );
    echo '<input type="text" name="micro_meta1" value="' . esc_attr( $value ) . '" placeholder="Enter Micricontent URL"><br />';
}
 
// Save custom post meta data
function WPEntryMeta_custom_post_meta_save_data( $post_id ) { 
     if ( ! isset( $_POST['micro_meta1_nonce'] ) ) { return;  }
     if ( ! wp_verify_nonce( $_POST['micro_meta1_nonce'], 'micro_meta1_save_data' ) ) { return; }

     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; } 
     if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
         if ( ! current_user_can( 'edit_page', $post_id ) ) { return; }
     }
    else{
         if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }
    }
 
    $my_data = sanitize_text_field( $_POST['micro_meta1'] );

    update_post_meta( $post_id, 'micro_meta1', $my_data );
}

add_action( 'save_post', 'WPEntryMeta_custom_post_meta_save_data');