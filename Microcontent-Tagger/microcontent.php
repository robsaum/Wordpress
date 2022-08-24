<?php
/*
Plugin Name: WordPress Plugin for Microcontent Tagging
Plugin URI:
Description:
Version: 2.0
Author: Rob Saum
Author URI:
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/


$meta_array = array();

// Condense to one function make_service_url
function make_service_url($share_link) {
  $service_url = '&#9745;&nbsp;&nbsp;<a href="' .$share_link .'" target="_blank">'.$share_link.'</a><br>';
  return $service_url;
}

function determine_service($micrometa_id) {
  if (strpos($micrometa_id, 'youtu') !== false) {
    $meta_array[0] = 'youtube';
    $meta_array[1] = make_service_url($micrometa_id);
  } elseif (strpos($micrometa_id, 'piktochart') !== false) {
    $meta_array[0] = 'piktochart';
    $meta_array[1] = make_service_url($micrometa_id);
  } elseif (strpos($micrometa_id, 'vimeo') !== false) {
    $meta_array[0] = 'vimeo';
    $meta_array[1] = make_service_url($micrometa_id);
  } elseif (strpos($micrometa_id, 'wistia') !== false) {
    $meta_array[0] = 'wistia';
    $meta_array[1] = make_service_url($micrometa_id);
  } elseif (strpos($micrometa_id, 'amazon') !== false) {
    $meta_array[0] = 'amazon';
    $meta_array[1] = make_service_url($micrometa_id);
  } else {
    $meta_array[0] = 'other';
    $meta_array[1] = make_service_url($micrometa_id);
  }
  return $meta_array;
}


// Experimenting here:
add_filter( 'manage_posts_columns', 'rctle_filter_posts_columns' );
function rctle_filter_posts_columns( $columns ) {
  $columns['youtube'] = __('YouTube');
  $columns['piktochart'] = __('Piktochart');
  $columns['vimeo'] = __('Vimeo');
  $columns['wistia'] = __('Wistia');
  $columns['amazon'] = __('Amazon');  
  $columns['other'] = __('Other');      
  return $columns;
}


add_action( 'manage_posts_custom_column', 'rctle_column', 10, 2);
function rctle_column( $column, $post_id ) {
  
  // Evaluate the string to determine the provider:
  $micro_meta1 = determine_service(get_post_meta( $post_id, 'micro_meta1', true ));
  $micro_meta2 = determine_service(get_post_meta( $post_id, 'micro_meta2', true ));
  $micro_meta3 = determine_service(get_post_meta( $post_id, 'micro_meta3', true ));
  $micro_meta4 = determine_service(get_post_meta( $post_id, 'micro_meta4', true ));
    
  if ( 'youtube' === $column ) {
      if ($micro_meta1[0] =='youtube') { echo $micro_meta1[1];}
      if ($micro_meta2[0] == 'youtube') { echo $micro_meta2[1];}
      if ($micro_meta3[0] == 'youtube') { echo $micro_meta3[1];}
      if ($micro_meta4[0] == 'youtube') { echo $micro_meta4[1];}
  	} elseif ( 'piktochart' === $column ) {
      if ($micro_meta1[0] == 'piktochart') { echo $micro_meta1[1];}
      if ($micro_meta2[0] == 'piktochart') { echo $micro_meta2[1];}
      if ($micro_meta3[0] == 'piktochart') { echo $micro_meta3[1];}
      if ($micro_meta4[0] == 'piktochart') { echo $micro_meta4[1];}
    } elseif ( 'vimeo' === $column ) {
      if ($micro_meta1[0] == 'vimeo') { echo $micro_meta1[1];}
      if ($micro_meta2[0] == 'vimeo') { echo $micro_meta2[1];}
      if ($micro_meta3[0] == 'vimeo') { echo $micro_meta3[1];}
      if ($micro_meta4[0] == 'vimeo') { echo $micro_meta4[1];}
    } elseif ( 'wistia' === $column ) {
      if ($micro_meta1[0] == 'wistia') { echo $micro_meta1[1];}
      if ($micro_meta2[0] == 'wistia') { echo $micro_meta2[1];}
      if ($micro_meta3[0] == 'wistia') { echo $micro_meta3[1];}
      if ($micro_meta4[0] == 'wistia') { echo $micro_meta4[1];}
    } elseif ( 'amazon' === $column ) {
      if ($micro_meta1[0] == 'amazon') { echo $micro_meta1[1];}
      if ($micro_meta2[0] == 'amazon') { echo $micro_meta2[1];}
      if ($micro_meta3[0] == 'amazon') { echo $micro_meta3[1];}
      if ($micro_meta4[0] == 'amazon') { echo $micro_meta4[1];}
    } elseif ( 'other' === $column ) {
      if ($micro_meta1[0] == 'other') { echo $micro_meta1[1];}
      if ($micro_meta2[0] == 'other') { echo $micro_meta2[1];}
      if ($micro_meta3[0] == 'other') { echo $micro_meta3[1];}
      if ($micro_meta4[0] == 'other') { echo $micro_meta4[1];}
    }
}


// Add custom post meta
function WPEntryMeta_add_custom_post_meta() { 
    $screen = "post"; // will be display custom post meta box in post editor, to display it in page type, change "post" to "page"
    add_meta_box( 'content_meta', 'Assets Included In This Entry', 'WPEntryMeta_custom_post_meta_callback', $screen, 'side', 'default', null );
}
add_action( 'add_meta_boxes', 'WPEntryMeta_add_custom_post_meta' );
 
// Custom post meta callback
function WPEntryMeta_custom_post_meta_callback($post){ 
    wp_nonce_field( 'micro_meta1_save_data', 'micro_meta1_nonce' );
    wp_nonce_field( 'micro_meta2_save_data', 'micro_meta2_nonce' );
    wp_nonce_field( 'micro_meta3_save_data', 'micro_meta3_nonce' );
    wp_nonce_field( 'micro_meta4_save_data', 'micro_meta4_nonce' );
    $value = get_post_meta( $post->ID, 'micro_meta1', true );
    $value2 = get_post_meta( $post->ID, 'micro_meta2', true );
    $value3 = get_post_meta( $post->ID, 'micro_meta3', true );
    $value4 = get_post_meta( $post->ID, 'micro_meta4', true );
    echo '<input type="text" name="micro_meta1" value="' . esc_attr( $value ) . '" placeholder="Enter Micricontent URL"><br />';
    echo '<input type="text" name="micro_meta2" value="' . esc_attr( $value2 ) . '" placeholder="Enter Micricontent URL"><br />';
    echo '<input type="text" name="micro_meta3" value="' . esc_attr( $value3 ) . '" placeholder="Enter Micricontent URL"><br />';
    echo '<input type="text" name="micro_meta4" value="' . esc_attr( $value4 ) . '" placeholder="Enter Micricontent URL">';
}
 
 
// Save custom post meta data
function WPEntryMeta_custom_post_meta_save_data( $post_id ) { 
     if ( ! isset( $_POST['micro_meta1_nonce'] ) ) { return;  }
     if ( ! isset( $_POST['micro_meta2_nonce'] ) ) { return;  }
     if ( ! isset( $_POST['micro_meta3_nonce'] ) ) { return;  }
     if ( ! isset( $_POST['micro_meta4_nonce'] ) ) { return;  }          
     if ( ! wp_verify_nonce( $_POST['micro_meta1_nonce'], 'micro_meta1_save_data' ) ) { return; }
     if ( ! wp_verify_nonce( $_POST['micro_meta2_nonce'], 'micro_meta2_save_data' ) ) { return; }
     if ( ! wp_verify_nonce( $_POST['micro_meta3_nonce'], 'micro_meta3_save_data' ) ) { return; }
     if ( ! wp_verify_nonce( $_POST['micro_meta4_nonce'], 'micro_meta4_save_data' ) ) { return; }

     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; } 
     if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
         if ( ! current_user_can( 'edit_page', $post_id ) ) { return; }
     }
    else{
         if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }
    }
 
    $my_data = sanitize_text_field( $_POST['micro_meta1'] );
    $my_data2 = sanitize_text_field( $_POST['micro_meta2'] );
    $my_data3 = sanitize_text_field( $_POST['micro_meta3'] );    
    $my_data4 = sanitize_text_field( $_POST['micro_meta4'] );

    update_post_meta( $post_id, 'micro_meta1', $my_data );
    update_post_meta( $post_id, 'micro_meta2', $my_data2 );
    update_post_meta( $post_id, 'micro_meta3', $my_data3 );
    update_post_meta( $post_id, 'micro_meta4', $my_data4 );        
}
add_action( 'save_post', 'WPEntryMeta_custom_post_meta_save_data');



?>